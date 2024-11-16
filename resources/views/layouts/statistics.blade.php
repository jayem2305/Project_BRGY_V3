<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title","781 Zone 85")</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="../pic/brgy_logo.png" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
    rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

     <!-- Libraries Stylesheet -->
     <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />



    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
   <style type="text/css">
#hero {
 background-repeat: no-repeat;
 animation: carousel 100s linear infinite;
}
@keyframes carousel {
 0%, 100% {
   background-position: 0 0;
}
25% {
   background-position: 100% 0;
}
50% {
   background-position: 200% 0;
}
75% {
   background-position: 300% 0;
}
}
.toast-container {
        z-index: 9999;

    }
    .circle-number-color {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        background-color: #1C2035; /* Dark background color */
        color: #fff; /* Text color */
        margin-right: 10px; /* Adjust spacing */
    }

    .circle-number {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #1C2035; /* Set border color */
        color: #1C2035; /* Text color */
        margin-right: 10px; /* Adjust spacing */
    }
    
</style>
<style>
    .valid-secondary::before {
        content: "\f05a"; /* Unicode for the Font Awesome info-circle icon */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #0d6efd; /* Choose your desired color */
         /* Adjust spacing as needed */
    }
</style>
<style>
        body {
            font-size: 0.875rem;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100; /* Stay on top of everything */
            padding: 48px 0 0; /* Height of navbar */
            background-color: #222E3C; /* Set the background color */
            color: white; /* Set the text color */
            transition: width 0.2s;
            width: 255px; /* Default width is expanded */
            overflow-y: auto; 
            overflow-x: hidden; 
            scrollbar-width: thin; /* Makes scrollbar thinner in Firefox */
            scrollbar-color: #0d6efd transparent;
        }
        .sidebar:hover {
            scrollbar-color: #ffffff transparent; 
        }
        /* Custom Scrollbar Styles */
        .sidebar::-webkit-scrollbar {
        width: 12px; /* Width of the scrollbar */
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent; /* Background of the track */
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.6); /* Color of the scrollbar thumb */
             border-radius: 10px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #ffffff; /* Color on hover */
            box-shadow: 0 0 10px #ffffff; /* Glowing effect */
        }
        .nav-link {
            font-weight: 500;
            color: #ffffff; /* Light text color */
            padding: 5px 15px; /* Adjust padding */
            text-align: left; /* Align text to the left */
            transition: all 0.3s; /* Smooth transition */
            white-space: nowrap; /* Prevent text wrapping */
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        .nav-link i {
            font-size: 24px; /* Set default icon size */
            transition: transform 0.3s; /* Transition for shrinking effect */
            
        }
        .nav-link span {
            font-size: 16px; /* Set text size */
            margin-left: 10px; /* Space between icon and text */
            
        }
        .nav-link:hover {
    background-color: #44618B; /* Change background on hover */
    color: #ffffff; /* Text color on hover */
    box-shadow: inset 5px 0 0 #0d6efd; /* Glowing primary color on the right */
}

.nav-link.active {
    background-color: #44618B; /* Background color when clicked */
    color: #ffffff; /* Text color when clicked */
    box-shadow: inset 5px 0 0 #0d6efd; /* Glowing color on the right */
}
/* Optionally, you can add a slight glowing effect */
.nav-link:hover::after {
    content: "";
    display: block;
    height: 100%;
    width: 5px; /* Glow on the right side */
    background-color: #0d6efd; /* Primary color */
    position: absolute;
    right: 0; /* Ensure it appears on the right side */
    top: 0;
}

/* Ensure only the hovered one is affected */
.nav-link:hover .link-text {
    color: #ffffff; /* Highlight the text */
}
        .content {
            margin-left: 240px; /* Match the default expanded sidebar width */
            transition: margin-left 0.2s, transform 0.2s;
        }
        .contentadmin {
            margin-top: -20px; /* Match the default expanded sidebar width */
            margin-left: 10px; /* Match the default expanded sidebar width */
            transition: margin-left 0.2s, transform 0.2s;
        }
        .sidebar .nav-section {
            padding: 15px; /* Space around section headings */
            font-weight: bold; /* Bold headings */
            color: #ccc; /* Color for headings */
        }
    /* Set fixed height for the table body and make it scrollable */
    #tablemonths {
    width: 100%;
    display: block;
}

#tablemonths thead {
    display: table;
    width: 100%;
}

#tablemonths tbody {
    display: block;
    height: 200px; /* Adjust this height as needed */
    overflow-y: scroll;
    width: 100%;
}

#tablemonths th, #tablemonths td {
    width: 20%; /* Adjust this percentage based on your column sizes */
    text-align: left;
}
    </style>
