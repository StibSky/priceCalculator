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

        //make array of user objects
        $makeUser = new UserMaker();
        $everyone = $makeUser ->fetchUsers();

        for ($i = 0; $i < count($everyone); $i++) {
            $userArray[$everyone[$i]['id']] = new User($everyone[$i]['id'], $everyone[$i]['name'], $everyone[$i]['group_id']);
        }


        //make array of product objects
     


        //make array of group objects
        $makeProduct = new ProductMaker();
        $allProducts = $makeProduct -> fetchProducts();

        for ($i = 0; $i < count($allProducts); $i++) {

            $productArray[$allProducts[$i]['id']] = new Product($allProducts[$i]['id'], $allProducts[$i]['name'], $allProducts[$i]['description'], $allProducts[$i]['price']);
        }

        $userId ="";
        if (!isset($_POST['users'])) {
           $_POST['users'] = "test";
        } else {
            $userId = $_POST['users'];
        }

        //should compare id in some kind of loop, hardcoding right now, not safe if people add elements in json
       // echo $userArray[$userId]->getName().'<br>';  // ask for the username
        echo $userArray[$userId]->getId().'<br>';   // get the userid

        if (!isset($_POST['product'])) {
            $_POST['product'] = "test";
        } else {
            $productId = $_POST['product'];
        }

        //echo $productArray[$productId]->getProductDescription().'<br>';  // get the productdescription
        //echo $productArray[$productId]->getProductPrice();  // get the productprice

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.    echo($everyone[0]);
        //load the view

        require 'View/homepage.php';


    }
}