<?php


	class AppManager{
		#Application settings
		private function AppSettings(){
			return ['DATABASE' => [
						'HOST' => 'localhost',
						'USER_NAME' => 'root',
						'PASSWORD' => '',
						'DATABASE' => 'grc'
					]
			];
		}

		/// Database connection function which will retrun (mysqli) connection
		public function dbConn(){
			$dbFunc = $this->AppSettings();
			$host_name = $dbFunc['DATABASE']['HOST'];
			$user_name = $dbFunc['DATABASE']['USER_NAME'];
			$password = $dbFunc['DATABASE']['PASSWORD'];
			$database = $dbFunc['DATABASE']['DATABASE'];

			$mysqli = mysqli_connect($host_name, $user_name, $password, $database );	
			
			if($mysqli == true){
				return $mysqli;
			}
			else{
				echo "Error while connecting database! Error Desc-" .mysqli_connect_error();
			}
			
		}
	}
	$obj = new AppManager;

	//print_r($obj->dbConn());
?>