</head>
  <body>
   

   @yield("contentAdmin")
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="../lib/wow/wow.min.js"></script>
                    <script src="../lib/easing/easing.min.js"></script>
                    <script src="../lib/waypoints/waypoints.min.js"></script>
                    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
                    <script src="../lib/lightbox/js/lightbox.min.js"></script>
                    <!-- Template Javascript -->
                    <script src="../js/main.js"></script>
                    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
                    <script>
$(document).ready(function() {
    // Select all nav links
const navLinks = document.querySelectorAll('.nav-link');

// Add click event listener to each link
navLinks.forEach(link => {
    link.addEventListener('click', function() {
        // Remove the active class from all links
        navLinks.forEach(link => link.classList.remove('active'));
        
        // Add the active class to the clicked link
        this.classList.add('active');
    });
});

    $.ajax({
        url: "{{ route('admin.residents') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Log the response to check the data structure
            console.log(response.totalresidentschart); // Log the chart data specifically

            var chartData = response.totalresidentschart;

            // Define an array of colors for the datasets
            var colors = [
                'rgba(255, 99, 132, 0.2)', 
                'rgba(54, 162, 235, 0.2)', 
                'rgba(255, 206, 86, 0.2)', 
                'rgba(75, 192, 192, 0.2)', 
                'rgba(153, 102, 255, 0.2)', 
                'rgba(255, 159, 64, 0.2)'
            ];

            var ctx = document.getElementById('myLineChart').getContext('2d');
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: chartData.labels, // Months (Jan to Dec)
                    datasets: [] // Initialize an empty datasets array
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Years'
                            },
                            ticks: {
                                // Specify the years you want to display on the y-axis
                                callback: function(value) {
                                    return value; // Display the years directly
                                },
                                // Assuming you want to show years based on your dataset
                                autoSkip: true,
                                maxTicksLimit: 10 // Limit the number of ticks
                            },
                            min: Math.min(...chartData.datasets.map(ds => Math.min(...ds.data))) || 0, // Dynamic min value
                            max: Math.max(...chartData.datasets.map(ds => Math.max(...ds.data))) || 0  // Dynamic max value
                        }
                    }
                }
            });

            // Prepare the datasets with colors
            chartData.datasets.forEach((dataset, index) => {
                myLineChart.data.datasets.push({
                    label: dataset.label,
                    data: dataset.data,
                    backgroundColor: colors[index % colors.length], // Use color from the array
                    borderColor: colors[index % colors.length].replace(/0\.2/, '1'), // Set border color, full opacity
                    borderWidth: 2,
                    fill: false, // Set to false if you want only points, change to true for area fill
                    pointRadius: 5, // Set size of points
                    tension: 0 // Disable the line tension to show only points
                });
            });

            myLineChart.update(); // Update the chart to reflect the changes
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });
});
$(document).ready(function() {
    $.ajax({
        url: "{{ route('admin.certificates') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response); // Log the response to check the data structure

            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.labels, // Months (Jan to Dec)
                    datasets: response.datasets // Datasets with certificate counts
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Certificates'
                            }
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });
});

