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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="wrapper">
      <div class="title">
        <h1>GAMERS SET TOOL KIT</h1>
      </div>
      <form action="" class="form-signin" method="POST">       
        <h2 class="form-signin-heading">Please login</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" /><br>
        <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 

        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            if(isset($CONFIG[$username]) && $CONFIG[$username]['password'] == $password){
              $_SESSION['IAm-logined'] = $username;
              echo '<script>location.href="panel.php"</script>';
            }else{
              echo '<p style="color:red" ><br>Username or password is incorrect!</p>';
            }
          }
        }
        ?>
      </form>
    </div>
  </div>

  <style>
    body, html {
        height: 100%;
        margin: 0;
        background-color: #121212;
        font-family: Arial, sans-serif;
    }
    .form-signin{
        background-color: #000;
        border-color: #28a745;
    }
	
    .wrapper {
        width: 100%;
        max-width: 400px;
        padding: 40px;
        background-color: #000;
        border-radius: 10px;
        color: white;
        text-align: center;
    }

    .title h1 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #F0F0F0;
    }

    .form-control {
        margin-bottom: 10px;
        padding: 10px;
        font-size: 16px;
        background-color: #1a1a1a;
        color: #FFF;
        border: none;
        border-radius: 5px;
    }

    .btn {
        background-color: #FFF;
        border-color: #28a745;
    }

    .btn:hover {
        background-color: #fff;
    }

    .container-fluid {
        min-height: 100vh; /* Ensures full-page coverage */
		background-color: #1a1a1a;
    }

	

    @media (max-width: 768px) {
        .wrapper {
            margin: 20px;
            padding: 20px;
        }
        .title h1 {
            font-size: 20px;
        }
    }
  </style>
</body>
</html>

<?php
}
?>
