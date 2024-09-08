<?php
session_start();
include "config.php";
include "./assets/components/login-arc.php";

if(isset($_COOKIE['logindata']) && $_COOKIE['logindata'] == $key['token'] && $key['expired'] == "no"){
    $_SESSION['IAm-logined'] = 'yes';
	header("location: panel.php");
}

elseif(isset($_SESSION['IAm-logined'])){
	header('location: panel.php');
	exit;
}

else{ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap');

        body {
            font-family: 'Share Tech Mono', monospace;
            background-color: #0a0a0a;
            color: #00ff00;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            overflow: hidden;
        }

        .wrapper {
            background-color: rgba(0, 20, 0, 0.6);
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.2);
            border: 1px solid #00ff00;
            text-align: center;
            width: 100%;
            max-width: 400px;
            transition: all 0.3s ease;
        }

        .wrapper:hover {
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.3);
        }

        .title h1 {
            font-size: 24px;
            color: #00ff00;
            margin-bottom: 20px;
            text-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }

        .form-signin {
            margin-top: 20px;
        }

        .form-control {
            background-color: rgba(0, 20, 0, 0.8);
            color: #00ff00;
            border: 1px solid #00ff00;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .form-control:focus {
            background-color: rgba(0, 20, 0, 0.9);
            border-color: #00ff00;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.25);
        }

        .btn-primary {
            background-color: #000;
            border-color: #00ff00;
            color: #00ff00;
        }

        .btn-primary:hover {
            background-color: #00ff00;
            color: #000;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }

        .error-message {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>
  <div class="wrapper">
    <div class="title">
      <h1>G4MKR5X53T</h1>
    </div>
    <form action="" class="form-signin" method="POST">
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

      <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['username']) && isset($_POST['password'])){
          $username = $_POST['username'];
          $password = $_POST['password'];

          if(isset($CONFIG[$username]) && $CONFIG[$username]['password'] == $password){
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

<?php
}
?>
