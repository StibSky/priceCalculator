<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="ownCSS.css">
    <title>Becode - login MVC</title>
</head>
<body  class="text-center">
    <form class="form-signin" id="form_2" method="post" action="#">
        <div class="row">
            <div class="col-3">
        <input class="form-control mr-sm-2" type="text" placeholder="User" aria-label="user" name="user" id="user">
        <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label=password" name="password" id="password">
        <button class="btn btn-secondary float-md-right my-2 my-sm-0" type="submit" id="submit_2" name="submit_2">Logon</button>
        </div>
        </div>
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
