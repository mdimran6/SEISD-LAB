<?php include('server1.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>registation</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="reg css.css">
</head>
  <body>



<form class="box" method="post" action="ARREG.php">
  <h1>Registation</h1>
  <input type="text" name="username" placeholder="Username">
  <input type="text" name="email" placeholder="Email Account">
  <input type="text" name="phone" placeholder="Phone Number">
  <input type="text" name="code" placeholder="CODE">
    <input type="password" name="password_1" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase letter, and at least 8 or more characters"placeholder="Password">
  <input type="password" name="password_2" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase letter, and at least 8 or more characters"placeholder="Confirm Password">
  <div class="container text-center headerset">
  <button class="btn btn-success text-light" name="reg_user">REGISTER</button>
  </div>
      <p class="text-success pt-4">
      Already a member: <a class="text-white" href="ARLOG.php">SIGN IN</a>
    </p>
</form>
</body>
</html>
