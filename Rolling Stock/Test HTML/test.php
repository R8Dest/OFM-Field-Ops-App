<!DOCTYPE html>


<?php

		session_start();

		$json_data = file_get_contents("test_input.json");
		$decode_data = json_decode($json_data);
		$arCount = 0;
		$temp = 0;
		
		if (is_array($decode_data->client_registration)){
			
			//echo $decode_data->client_registration[0]->id;
			
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



<html lang="en">
<head>
  <title>OFM Broadsign Deployment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="phpGo()>

<form name="login" method="post" action="rail.php">

<div class="jumbotron text-center">
  <h1 style="color:#660099;"><b>OUTFRONT</b> Media</h1>
  <p>Rail Deployment</p> 
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3></h3>
      <p>
	
	<div class="row">
	<div class="col-sm-5">
		<p><b>Player ID:</b></p> 
		</div>
		<div class="col-sm-4">
		<p>
			<select name="Player_ID" id="IDSelect" onchange="enableOptions()">
			<option value="" disabled selected hidden>Select ID</option>
			<option value="260689719">260689719</option>
			<option value="455668123">455668123</option>
			<option value="12455789">12455789</option>
			<option value="189223488">189223488</option>
			<option value="260689719">260689719</option>
			<option value="455668123">455668123</option>
			<option value="12455789">12455789</option>
			<option value="189223488">189223488</option>
			<option value="260689719">260689719</option>
			<option value="455668123">455668123</option>
			<option value="12455789">12455789</option>
			<option value="189223488">189223488</option>
			<option value="260689719">260689719</option>
			<option value="455668123">455668123</option>
			<option value="12455789">12455789</option>
			<option value="189223488">189223488</option>
			</select>
		</p> 
		</div>
		</div>
	  </p>
	  
	<script>

		var jArray = <?php echo json_encode($ar); ?>;
	  
		var select = document.getElementById("IDSelect"); 
		//var options = ["1", "2", "3", "4", "5"]; 
		var options = jArray;

		for(var i = 0; i < options.length; i++) {
			var opt = options[i];
			var el = document.createElement("option");
			el.textContent = opt;
			el.value = opt;
			select.appendChild(el);
		}
	  
	  
	</script>
      
    </div>

    <div class="col-sm-4">
      <h3></h3>
      <p>
	
	    <div class="row">
		
			<div class="col-sm-6">
				<p>Train Type:</p>
			
			</div>
		
			<div class="col-sm-2">
			
				<select name="Train_Type" id="TrainSelect" disabled>
				<option value="" disabled selected hidden>...</option>
				<option value="R211">R211</option>
				<option value="R62-GE">R62-GE</option>
				<option value="R62-WH">R62-WH</option>
				<option value="R62A-WH">R62A-WH</option>
				<option value="R142A">R142A</option>
				<option value="R179">R179</option>
				<option value="R188">R188</option>
				<option value="R46">R46</option>
				<option value="R32">R32</option>
				</select>
				<br><br>
			</div>
		</div>
	  	


	<div class="row">
		<div class="col-sm-6">
			<p>Car #:</p>
		</div>
		
		<div class="col-sm-2">
			<select name="Car" id="CarSelect" disabled>
			<option value="" disabled selected hidden>...</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			</select>
			<br><br>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-6">
			<p>Screen Type:</p> 
		</div>
		<div class="col-sm-2">
			<select name="Screen_Type" id="TypeSelect" disabled>
			<option value="" disabled selected hidden>...</option>
			<option value="QSM">QSM</option>
			<option value="MTA_QSM">MTA QSM</option>
			<option value="Cove">Cove CC48</option>
			</select>
			<br><br>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-6">
			<p>Location:</p> 
		</div>
		<div class="col-sm-2">
			<select name="Location" id="LocSelect" disabled>
			<option value="" disabled selected hidden>...</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			</select>
		</div>
	</div>
	  
	</p>
      
    </div>
    <div class="col-sm-4">
      <h3></h3>        

	  <!-- <button type="Submit" onclick="alert('Hello World!')">Submit</button> -->
	  	<input type="submit" name="submit" value="Submit">
	</form>
	  
    </div>
  </div>
</div>

<script>
function enableOptions() {
  document.getElementById("LocSelect").disabled = false;
  document.getElementById("TrainSelect").disabled = false;
  document.getElementById("CarSelect").disabled = false;
  document.getElementById("TypeSelect").disabled = false;
}

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


</body>
</html>


