<?php
session_start();
$loggedin = false;
if(!isset($_SESSION['s_loggedin']) && $_SESSION['s_loggedin'] != true)
{
    header("location: login_rhinobase.php");
    exit;
} 
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/sidebar.css">
        <link rel="stylesheet" href="../calender/evo-calendar.min.css">
        <link rel="stylesheet" href="../calender/evo-calendar.midnight-blue.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    
    <?php
    $activeTab = 'events_calender';
    include 'sidebar.php';
    ?>
    <div class="main_">
        <div id="calendar"></div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
        <script src="../calender/evo-calendar.js"></script>
        <script src="../calender/evo-calendar.min.js"></script>
        <script>
            // $('#calendar').evoCalendar({
            //     'eventListToggler' : false,
            //     'sidebarToggler' : false,
            //     'sidebarDisplayDefault' : false
            // });
            $(document).ready(function() {
        $('#calendar').evoCalendar({
            calendarEvents: [
        {
            id: 'bHay68s', // Event's ID (required)
            name: "New Year", // Event name (required)
            date: "10 September 2023", // Event date (required)
            type: "holiday", // Event type (required)
            everyYear: true // Same event every year (optional)
        },
        {
            name: "Vacation Leave",
            badge: "02/13 - 02/15", // Event badge (optional)
            date: ["September/13/2023", "September/15/2023"], // Date range
            description: "Vacation leave for 3 days.", // Event description (optional)
            type: "event",
            color: "#63d867" // Event custom color (optional)
        }
        ]
    });
    })
        </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>