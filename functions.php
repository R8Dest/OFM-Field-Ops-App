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

function folderExists($name, $token, $domainID) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/container/v9?domain_id='.$domainID);
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

	$decode_data = json_decode($result);
	$arCount = 0;
	$temp = 0;
	$value = 0;
				
	if (is_array($decode_data->container)){
		foreach($decode_data->container as $key=>$value){
			if ($value->name == $name){
					return $value->id;
				}
			}
			return 0;
		}
		return 0;
}

function makeFolder($name, $parentID, $token, $domainID) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/container/v9/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
	"{ 
		\"container_id\": 0, 
		\"domain_id\": ".$domainID .", 
		\"group_id\": 0, 
		\"name\": \"".$name."\",
		\"parent_id\": ".$parentID.",
		\"parent_resource_type\": \"string\"
	}");

	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	return $result;
		
}

/*
//Makes a Folder in Root
function makeFolder($name, $token, $domainID) {
	return makeFolder($name, 0, $token, $domainID);
}
*/

function getCriteriaID($name, $token, $domainID) {
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

	$decode_data = json_decode($result);
	$arCount = 0;
	$temp = 0;
	$value = 0;
				
	if (is_array($decode_data->criteria)){
		foreach($decode_data->criteria as $key=>$value){
			if ($value->name == $name){
					return $value->id;
				}
			}
			return 0;
		}
		return 0;
}

function addCriteriaToDisplayUnit($displayUnitID, $criteriaID, $token, $domainID) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/resource_criteria/v7/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"active\": true,
		\"criteria_id\": ".$criteriaID.",
		\"domain_id\": ".$domainID.",
		\"parent_id\": ".$displayUnitID.",
		\"type\": 0
	}");

	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	return $result;
}

function assignPlayerToDisplayUnit($displayUnitID, $playerID, $token) {
	$playerJson = getPlayerJson($token, 0, 0);
	$player;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			if ($value->id == $playerID){
				$player = $value;
				break;
			}
		}
	}
	
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"config_profile_bag_id\": ".$player->config_profile_bag_id .", 
		\"container_id\": ".$player->container_id .", 
		\"db_pickup_tm_utc\": \"".$player->db_pickup_tm_utc ."\", 
		\"discovery_status\": ".$player->discovery_status .", 
		\"display_unit_id\": ".$displayUnitID.", 
		\"domain_id\": ".$player->domain_id .", 
		\"geolocation\": \"".$player->geolocation ."\", 
		\"id\": ".$player->id .", 
		\"name\": \"".$player->name ."\", 
		\"nscreens\": ".$player->nscreens .", 
		\"public_key_fingerprint\": \"".$player->public_key_fingerprint ."\", 
		\"remote_clear_db_tm_utc\": \"".$player->remote_clear_db_tm_utc ."\", 
		\"remote_reboot_tm_utc\": \"".$player->remote_reboot_tm_utc ."\", 
		\"volume\": ".$player->volume ."
	}");
	
	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	//echo $result;
	
}

function renamePlayer($newName, $playerID, $token) {
	$playerJson = getPlayerJson($token, 0, 0);
	$player;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			if ($value->id == $playerID){
				$player = $value;
				break;
			}
		}
	}
	
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"config_profile_bag_id\": ".$player->config_profile_bag_id .", 
		\"container_id\": ".$player->container_id .", 
		\"db_pickup_tm_utc\": \"".$player->db_pickup_tm_utc ."\", 
		\"discovery_status\": ".$player->discovery_status .", 
		\"display_unit_id\": ".$player->display_unit_id .", 
		\"domain_id\": ".$player->domain_id .", 
		\"geolocation\": \"".$player->geolocation ."\", 
		\"id\": ".$player->id .", 
		\"name\": \"".$newName ."\", 
		\"nscreens\": ".$player->nscreens .", 
		\"public_key_fingerprint\": \"".$player->public_key_fingerprint ."\", 
		\"remote_clear_db_tm_utc\": \"".$player->remote_clear_db_tm_utc ."\", 
		\"remote_reboot_tm_utc\": \"".$player->remote_reboot_tm_utc ."\", 
		\"volume\": ".$player->volume ."
	}");
	
	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	//echo $result;
}

function movePlayer($newFolderID, $playerID, $token) {
	$playerJson = getPlayerJson($token, 0, 0);
	$player;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			if ($value->id == $playerID){
				$player = $value;
				break;
			}
		}
	}
	
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"config_profile_bag_id\": ".$player->config_profile_bag_id .", 
		\"container_id\": ".$newFolderID .", 
		\"db_pickup_tm_utc\": \"".$player->db_pickup_tm_utc ."\", 
		\"discovery_status\": ".$player->discovery_status .", 
		\"display_unit_id\": ".$player->display_unit_id .", 
		\"domain_id\": ".$player->domain_id .", 
		\"geolocation\": \"".$player->geolocation ."\", 
		\"id\": ".$player->id .", 
		\"name\": \"".$player->name ."\", 
		\"nscreens\": ".$player->nscreens .", 
		\"public_key_fingerprint\": \"".$player->public_key_fingerprint ."\", 
		\"remote_clear_db_tm_utc\": \"".$player->remote_clear_db_tm_utc ."\", 
		\"remote_reboot_tm_utc\": \"".$player->remote_reboot_tm_utc ."\", 
		\"volume\": ".$player->volume ."
	}");
	
	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
	//echo $result;
}

function assignFullCriteriaToDisplayUnit($displayUnitID, $side, $location, $groupNumber, $carNumber, $trainNumber, $screenType, $trainType, $domainID, $token) {
	//Function Stub
	//use getCriteriaID 
	//return boolean
	
	//Slow and ugly... should just get criteria JSON and send that....
	$sideCriteria = getCriteriaID($side, $token, $domainID);
	$locationCriteria = getCriteriaID($location, $token, $domainID);
	$groupNumberCriteria = getCriteriaID($groupNumber, $token, $domainID);
	$carNumberCriteria = getCriteriaID($carNumber, $token, $domainID);
	$trainNumberCriteria = getCriteriaID($trainNumber, $token, $domainID);
	$screenTypeCriteria = getCriteriaID($screenType, $token, $domainID);
	$trainTypeCriteria = getCriteriaID($trainType, $token, $domainID);
	
	addCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $locationCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $groupNumberCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $carNumberCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $trainNumberCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $screenTypeCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $trainTypeCriteria, $token, $domainID);

	
}


?>