<?php
require_once('Init.php');
 

	Class Society{
		public $dbConn;
		public $obj_appManager;
		public function __construct(){
			
			$this->obj_appManager = new AppManager;
			$this->dbConn = $this->obj_appManager->dbConn();

		}

		function createSociety($soc_code, $soc_name){

			$sql = "insert into society_master(soc_code, soc_name) values ('$soc_code', '$soc_name')";
			if(mysqli_query($this->dbConn, $sql)){
				echo 'Record Inserted';
			}
			else{
				echo 'Error: Failed to create new society!'.mysqli_error($this->dbConn);
			}
		}

		function updateSociety($soc_code, $soc_name, $soc_address, $soc_incharge){
			
		}
		function getSocietyDetails($soc_code){
			// get society detaile by its code
		}
	}

	$obj = new Society;
	
		$soc_code = $_POST['txtSocietyCode'];
		$soc_name = $_POST['txtSocietyName'];
		
		$obj->createSociety($soc_code, $soc_name);
	
	
?>