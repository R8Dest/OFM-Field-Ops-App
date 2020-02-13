<html lang="en">




<head>
  <title>OFM Broadsign Deployment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="phpGo()">

<form method="post" action="test2.php">
	<div class="row">
	<div class="col-sm-5">
		<p><b>Player ID:</b></p> 
		</div>
		<div class="col-sm-4">
		<p>
			<select name="Player_ID" id="IDSelect" onchange="enableOptions()">
			<option value="" disabled selected hidden>Select ID</option>
			</select>
		</p> 
		</div>
		</div>
	  </p>
</form>

</body>
</html>




<?php

		session_start();

		$json_data = file_get_contents("test_input.json");
		$decode_data = json_decode($json_data);
		$arCount = 0;
		$temp = 0;
		
		if (is_array($decode_data->client_registration)){
			
			echo $decode_data->client_registration[0]->id;
			
			foreach($decode_data->client_registration as $key=>$value){
				//echo "<br>";
				//echo $value->id;
				$arCount = $arCount+1;
			}
			
			$ar = array_fill(0, $arCount, $arCount);
			
			foreach($decode_data->client_registration as $key=>$value){
				$ar[$temp] = $value->id;
				$temp = $temp+1;
			}
			
			$_SESSION['array']=$ar;
			//echo $_SESSION['array'][3];
			//return $ar;
		
		}


?>

<script>
function phpGo() {
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