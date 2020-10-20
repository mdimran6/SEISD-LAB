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
<link rel="stylesheet" type="text/css" href="log css.css">
</head>
<body>
<img src="log2.png" alt="logo" style="width:200px;height:220px;">

<h2 class="text-secondary pl-3">GAMING HUB</h2>
<div>

 <form class="container" method="post" action="ARLOG.php">
    <h1 class="a text-success">ADMIN Login</h1>

    <label for="email"><b class="text-light">Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b class="text-light">Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="submit" class="btn">Login</button>
    <p class="text-warning pt-4">
      Don't have a Account: <a class="box text-white" href="ARREG.php">SIGN UP</a>
    </p>
  </form>
</div>
</body>
</html>