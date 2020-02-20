<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="price calculator login">
    <meta name="author" content="Steve & Ann @becode">
    <title>Price calculator - login page</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="ownCSS.css">
</head>

<body class="text-center">
<form class="form-signin">
    <h1 class="h3 mb-2 font-weight-normal">Price calculator</h1>
    <img class="mb-0" src="img/becode-4.png" alt="becode-4.png">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" required autofocus>
    <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>
    <div class="checkbox mb-1">
        <label>
            <input type="checkbox" value="remember-me" class="mb-1"> Remember me
        </label>
    </div>
    <button class="btn btn-secondary mb-3 btn-block" type="submit">sign in</button>
    <p class="mt-2 text-muted">&copy; 2020</p>
</form>
</body>
</html>

<?php
require("Controller/HomepageController.php");

// this must be placed on the controller page
if($_POST['submit_2']){
    $user=$_POST['user'];
    $password=$_POST['password'];

    if(($user=='admin')&&($password=='WachtWoord123')){

        echo  '<script language=\'javascript\'>document.querySelector("#user").innerHTML = "You may pass!"</script>';

    }else{
        echo  '<script language=\'javascript\'>document.querySelector("#user").innerHTML = "wrong password or user!"</script>';
    }
}
?>
