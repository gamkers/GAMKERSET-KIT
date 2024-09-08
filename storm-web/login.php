<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: #0a0a0a;
            color: #00ff00;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .glass-container {
            background: rgba(0, 20, 0, 0.6);
            border-radius: 8px;
            padding: 20px;
            backdrop-filter: blur(5px);
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.1);
            border: 1px solid #00ff00;
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: #00ff00;
        }

        .glass-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #00ff00;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
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

        .btn-primary {
            background-color: #00ff00;
            border-color: #00ff00;
            color: #000;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: rgba(0, 255, 0, 0.8);
            border-color: #00ff00;
            color: #000;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
        }

        .glitch {
            position: relative;
            display: inline-block;
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
            clip: rect(0, 0, 0, 0);
            animation: glitch-anim 5s infinite linear alternate-reverse;
        }

        .glitch::after {
            left: -2px;
            text-shadow: -2px 0 #00ffff;
            clip: rect(0, 0, 0, 0);
            animation: glitch-anim 5s infinite linear alternate-reverse;
        }

        @keyframes glitch-anim {
            0% {
                clip: rect(0, 9999px, 0, 0);
            }
            10% {
                clip: rect(0, 9999px, 0, 0);
            }
            20% {
                clip: rect(0, 9999px, 0, 0);
            }
            30% {
                clip: rect(0, 9999px, 0, 0);
            }
            40% {
                clip: rect(0, 9999px, 0, 0);
            }
            50% {
                clip: rect(0, 9999px, 0, 0);
            }
            60% {
                clip: rect(0, 9999px, 0, 0);
            }
            70% {
                clip: rect(0, 9999px, 0, 0);
            }
            80% {
                clip: rect(0, 9999px, 0, 0);
            }
            90% {
                clip: rect(0, 9999px, 0, 0);
            }
            100% {
                clip: rect(0, 9999px, 0, 0);
            }
        }
    </style>
</head>
<body>
    <div class="glass-container">
        <div class="glitch" data-text="G4MKR5X53T">G4MKR5X53T</div>
        <form action="" method="POST">
            <h2 class="form-signin-heading">Please login</h2>
            <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><br>
            <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (isset($CONFIG[$username]) && $CONFIG[$username]['password'] == $password) {
                        $_SESSION['IAm-logined'] = $username;
                        echo '<script>location.href="panel.php"</script>';
                    } else {
                        echo '<p class="error-message">Username or password is incorrect!</p>';
                    }
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
