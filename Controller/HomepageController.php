<?php
declare(strict_types = 1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class HomepageController
{
    //render function with both $_GET and $_POST vars available if it would be needed.
    public function render()
    {

        $makeUser = new UserMaker();
        $everyone = $makeUser ->fetchUsers();

        $makeProduct = new ProductMaker();
        $allProducts = $makeProduct -> fetchProducts();

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.    echo($everyone[0]);
        //load the view
        require 'View/homepage.php';


    }
}