<?php

namespace App\Exports;

use App\Models\FTJRequest;
use App\Models\IndigencyRequest;
use App\Models\CertificateRequest;
use App\Models\BusinessPermit;
use App\Models\BusinessCessation;
use App\Models\SoloParentRequest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class TableExport implements FromCollection, WithTitle, WithEvents
{
    protected $tableData;

    public function __construct(array $tableData = [])
    {
        $this->tableData = $tableData ?? [];
    }

    public function collection()
    {
        return collect($this->tableData);
    }

    public function title(): string
    {
        return 'Numerical Report';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                // Insert the title "Numerical Report" in a merged cell starting from row 1
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1', 'Numerical Report');
                // Style the title cell
                $event->sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                // Set row height for title row
                $event->sheet->getRowDimension('1')->setRowHeight(30);
    
                // Insert a row above the table to label the columns
                $event->sheet->insertNewRowBefore(2, 1);
                $labels = ['Month', '1st Week', '2nd Week', '3rd Week', '4th Week', 'Total'];
                foreach ($labels as $index => $label) {
                    $event->sheet->setCellValueByColumnAndRow($index + 1, 2, $label);
                }
    
                // Insert the table data starting from row 3
                $rowIndex = 3;
                foreach ($this->tableData as $rowData) {
                    $columnIndex = 'A';
                    foreach ($rowData as $cellData) {
                        $event->sheet->setCellValue($columnIndex . $rowIndex, $cellData);
                        $columnIndex++;
                    }
                    $rowIndex++;
                }
    
                // Apply borders to the entire table (including labels)
                $lastColumn = count($labels);
                $lastRowTable = $rowIndex - 1; // Subtract 1 because row index is already incremented at the end of each loop
                $rangeTable = 'A2:' . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($lastColumn) . $lastRowTable;
                $event->sheet->getStyle($rangeTable)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
    
                // Insert an empty column between the table and models' sums
                $event->sheet->insertNewColumnBefore('H', 0);
    
                // Insert the title "Total Number of Request" in the range H2 to J2
                $event->sheet->mergeCells('H2:J2');
                $event->sheet->setCellValue('H2', 'Total Number of Request');
                $event->sheet->getStyle('H2')->applyFromArray([
                    'font' => [
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
    
                // Calculate and insert the sum of copies for each model beside the table
                $models = [
                    FTJRequest::class,
                    IndigencyRequest::class,
                    CertificateRequest::class,
                    BusinessPermit::class,
                    BusinessCessation::class,
                    SoloParentRequest::class,
                ];
    
                // Initialize row index for models
                $rowIndex = 3;
    
                // Insert the models' sums starting from row 3
                foreach ($models as $model) {
                    $sumCopies = $model::sum('copy');
                    $event->sheet->setCellValue('H' . $rowIndex, 'Total Copies for ' . class_basename($model) . ':');
                    $event->sheet->setCellValue('J' . $rowIndex, $sumCopies);
                    $rowIndex++;
                }
    
                // Apply borders to the entire models' sums
                $lastRowModels = $rowIndex - 1; // Subtract 1 because row index is already incremented at the end of each loop
                $rangeModels = 'H2:J' . $lastRowModels; // Start from row 3 to last row of models
                $event->sheet->getStyle($rangeModels)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
    
                // Set column widths (adjust as needed)
                $event->sheet->getDefaultColumnDimension()->setWidth(15);
            },
        ];
    }
    
}
