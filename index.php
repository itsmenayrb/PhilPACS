<?php
    require_once './models/Config.php';
    $config = new Config();
    if (isset($_SESSION['username'])) {
      $config->redirect('./system/');
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    <link rel="icon" href="./assets/logo/Logo.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./assets/logo/Logo.png" />

    <!-- <script src="./assets/js/require.min.js"></script> -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <!-- <script src="./assets/js/dashboard.js"></script> -->
    <script type="text/javascript" src="./assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="./assets/js/vendors/bootstrap.bundle.min.js"></script>

    <title>PhilPACS :: Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    
  </head>
  <body class="">
    <div class="brickwall"></div>
    <div class="loginBox">
      <div class="blur">
        <div class="background"></div>
      </div>
      <form action="<?=htmlspecialchars($_SERVER['REQUEST_URI']);?>" method="post" id="loginForm">
        <div class="text-center my-4">
          <span class="logo">
            <a href="./">
              <img src="./assets/logo/Logo.png" class="h-6" alt="PhilPACS">
            </a>
          </span>
        </div>
        <div class="card-body p-6">
          <div class="h6 text-center text-danger" id="login_message">Authentication Required</div>
          <div class="form-group mt-5">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" />
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          <button type="submit" class="btn btn-green" id="loginBtn" name="loginBtn">Sign in</button>
        </div>
      </form>

    </div>
    <script type="text/javascript" src="./ajax/ajax.login.js"></script>
  </body>
</html>