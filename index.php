<?php
declare(strict_types=1);

//include all your model files here
require 'Model/User.php';
require 'Model/UserMaker.php';
require 'Model/Product.php';
require 'Model/ProductMaker.php';
require 'Model/Groups.php';
require 'Model/GroupMaker.php';
require 'Model/Calculator.php';
//include all your controllers here
require 'Controller/HomepageController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
$controller = new HomepageController();
$controller->render();