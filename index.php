<?php session_start();
ob_start(); ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Math Game</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <meta charset="utf-8"/>
</head>
<?php
    $email = $error = $password ="";
    $correct = $total = 0;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $_SESSION["total"] = $total;
        $_SESSION["correct"] = $correct;
    
        if ($email == "a@a.a" && $password == "aaa"){
            header('Location: mathgame.php');
        } else {
            $error = "Invalid login credentials.";
        }
    }
    ?>
<body>
<div class="container"><div class="row">
    <div class="col-sm-10 col-sm-offset-1"><h1>Please login to enjoy our math game.</h1></div>
    <div class="col-sm-1"></div>
</div>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" role="form" class="form-horizontal">
    <div class="form-group">
        <div class="col-sm-4 text-right">Email:</div>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email);?>"placeholder="Email" size="6">
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 text-right">Password:</div>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($password);?>"placeholder="Password" size="6">
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-3 col-sm-offset-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </div>
    <div class = "text-center">
        <p style="color:red"><?php echo $error ?></p>
    </div>
</form>
<div class="row">
</div>
    </div>
</body>
</html>