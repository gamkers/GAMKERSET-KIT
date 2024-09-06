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
    <title> GAMKERSET</title>
    
    <style>
        /* Body and General Page Styles */
        body {
            font-family: 'Courier New', Courier, monospace;
            background: linear-gradient(45deg, #000000,  black, black,  black, #007700,  black);
            background-size: 200% 200%;
            animation: moveGradient 15s linear infinite;
            color: #00ff00;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 10px;
        }

        @keyframes moveGradient {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
        }

        .title h1 {
            font-size: 50px;
            margin-bottom: 400px;
            margin-top: 100px;
            padding-left: 30px;
            padding-right: 10px;
            color: white;
            text-align: center;
        }

        h2{
            font-size: 50px;
            text-align: center;
        }

        #links {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            flex-direction: row;
        }

        /* Glassmorphism Container */
        .glass-container {
            background: rgba(255, 255, 255, 0.1); /* Transparent white background */
            border-radius: 16px;
            padding: 20px;
            backdrop-filter: blur(10px); /* Blur effect */
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37); /* Soft shadow */
            border: 1px solid rgba(255, 255, 255, 0.18); /* Border with transparency */
            width: 90%;
            max-width: 800px;
            margin-top: 500px;
        }

        .template-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.2); /* Glassy look */
            backdrop-filter: blur(6px);
        }

        .template-image img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .template-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .template-path {
            margin-bottom: 10px;
            text-align: center;
            word-break: break-all;
            font-size: 12px;
            /* display: none; */
        }

        .btn-copy {
            background-color: black;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-copy:hover {
            background-color: green;
        }

        /* Textarea styling */
        textarea.form-control {
            background-color: rgba(18, 18, 18, 0.8); /* Dark background with transparency */
            color: #0f0; /* Green text */
            border: 1px solid #28a745; /* Green border to match the theme */
            border-radius: 10px;
            backdrop-filter: blur(8px);
        }

        /* Buttons Styling */
        .btn {
            color: #000;               /* Text color */
            background-color: rgba(255, 255, 255, 0.8);     /* Semi-transparent white background */
            border-radius: 10px;        /* Curved edges */
            padding: 10px 20px;         /* Increase padding for larger size */
            font-size: 16px;            /* Adjust font size */
            border: 1px solid #ccc;     /* Optional border */
            transition: background-color 0.3s ease, transform 0.2s; /* Smooth transition */
            backdrop-filter: blur(6px); /* Apply glass effect */
        }

        /* Button Redesign */
        .btn-danger {
            background-color: rgba(220, 53, 69, 0.8); /* Semi-transparent red background */
            border-color: rgba(220, 53, 69, 0.8);
        }

        .btn-danger:hover {
            background-color: rgba(200, 35, 51, 0.8); /* Darker red for hover */
        }

        .btn-success {
            background-color: rgba(40, 167, 69, 0.8); /* Semi-transparent green background */
            border-color: rgba(40, 167, 69, 0.8);
        }

        .btn-success:hover {
            background-color: rgba(33, 136, 56, 0.8); /* Darker green on hover */
        }

        .btn-warning {
            background-color: rgba(255, 193, 7, 0.8); /* Semi-transparent yellow button for "Clear Logs" */
            border-color: rgba(255, 193, 7, 0.8);
            color: #000; /* Black text for contrast */
        }

        .btn-warning:hover {
            background-color: rgba(224, 168, 0, 0.8); /* Darker yellow on hover */
        }

        /* Centering Content */
        .d-flex {
            justify-content: center;
        }

        /* Style for the Links Section */
        #links {
            margin-top: 20px;
        }

        /* Ensures proper sizing and spacing */
        .mt-2.d-flex  {
            margin-top: 1rem !important;
            display: flex;
        }

        .w-50 {
            width: 80% !important;
        }

        /* Button Spacing */
        .m-2 {
            margin: 0.5rem !important;
        }

        .mt-2.d-flex {
            display: flex;
            flex-wrap: wrap; /* Allows the buttons to wrap to the next line on small screens */
            justify-content: center; /* Center the buttons horizontally */
            gap: 10px; /* Space between buttons */
        }

        .mt-2.d-flex button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.2s;
            flex: 1 1 auto; /* Make buttons flexible and responsive */
            min-width: 100px; /* Minimum button size */
            margin: 10px; /* Space around buttons */
        }

        .typing-effect {
          font-size: 20px;
          border-right: 2px solid black;
          white-space: nowrap;
          overflow: hidden;
        }
        
        @keyframes typing {
          from { width: 0; }
          to { width: 100%; }
        }
        
        @keyframes blink {
          50% { border-color: transparent; }
        }
        
        .typing-effect {
          width: 100%;
          animation: typing 5s steps(50, end), blink 0.75s step-end infinite;
        }

        @media (max-width: 768px) {
            body{
                height: 155vh;
            }
            .btn-copy:hover {
            background-color: green;
        }
            .mt-2 {
                margin-top: 2rem !important;
            }
            .glass-container {
                margin-top: 1100px;
            }
            h2{
            font-size: 20px;
            text-align: center;
        }
        }
    </style>
</head>

<body id="ourbody" onload="check_new_version()">
<div class="glass-container">
    <h2>GAMKERS SET TOOL KIT</h2>
    <p class="typing-effect">GAMKERSET-KIT is an educational tool for ethical hacking and security research. Unauthorized use, including accessing webcams, microphones, or location data without consent, is illegal. The creators are not liable for misuse.</p>
    <div id="links"></div>

    <div class="mt-2 d-flex justify-content-center">
        <textarea class="form-control w-50 m-3" placeholder="result ..." id="result" rows="15" ></textarea>
    </div>

    <div class="mt-2 d-flex justify-content-center">
        <button class="btn btn-danger m-2" id="btn-listen">press to stop</button>
        <button class="btn btn-success m-2" id="btn-listen" onclick="saveTextAsFile(result.value,'log.txt')">Download Logs</button>
        <button class="btn btn-warning m-2" id="btn-clear">Clear Logs</button>
    </div>
</div>

<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/script.js"></script>
<script src="./assets/js/sweetalert2.min.js"></script>
<script src="./assets/js/growl-notification.min.js"></script>

</body>
</html>
