<?php
	spl_autoload_register(function($class){
		try{
			require_once "{$class}.php";
			
			}
		catch(Exception $e){
			echo "Caught Exception ". $e->getMessage();
		}
	});	
?>