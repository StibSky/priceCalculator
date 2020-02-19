<nav class="navbar navbar-expand-md fixed-top bg-secondary">
    <form class="form-inline mt-2" id="form_2" method="post" action="#">
        <input class="form-control float-md-right mr-sm-2" type="text" placeholder="User" aria-label="user" name="user" id="user">
        <input class="form-control float-md-right mr-sm-2" type="password" placeholder="Password" aria-label=password" name="password" id="password">
        <button class="btn btn-secondary float-md-right my-2 my-sm-0" type="submit" id="submit_2" name="submit_2">Logon</button>
    </form>
</nav>
<?php
// this must be placed on the controller page
if($_POST['submit_2']){
    $user=$_POST['user'];
    $password=$_POST['password'];

    if(($user=='admin')&&($password=='WachtWoord123')){

        echo  '<script>document.querySelector("#user").innerHTML = "You may pass!"</script>';

    }else{
        echo  '<script>document.querySelector("#user").innerHTML = "wrong password or user!"</script>';
    }
}
?>
