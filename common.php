<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tatvasoft_db";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	//View
	if(isset($_GET['action']) && $_GET['action'] == 'View'){
		$id = @$_GET['id'];
		if($id != ''){
			$sql = "SELECT * FROM event_master WHERE id = $id";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$returnData = $result->fetch_assoc();
				
			}else{
				$returnData['status'] = false;
				$returnData['msg']  = 'No data available';
			}		
		}else{
			$returnData = array('status' => false, 'msg' => 'Invalid id');
		}
		echo json_encode($returnData);
	}

	//Delete
	if(isset($_GET['action']) && $_GET['action'] == 'Delete'){
		$id = @$_GET['id'];
		if($id != ''){
			$sql = "DELETE FROM event_master WHERE id = $id";
			if (mysqli_query($conn, $sql)) {
				$returnData = array('status' => true, 'msg' => 'Record deleted successfully');
			}else{
				$returnData = array('status' => false, 'msg' => 'Unable to delete the record');
			}		
		}else{
			$returnData = array('status' => false, 'msg' => 'Invalid id');
		}
		echo json_encode($returnData);
	}

	//Listing
	if(isset($_GET['action']) && $_GET['action'] == 'Listing'){
		$sql = "SELECT id, title, start_date FROM event_master WHERE record_status = 1";
		$result = $conn->query($sql);
		$returnData = array();
		if ($result->num_rows > 0) {
			$data = $result->fetch_assoc();
			while($row = $result->fetch_assoc()) {
				array_push($returnData,$row);
			}	
		}
		if(!empty($returnData)){
			echo json_encode($returnData);
		}else{
			$returnData['status'] = false;
			$returnData['msg']  = 'No data available';
			echo json_encode($returnData);
		}
	}

	//Insert
	if(isset($_GET['action']) && $_GET['action'] == 'submit'){
		$eventTitle 		= 	@$_GET['eventTitle'];
		$startDate 			= 	(isset($_GET['startDate']) && $_GET['startDate'] != '')?date('Y-m-d', strtotime($_GET['startDate'])):'';
		$repeatOccurence 	= 	@$_GET['repeatOccurence'];
		$repeatType 		= 	@$_GET['repeatType'];
		$occuranceStatus 	= 	@$_GET['occuranceStatus'];
		$afterNo 			= 	@$_GET['afterNo'];
		$day 				=   @$_GET['day'];

		$sql = "INSERT INTO event_master  (title, start_date, repeat_every, repeat_type, repeat_occurence ";
		if($repeatType == 'week' && $day != '')
			$sql .= " , repeat_type_val ";
		 $sql .= " ) VALUES ('{$eventTitle}', '{$startDate}', {$repeatOccurence}, '{$repeatType}', '{$occuranceStatus}'";
		 if($repeatType == 'week' && $day != '')
		 	$sql .= " , '{$day}' ";
		 $sql .= ")";

		if ($conn->query($sql) === TRUE) {
		  $returnData['status'] = true;
		  $returnData['msg'] = "New record created successfully";
		  echo json_encode($returnData);
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
?>