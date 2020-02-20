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
<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1 class="h3 mb-2 font-weight-normal">Price calculator</h1>
    <img class="mb-0" src="img/becode-4.png" alt="becode-4.png">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <input type="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" name="user_email" required autofocus>
    <input type="password" id="inputPassword" name="password" class="form-control mb-3" placeholder="Password" required>
    <div class="checkbox mb-1">
        <label>
            <input type="checkbox" value="remember-me" class="mb-1"> Remember me
        </label>
    </div>
    <button class="btn btn-secondary mb-3 btn-block" type="submit" name="submit_2">sign in</button>
    <p class="mt-2 text-muted">&copy; 2020</p>
</form>
</body>
</html>

<?php
//require("Controller/HomepageController.php");
// this must be placed on the controller page
if($_POST['user_email']) {

    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    if ($user_email == 'admin@becode.be') {

        echo '<script language="javascript">document.getElementById("inputEmail").placeholder = 
            "right email!"; </script>';
        echo '<script language="javascript">document.getElementById("inputEmail").style.backgroundColor = "#DAF7A6"; </script>';

    } else {
        echo '<script language="javascript">document.getElementById("inputEmail").placeholder = 
            "wrong email!"; </script>';
        echo '<script language="javascript">document.getElementById("inputEmail").style.backgroundColor = "pink"; </script>';
    }
    if ($password == 'WachtWoord123') {

        echo '<script language="javascript">document.getElementById("inputPassword").placeholder = 
            "right email!"; </script>';
        echo '<script language="javascript">document.getElementById("inputPassword").style.backgroundColor = "#DAF7A6"; </script>';

    } else {
        echo '<script language="javascript">document.getElementById("inputPassword").placeholder = 
            "wrong password!"; </script>';
        echo '<script language="javascript">document.getElementById("inputPassword").style.backgroundColor = "pink"; </script>';
    }
    if(($user_email == 'admin@becode.be') && ($password == 'WachtWoord123')){
        header('Location: ../homepage.php/');
        //exit;
    }
}else{
    echo '<script language="javascript">document.getElementById("inputEmail").style.backgroundColor = "white"; </script>';
    echo '<script language="javascript">document.getElementById("inputPassword").style.backgroundColor = "white"; </script>';

}


// nog een register pagina maken en dan laten registreren in sessions en vergelijken bij login met de inhoud van de session of in een bestand opslaan, da's beter
/*<form id="demo" action=‘submit.php’ method=‘post’ enctype=‘text/plain’>
Naam: <input type=‘text’ name=‘web’ value="" /></br>
<input type=‘submit’ value=‘submit’ />
</form>
<?php

// dit zal zeker wél werken! :)
$file = 'people.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= "John Smith\n";
// Write the contents back to the file
file_put_contents($file, $current);
?>

header(‘location: thanks . html’);
exit(); */

?>
