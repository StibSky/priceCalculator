<?php
declare(strict_types=1);
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
        $everyone = $makeUser->fetchUsers();

        for ($i = 0; $i < count($everyone); $i++) {
            $userArray[$everyone[$i]['id']] = new User($everyone[$i]['id'], $everyone[$i]['name'], $everyone[$i]['group_id']);
        }


        //make array of product objects
        $makeGroups = new GroupMaker();
        $allGroups = $makeGroups->fetchGroups();



        for ($i = 0; $i < count($allGroups); $i++) {
            if (!isset($allGroups[$i]['variable_discount'])) {
                $allGroups[$i]['variable_discount'] = 0;
            } elseif (!isset($allGroups[$i]['fixed_discount'])) {
                $allGroups[$i]['fixed_discount'] = 0;
            }

            if (!isset($allGroups[$i]['group_id'])) {
                $allGroups[$i]['group_id'] = 0;
            }

            $groupArray[$allGroups[$i]['id']] = new Groups($allGroups[$i]['id'], $allGroups[$i]['name'], $allGroups[$i]["variable_discount"],$allGroups[$i]["fixed_discount"], $allGroups[$i]['group_id']);
        }


        var_dump($groupArray);

        //make array of group objects
        $makeProduct = new ProductMaker();
        $allProducts = $makeProduct->fetchProducts();

        for ($i = 0; $i < count($allProducts); $i++) {

            $productArray[$allProducts[$i]['id']] = new Product($allProducts[$i]['id'], $allProducts[$i]['name'], $allProducts[$i]['description'], $allProducts[$i]['price']);
        }

        $userId = "";
        if (!isset($_POST['users'])) {
            $_POST['users'] = "test";
        } else {
            $userId = $_POST['users'];
        }

        //should compare id in some kind of loop, hardcoding right now, not safe if people add elements in json
        // echo $userArray[$userId]->getName().'<br>';  // ask for the username
        echo $userArray[$userId]->getId() . '<br>';   // get the userid

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