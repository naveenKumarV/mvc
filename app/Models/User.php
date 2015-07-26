<?php

	require 'Model.php';
	
	
	class User extends Model
	{
		protected $table = 'users';

        protected $attributes = ['username'=>'varchar(20)',
                                'password' => 'varchar(50)',
                                'email'    => 'varchar(50)'];

	}

?>