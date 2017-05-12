<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: lecturer.php");
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MFS Login</title>
  <link rel="shortcut icon" href="http://localhost/mfs/resources/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="http://localhost/mfs/css/style.css">
  <script src="http://localhost/mfs/js/prefixfree.min.js"></script>

</head>

<body>
  <div class="login">
	<h1>CDU MFS Portal</h1>
	<img src="http://localhost/mfs/resources/images/cdu-logo.png" alt="Charles Darwin University" title="Charles Darwin University" width="230" height="120">
    <form method="post">
    	<input type="text" name="username" placeholder="Enter Session Key" required="required" />
        <!-- <input type="password" name="password" placeholder="Password" required="required" /> -->
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Sign in</button>
    </form>
    <p class="footy">Copyright © 2017 Charles Darwin University</p>
</div>
</body>
</html>
