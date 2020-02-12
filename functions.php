<?php


function getDisplayUnitJson($token, $domainID, $containerID) {

$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/display_unit/v12?container_id='.$containerID.'&domain_id='.$domainID);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Bearer '.$token;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);		
		return $result;
}


function getPlayerJson($token, $domainID, $containerID) {

$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16?container_id='.$containerID.'&domain_id='.$domainID);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Bearer '.$token;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);		
		return $result;
}

function getCriteriaJson($token, $domainID) {

$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/criteria/v8?domain_id='.$domainID);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$headers = array();
		$headers[] = 'Accept: application/json';
		$headers[] = 'Authorization: Bearer '.$token;
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$result = curl_exec($ch);

		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);		
		return $result;
}


function getDisplayUnitNameFromJson($json, $displayUnitID) {

$decode_data = json_decode($json);
		$arCount = 0;
		$temp = 0;
		$value = 0;
		
		if (is_array($decode_data->display_unit)){
			
			foreach($decode_data->display_unit as $key=>$value){
				if ($value->id == $displayUnitID){
					return $value->name;
				}
			}
		
		return "NULL";
	}
}

function getDisplayUnitIDFromJson($json, $name) {

	$decode_data = json_decode($json);
	$arCount = 0;
	$temp = 0;
	$value = 0;
		
	if (is_array($decode_data->display_unit)){
			
		foreach($decode_data->display_unit as $key=>$value){
			if ($value->name == $name){
				return $value->id;
			}
		}
		
		return "NULL";
	}
}

function getPlayerNameFromJson($json, $playerID) {

$decode_data = json_decode($json);
		$arCount = 0;
		$temp = 0;
		$value = 0;
		
		if (is_array($decode_data->host)){
			
			foreach($decode_data->host as $key=>$value){
				if ($value->id == $playerID){
					return $value->name;
				}
			}
		
		return "NULL";
	}
}

function getplayerIDFromJson($json, $name) {

$decode_data = json_decode($json);
		$arCount = 0;
		$temp = 0;
		$value = 0;
		
		if (is_array($decode_data->host)){
			
			foreach($decode_data->host as $key=>$value){
				if ($value->name == $name){
					return $value->id;
				}
			}
		
		return "NULL";
	}
}

function folderExists($name, $token) {
	//Function Stub
	//return boolean
}

function makeFolder($name, $token) {
	//Function Stub
	//Return folder ID
}

function getCriteriaID($name, $token) {
	//Function Stub
	//return ID
}

function addCriteriaToDisplayUnit($displayUnitID, $criteriaID, $token) {
	//Function Stub
	//return boolean
}

function assignPlayerToDisplayUnit($displayUnitID, $playerID, $token) {
	//Function Stub
	//return boolean
}

function renamePlayer($newNameID, $playerID, $token) {
	//Function Stub
	//return boolean
}

function movePlayer($newFolderID, $playerID, $token) {
	//Function Stub
	//return boolean
}

function assignCriteriaToDisplayUnit($displayUnitID, $side, $location, $groupNumber, $carNumber, $trainNumber, $screenType, $trainType, $token) {
	//Function Stub
	//use getCriteriaID 
	//return boolean
}


?>