$(document).ready(function() {
    $.ajax({
        url: "{{ route('admin.residents') }}",
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Create the pie chart
            var ctx = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Males', 'Females', 'Minors', 'Seniors'],
                    datasets: [{
                        label: 'Population Categories',
                        data: [
                            response.totalMales,
                            response.totalFemales,
                            response.totalMinors,
                            response.totalSeniors
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)', // Male color
                            'rgba(255, 99, 132, 0.6)', // Female color
                            'rgba(255, 206, 86, 0.6)', // Minor color
                            'rgba(75, 192, 192, 0.6)'  // Senior color
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    }
                }
            });
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error: ' + status + error);
        }
    });
});



   
</script>

                    <script>
        $(document).ready(function(){
            $('#exportButton').click(function(){
               // window.location.href = " route('export') }}";
               let data = {
                name: $('#name').val(),
                minage: $('#minage').val(),
                maxage: $('#maxage').val(),
                address: $('#address').val(),
                voters: $('#voters').val(),
                sex: $('#sex').val(),
                status: $('#status').val(),
                _token: '{{ csrf_token() }}' // Make sure to include the CSRF token
            };

            $.ajax({
                url: '{{ route("export") }}',
                type: 'POST',
                data: data,
                xhrFields: {
                    responseType: 'blob'
                },
                success: function(data, status, xhr) {
                    var blob = new Blob([data], { type: xhr.getResponseHeader('Content-Type') });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    var today = new Date();
                    var formattedDate = (today.getMonth() + 1) + '-' + today.getDate() + '-' + today.getFullYear();
                    link.download = 'RBI_' + formattedDate + '.xlsx';
                    link.click();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
            // Get the select element
var yearSelect = document.getElementById('yearSelect');

// Get the current year
var currentYear = new Date().getFullYear();

// Add options for years from 2023 onwards
for (var year = 2023; year <= currentYear; year++) {
    var option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
}
var table = document.getElementById('tablemonths');


        });

        $(document).ready( function () {
  //  $('#tableResident').DataTable();
   // fetchResidentData();
   var table = $('#tableResident').DataTable();
function fetchResidentData() {
    var ext;
    var voters;
    var age;
    // Perform an AJAX request to fetch data from the server
    $.ajax({
        url: "{{ route('admin.getmembers') }}",
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            // Clear the existing table data
            table.clear();
            
            // Populate the DataTable with the fetched data
            $.each(response.residents, function(index, resident) {
                if(resident.ext == null){
                    ext = "";
                }else{
                    ext = resident.ext;
                }
                if(resident.voters_filename == null){
                    voters = "Non-Voters";
                }else{
                    voters = "Voters";
                }

                if (resident.age <= 14) {
                    age = "Minor";
                } else if (resident.age >= 60) {
                    age = "Senior";
                } else {
                    age = "Adult";
                }
                table.row.add([
                    resident.lname + ", " + resident.fname + " "+ resident.mname + " " +ext,
                    resident.age,
                    voters,
                    resident.household,
                    resident.gender,
                    age
                    // Add more properties as needed
                ]);
            });
            $.each(response.members, function(index, members) {
                if(members.ext == null){
                    ext = "";
                }else{
                    ext = members.ext;
                }

                if (members.age <= 14) {
                    age = "Minor";
                } else if (members.age >= 60) {
                    age = "Senior";
                } else {
                    age = "Adult";
                }
                if(members.voters_filename == null){
                    voters = "Non-Voters";
                }else{
                    voters = "Voters";
                }
                table.row.add([
                    members.lname + ", " + members.fname + " "+ members.mname + " " +ext,
                    members.age,
                    voters,
                    members.household,
                    members.gender,
                    age
                    // Add more properties as needed
                ]);
            });
            table.draw();
            // Add member data if needed
            $.each(response.members, function(index, member) {
                // Handle member data here, you can add it to the same table or a different one
            });
            
            // Redraw the table to reflect changes
            table.draw();
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            // Handle error
        }
    });
}


        fetchResidentData();
    } );
    $(document).ready(function() {
        $.ajax({
            url:"{{ route('admin.residents') }}",
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#residences_num').text(data.totalResidences);
                $('#senior_num').text(data.totalSeniors);
                $('#minor_num').text(data.totalMinors);
                $('#male_num').text(data.totalMales);
                $('#female_num').text(data.totalFemales);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    </script>
    <script>
$(document).ready(function() {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December","Total"];
    $('#yearSelect').change(function() {
        var year = $(this).val();
        if (year !== "Select a Year") {
            $.ajax({
                url: "{{ route('sum.copies') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    year: year
                },
                success: function(response) {
                    var monthlyData = response.monthlyData;
                    var tbody = $('#tablemonths tbody');
                    tbody.empty();
                    for (var month = 0; month < months.length - 1; month++) {
    var weeks = monthlyData[month + 1] || {'1': 0, '2': 0, '3': 0, '4': 0};
    var total = weeks['1'] + weeks['2'] + weeks['3'] + weeks['4'];
    var row = '<tr>' +
        '<td>' + months[month] + '</td>' +
        '<td>' + weeks['1'] + '</td>' +
        '<td>' + weeks['2'] + '</td>' +
        '<td>' + weeks['3'] + '</td>' +
        '<td>' + weeks['4'] + '</td>' +
        '<td class="text-bg-primary">' + total + '</td>' +
        '</tr>';
    tbody.append(row);
}

                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    function getTableData() {
    var tableData = [];
    $('#tablemonths tbody tr').each(function(rowIndex) {
        var rowData = [];
        $(this).find('td').each(function(colIndex) {
            rowData.push($(this).text());
        });
        tableData.push(rowData);
    });
    return tableData;
}
$('#exportButtontable').click(function() {
    var tableData = getTableData();
    var today = new Date().toISOString().slice(0, 10); 
    console.log(tableData); // Verify table data in browser console
    $.ajax({
        url: '/export-excel',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            tableData: tableData
        },
        xhrFields: {
            responseType: 'blob' // Set the response type to blob
        },
        success: function(data) {
            // Create a blob object from the response data
            var blob = new Blob([data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            // Create a temporary URL for the blob
            var url = window.URL.createObjectURL(blob);
            // Create a link element to trigger the download
            var link = document.createElement('a');
            link.href = url;
            link.download = 'Report_' + today + '.xlsx'; // Set the filename
            // Simulate click to trigger the download
            link.click();
            // Clean up
            window.URL.revokeObjectURL(url);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});




});
</script>

</body>
</html>