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


        //make array of group objects


        $userId = "";
        if (!isset($_POST['users'])) {
            $_POST['users'] = "test";
        } else {
            $userId = $_POST['users'];
        }

        //make array of product objects
        $makeProduct = new ProductMaker();
        $allProducts = $makeProduct->fetchProducts();

        for ($i = 0; $i < count($allProducts); $i++) {

            $productArray[$allProducts[$i]['id']] = new Product($allProducts[$i]['id'], $allProducts[$i]['name'], $allProducts[$i]['description'], $allProducts[$i]['price']);
        }


        $makeGroups = new GroupMaker();
        $allGroups = $makeGroups->fetchGroups();

        for ($i = 0; $i < count($allGroups); $i++) {
            if (!isset($allGroups[$i]['variable_discount'])) {
                $allGroups[$i]['variable_discount'] = 0;
            } elseif (!isset($allGroups[$i]['fixed_discount'])) {
                $allGroups[$i]['fixed_discount'] = 0;
            }

            if (!isset($allGroups[$i]['group_id'])) {
                $allGroups[$i]['group_id'] = 10000000;
            }

            $groupArray[$allGroups[$i]['id']] = new Groups($allGroups[$i]['id'], $allGroups[$i]['name'], $allGroups[$i]["variable_discount"], $allGroups[$i]["fixed_discount"], $allGroups[$i]['group_id']);
        }
        //should compare id in some kind of loop, hardcoding right now, not safe if people add elements in json


        if (!isset($_POST['product'])) {
            $_POST['product'] = "test";
        } else {
            $productId = $_POST['product'];
        }




        // THIS LOOPS SHOULD WORK BUT DOESNT YET, CHECK BELLOW FOR HARDCODING


//        function findgroup($id, $array)
//        {
//            foreach ($array as $group) {
//                if ($group->getGroupId() == $id) {
//                    return $group;
//                }
//            }
//        }
//
//        function getAllGroups($searchId)
//        {
//            $makeGroups = new GroupMaker();
//            $allGroups = $makeGroups->fetchGroups();
//
//            for ($i = 0; $i < count($allGroups); $i++) {
//                if (!isset($allGroups[$i]['variable_discount'])) {
//                    $allGroups[$i]['variable_discount'] = 0;
//                } elseif (!isset($allGroups[$i]['fixed_discount'])) {
//                    $allGroups[$i]['fixed_discount'] = 0;
//                }
//
//                if (!isset($allGroups[$i]['group_id'])) {
//                    $allGroups[$i]['group_id'] = 10000000;
//                }
//
//                $groupArray[$allGroups[$i]['id']] = new Groups($allGroups[$i]['id'], $allGroups[$i]['name'], $allGroups[$i]["variable_discount"], $allGroups[$i]["fixed_discount"], $allGroups[$i]['group_id']);
//            }
//            $groupsFound = [];
//
//            while ($searchId !== 10000000) {
//                $newGroup = findgroup($searchId, $groupArray);
//                array_push($groupsFound, $newGroup);
//                if ($newGroup->getGroupGroupId() !== 10000000)
//		    {
//                $searchId = $newGroup->getGroupGroupId();
//		    }
//		    else
//		    {
//                $searchID = 10000000;
//            }
//
//            }
//            return $groupsFound;
//        }
//
//       $customerGroupDisplay = getAllGroups($userArray[$userId]->getgroupId());


        //HARDCODING THE GROUPS OF A USER, SHOULD BE IN A LOOP
        $allUserGroups = [];

        $groupGroupId = $groupArray[$userArray[$userId]->getgroupId()]->getGroupGroupId();
        $userGroupId = $userArray[$userId]->getgroupId();


        array_push($allUserGroups, $groupArray[$userGroupId]);
        array_push($allUserGroups, $groupArray[$groupGroupId]);
        if ($groupArray[$groupGroupId]->getGroupGroupId() == 10000000) {

        } else {
            array_push($allUserGroups, $groupArray[$groupArray[$groupGroupId]->getGroupGroupId()]);
        }


        //array for all variable numbers
        $variableArray = [];
        //array for all fixed numbers
        $fixedArray = [];

        //forloop to fill the arrays
        for ($i = 0; $i < count($allUserGroups); $i++) {

            if ($allUserGroups[$i]->getFixedDiscount() != 0) {
                array_push($fixedArray, $allUserGroups[$i]->getFixedDiscount());
            }
            if ($allUserGroups[$i]->getVariableDiscount() != 0) {
                array_push($variableArray, $allUserGroups[$i]->getVariableDiscount());
            }

        }


        //gets the highest variable
        if (!empty($variableArray)) {
            $maxVariable = max($variableArray);
        } else {
            $maxVariable = 0;
        }

        //counts all the fixed numbers
        function countFixed($v1, $v2) {
            return $v1 + $v2;
        }


//counts all the fixed numbers
        if (!empty($fixedArray)) {
            $countFixed = array_reduce($fixedArray, "countFixed");
        } else {
            $countFixed = 0;
        }



        //the price - only the fixed reduction
        $fixedreductionResult = round($productArray[$productId]->getProductPrice() - $countFixed,2);
        if ($fixedreductionResult < 0) {
            $fixedreductionResult =0;
        }




        $variablePercentage = $maxVariable /100;

        $reductionVariable = $variablePercentage *$productArray[$productId]->getProductPrice();

        $variableReductionResult = round($productArray[$productId]->getProductPrice() - $reductionVariable,2);
//the price with only the variable reduction


        $compareArray = [];
        array_push($compareArray,$fixedreductionResult,$variableReductionResult );
        $winningDiscount = min($compareArray);

        //see what discount is better
        if ($winningDiscount == $fixedreductionResult ) {
        
        } elseif ($winningDiscount == $variableReductionResult ) {

        }


        $finalResultMinFixed = $productArray[$productId]->getProductPrice()- $countFixed;
        $finalResultPercentage = $finalResultMinFixed * $variablePercentage;

        //the final result
        $finalResult = round($finalResultMinFixed - $finalResultPercentage , 2);

        if ($finalResult < 0) {
            $finalResult = 0;
        }


        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.    echo($everyone[0]);
        //load the view

        require 'View/homepage.php';
    }
}