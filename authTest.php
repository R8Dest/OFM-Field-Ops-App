

<?php
	include 'functions.php';
		session_start();

		$token = "b7f241acb072f484f0a79ea9889d1d03";
		$domainID = "259890691";
		$DUcontainerID = "299386377";
		$playerContainerID = "";
		
		/*
		
		//$authorization = "Authorization: Bearer b7f241acb072f484f0a79ea9889d1d03";

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/display_unit/v12?domain_id=259890691');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		
		
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization', 'OAuth ' . $token));
		//curl_setopt($ch, CURLOPT_POST, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Bearer b7f241acb072f484f0a79ea9889d1d03';
		//$headers[] = 'Content-Type: application/json';
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		//curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, "b7f241acb072f484f0a79ea9889d1d03");

		$result = curl_exec($ch);
		//echo $result;
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		
		//echo $result;
		
		
		//$json_data = file_get_contents("test_input.json");
		
		*/
		
		
		
		
		$displayUnitJSON = getDisplayUnitJson($token, $domainID, $DUcontainerID);
		$playerJSON = getPlayerJson($token, $domainID, "");
		
		echo getplayerIDFromJson($playerJSON, "IMP002");
		echo "<br>";
		echo getplayerNameFromJson($playerJSON, getplayerIDFromJson($playerJSON, "IMP002"));
		
		$decode_data = json_decode($displayUnitJSON);
		$arCount = 0;
		$temp = 0;
		
		if (is_array($decode_data->display_unit)){
			
			//echo $decode_data->display_unit[0]->name;
			
			foreach($decode_data->display_unit as $key=>$value){
				//echo "<br>";
				//echo $value->id;
				$arCount = $arCount+1;
			}
			
			$ar = array_fill(0, $arCount, $arCount);
			
			foreach($decode_data->display_unit as $key=>$value){
				$ar[$temp] = $value->name;
				$temp = $temp+1;
			}
			
			$_SESSION['array']=$ar;
			//echo $_SESSION['array'][3];
			//return $ar;
		
		}
		

?>


<html lang="en">




<head>
  <title>OFM Broadsign Deployment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="readSessionArray()">

<form method="post" action="authTest.php">
	<div class="row">
	<div class="col-sm-5">
		<p><b>*****TESTING*****</b></p> 
		</div>
		<div class="col-sm-4">
		<p>
			<select name="Player_ID" id="IDSelect" onchange="enableOptions()">
			<option value="" disabled selected hidden>Returned Player Names</option>
			</select>
		</p> 
		</div>
		</div>
	  </p>
</form>

</body>
</html>


<script>
function readSessionArray() {
		var jArray = <?php 
		
		
		echo json_encode($_SESSION['array']); 
		//echo json_encode($_SESSION);
		
		?>;
	  
		var select = document.getElementById("IDSelect"); 
		//var options = ["1", "2", "3", "4", "5"]; 
		var options = jArray;

		for(var i = 0; i < jArray.length; i++) {
			var opt = jArray[i];
			var el = document.createElement("option");
			el.textContent = opt;
			el.value = opt;
			select.appendChild(el);
		}
	}
	  
	  
</script>


