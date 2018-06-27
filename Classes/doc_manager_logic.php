<?php 
	require_once('Init.php');
	class DocManager{
		public $dbConn;
		public $obj_appManager;

		public function __construct(){
			$this->obj_appManager = new AppManager;
			$this->dbConn = $this->obj_appManager->dbConn();
		}

		function getAvailableMasterDocCodes(){
			$sql = "select dcm_code, dcm_name from document_master_category where dcm_is_active = 1";
			$result = $this->dbConn->query($sql);
			$data = array();
			if($result !== false){
				while($r = mysqli_fetch_assoc($result))
				{
					$data[] = $r;
				}
			}
			else{
				echo "Error Occured while getting list of available options for Document Master Category!";
			}
			return $data;
		}

		function getAvailabeSubDocCodes($master_menu_code){
			$sql = "select dcs_code, dcs_name from document_sub_category where dcs_is_active = 1 and dcm_code = '$master_menu_code'";
			$result = $this->dbConn->query($sql);
			$data = array();
			if($result !== false){
				while($r = mysqli_fetch_assoc($result))
				{
					$data[] = $r;
				}
			}
			else{
				echo "Error Occured while getting list of available options for Document Master Category!</br>";
				echo $this->dbConn->error;
			}
			return $data;
		}
		// function to insert document details and generate a document serial number.
		function createDocument(){
				$data = json_decode(stripslashes($_POST['data']),true);
				
				$saved_data = array();

				$doc_master_code = $data[0]['value'];
				$doc_sub_code = $data[1]['value'];
				$doc_grower_code = $data[2]['value'];
				$doc_remarks = $data[3]['value'];
				
				$result = $this->dbConn->query("call sp_getNextDocumentNumber('$doc_master_code', '$doc_sub_code','$doc_grower_code','$doc_remarks')") or die($this->dbConn->error);
				$row = mysqli_fetch_assoc($result);
				
				if($result !== false){
					//echo 'Document number generated- Document number is- ' . $row["@doc_number"];
					$saved_data['message'] =  'Document number generated- Document number is- ' . $row["@doc_number"];
					$saved_data['master_code'] = $doc_master_code;
					$saved_data['sub'] = $doc_sub_code;
					$saved_data['grower_code'] = $doc_grower_code;
					$saved_data['document_number'] = $row["@doc_number"];
					print_r(json_encode($saved_data));
					// return $saved_data ;
				}	
				else{
					echo 'Error: Failed to create new society!'.mysqli_error($this->dbConn);
				}
			}
	}



	$obj = new DocManager;
	$path = array();
	$request_uri = $_SERVER["REQUEST_URI"];
	$request_array = explode('?',$request_uri);
	$path['base'] = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/');
	
		if(isset($request_array[1])){
			$path['method'] = rtrim($request_array[1]);
		}
		else{
			$path['method'] = null;
		}
		if(isset($request_array[2]))
		{
			$path['param'] = rtrim($request_array[2]);	
		}
		else{
			$path['param'] = null;		
		}
	

	//$path['param'] = rtrim($request_array[2]);
	$array = array();
	switch ($path['method']) {
		case 'master_categ':
			$array = $obj->getAvailableMasterDocCodes();
			echo json_encode($array);
			break;
		case 'sub_categ':
			$array = $obj->getAvailabeSubDocCodes($path['param']);
			echo json_encode($array);
			break;
		case 'submit':
			$obj->createDocument();
		break;
		default:
			
			break;
	}
	
		//$obj->createDocument();
?>


