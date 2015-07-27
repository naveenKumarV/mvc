<?php
    require '../app/Controllers/UserController.php';


    if(isset($_GET['url']) && $_GET['url'] == 'auth/register')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $a = new UserController();
            $a->register($_POST);
        }
        else{
            header('Location: ../views/register.php');
        }
    }
    else if(isset($_GET['url']) && $_GET['url'] == 'auth/login')
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $a = new UserController();
            $a->login($_POST);
        }else{
            //ob_start();
            header('Location: ../views/login.php');
        }
    }

?>