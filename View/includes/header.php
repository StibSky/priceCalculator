<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .error{
            color:red;
        }
        .good{
            color:green;
        }
    </style>
        <title>Becode - priceCalculator MVC</title>
    </head>
    <body class="container-fluid">
<header>
    <nav class="navbar navbar-expand-md fixed-top bg-secondary">
        <form class="form-inline mt-2" id="form_2" method="post" action="#">
            <input class="form-control float-md-right mr-sm-2" type="text" placeholder="User" aria-label="user" name="user" id="user">
            <input class="form-control float-md-right mr-sm-2" type="password" placeholder="Password" aria-label=password" name="password" id="password">
            <button class="btn btn-secondary float-md-right my-2 my-sm-0" type="submit" id="submit_2" name="submit_2">Logon</button>
        </form>
    </nav>
</header>
    <?php
    // this must be placed on the controller page
    if($_POST['submit_2']){
        $user=$_POST['user'];
        $password=$_POST['password'];

        if(($user=='admin')&&($password=='WachtWoord123')){

            document.querySelector("#user").innerHTML = "You may pass!";

        }else{
                echo "wrong password or user!";
        }
    }
?>
