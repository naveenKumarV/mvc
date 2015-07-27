<?php

require '../../app/Models/User.php';

$user = new User();

print_r($user->all());

?>