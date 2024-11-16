<?php

namespace App\Exports;

use App\Models\Resident;
use App\Models\Member;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DataExport implements FromCollection, WithHeadings, WithStyles
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $residentQuery = Resident::whereIn('status', ['Resident', 'Restricted']);
        $memberQuery = Member::whereIn('status', ['Resident', 'Restricted']);

        // Apply filters to the Resident query
        if (!empty($this->filters['name'])) {
            $residentQuery->where(function ($query) {
                $query->where('lname', 'like', '%' . $this->filters['name'] . '%')
                      ->orWhere('fname', 'like', '%' . $this->filters['name'] . '%')
                      ->orWhere('mname', 'like', '%' . $this->filters['name'] . '%');
            });
        }

        if (!empty($this->filters['maxage']) && !empty($this->filters['minage'])) {
            $residentQuery->whereBetween('age', [$this->filters['minage'], $this->filters['maxage']]);
        }

        if (!empty($this->filters['address'])) {
            $residentQuery->where('address', 'like', '%' . $this->filters['address'] . '%');
        }

        if (!empty($this->filters['voters']) && $this->filters['voters'] === 'Voters') {
            $residentQuery->whereNotNull('voters_filename');
        } else if (!empty($this->filters['voters']) && $this->filters['voters'] === 'Non-Voters') {
            $residentQuery->whereNull('voters_filename');
        }

        if (!empty($this->filters['sex']) && $this->filters['sex'] !== 'All') {
            $residentQuery->where('gender', $this->filters['sex']);
        }

        if (!empty($this->filters['status']) && $this->filters['status'] !== 'All') {
            $residentQuery->where('status', $this->filters['status']);
        }

        // Apply the same filters to the Member query
        if (!empty($this->filters['name'])) {
            $memberQuery->where(function ($query) {
                $query->where('lname', 'like', '%' . $this->filters['name'] . '%')
                      ->orWhere('fname', 'like', '%' . $this->filters['name'] . '%')
                      ->orWhere('mname', 'like', '%' . $this->filters['name'] . '%');
            });
        }

        if (!empty($this->filters['maxage']) && !empty($this->filters['minage'])) {
            $memberQuery->whereBetween('age', [$this->filters['minage'], $this->filters['maxage']]);
        }

        if (!empty($this->filters['address'])) {
            $memberQuery->where('address', 'like', '%' . $this->filters['address'] . '%');
        }

        if (!empty($this->filters['sex']) && $this->filters['sex'] !== 'All') {
            $memberQuery->where('gender', $this->filters['sex']);
        }

        if (!empty($this->filters['voters']) && $this->filters['voters'] === 'Voters') {
            $memberQuery->whereNotNull('voters');
        } else if (!empty($this->filters['voters']) && $this->filters['voters'] === 'Non-Voters') {
            $memberQuery->whereNull('voters');
        }

        if (!empty($this->filters['status']) && $this->filters['status'] !== 'All') {
            $memberQuery->where('status', $this->filters['status']);
        }

        $residentData = $residentQuery->select(
            'lname',
            'fname',
            'mname',
            'ext',
            'birth',
            'birthday',
            'age',
            'gender',
            'civil',
            'citizenship',
            'occupation',
            'indicate_if',
            'reg_number'
        )->get()->toArray();

        $memberData = $memberQuery->select(
            'lname',
            'fname',
            'mname',
            'ext',
            'birthplace',
            'birthday',
            'age',
            'gender',
            'civil_status',
            'citizenship',
            'occupation',
            'indicate_if'
        )->get()->toArray();

        $mergedData = array_merge($residentData, $memberData);

        $mergedCollection = collect($mergedData);

        $sortedCollection = $mergedCollection->sortBy('reg_number');

        $sortedCollection->transform(function ($item) {
            unset($item['reg_number']);
            return $item;
        });

        $cleanedCollection = $sortedCollection->map(function ($item) {
            $values = explode(',', $item['indicate_if']);
            $values = array_filter(array_map('trim', $values), function ($value) {
                return $value !== 'null';
            });
            $item['indicate_if'] = implode(', ', $values);
            return $item;
        })->filter(function ($item) {
            return !empty($item['indicate_if']);
        });

        return $cleanedCollection;
    }

    public function headings(): array
    {
        return [
            'LAST NAME',
            'FIRST NAME',
            'MIDDLE NAME',
            'EXT',
            'PLACE OF BIRTH',
            'DATE OF BIRTH',
            'AGE',
            'SEX',
            'CIVIL STATUS',
            'CITIZENSHIP',
            'OCCUPATION',
            'Indicate if Labor/Employed, Unemployed, PWD, OFW, Solo Parent, Out of School Youth (OSY), Out of School Children (OSC), IP'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestRow();
        $lastColumn = $sheet->getHighestColumn();

        // Set specific column widths
        $columnWidths = [
            'A' => 15,
            'B' => 15,
            'C' => 15,
            'D' => 5,
            'E' => 20,
            'F' => 15,
            'G' => 5,
            'H' => 10,
            'I' => 15,
            'J' => 20,
            'K' => 20,
            'L' => 128,
        ];

        foreach ($columnWidths as $column => $width) {
            $sheet->getColumnDimension($column)->setWidth($width);
        }

        return [
            // Style the header row
            1 => [
                'font' => ['bold' => true, 'size' => 12],
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
                'borders' => [
                    'allBorders' => ['borderStyle' => Border::BORDER_THIN],
                ],
            ],

            // Style data rows
            'A2:'.$lastColumn.$lastRow => [
                'alignment' => ['horizontal' => Alignment::HORIZONTAL_LEFT],
                'borders' => [
                    'outline' => ['borderStyle' => Border::BORDER_THIN],
                    'vertical' => ['borderStyle' => Border::BORDER_THIN],
                ],
            ],
        ];
    }

    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            // Set the title "RECORD OF BARANGAY INHABITANTS" in the first row
            $event->sheet->setCellValue('A1', 'RECORD OF BARANGAY INHABITANTS');
            $event->sheet->mergeCells('A1:L1');
            $event->sheet->getStyle('A1')->getFont()->setSize(16);
            $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Set headings to start from row 2
            $headingsRow = 2;
            $event->sheet->getStyle('A' . $headingsRow . ':L' . $headingsRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $event->sheet->getStyle('A' . $headingsRow . ':L' . $headingsRow)->getFont()->setBold(true);

            // Set data to start from row 3
            $dataRow =4;
            $event->sheet->getStyle('A' . $dataRow . ':L' . $dataRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        },
    ];
}


}
