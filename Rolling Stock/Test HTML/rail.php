<?php


function callerFunction()
{
	$Player_ID = (int) $_POST ['Player_ID'];
	$Train_Type = (string) $_POST ['Train_Type'];
	$Car = (int) $_POST ['Car'];
	$Screen_Type  = (string) $_POST ['Screen_Type'];
	$Location  = (int) $_POST ['Location'];
	
	echo "Location: " .$Location. "<br>";
	echo "Player_ID: " .$Player_ID. "<br>";
	echo "Train_Type: " .$Train_Type. "<br>";
	echo "Car: " .$Car. "<br>";
	echo "Screen_Type: " .$Screen_Type. "<br>";
	
	//Do Stuff
	jsonDecode();
	
	
	
	
}


function echoBack(){
	
}


function getPlayerIDFromJSON(){
	
	try {

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
			return $ar;
			
		}
		
		else {
			echo "no array";
		}
		

	}
	
	catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}


}


if(isset($_POST['submit']))
{
	callerFunction();
} 



?>