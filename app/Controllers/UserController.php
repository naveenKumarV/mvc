<?php


require '../app/Models/User.php';


     class UserController
     {

         public function login($data)
         {
             $user = new User();
             $values = [
                 'username' => $data['username'],
                 'password' => md5($data['password'])
             ];

         }

         public function register($data)
         {
             $user = new User();
             $user->insert([
                     'username'=>$data['username'],
                     'password'=>md5($data['password']),
                     'email'   =>$data['email']
                 ]);
             //header('Location: ../home.php');
         }
     }

?>