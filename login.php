<?php 
session_start(); 
$_SESSION['LOGIN']="";
$_SESSION['MSGI']="";
if (isset($_POST['submit'])) {
  if ($_POST['LoginContact_input']=="admin" && $_POST['PassContact_input']==="GRCL2021@") {

          $_SESSION['LOGIN']="OKEYGO";
          header("location:index.php");
          
      }
      else
      {
          $_SESSION['MSGI']="Login ou pass incorrect !";
      }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard KGLINK | Login</title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/css/animate.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="container" style="padding-top: 40px">
            <form action="" method="post">
              <h1>Login</h1>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="LoginContact_input" required="" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="PassContact_input" required="" />
              </div>
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default">Login</button>
              </div>
              <div class="form-group">
              <p><?=$_SESSION['MSGI']?></p>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
