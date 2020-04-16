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

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16/by_container?container_id='.$containerID.'&domain_id='.$domainID);
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
		
		return 0;
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
		
		return 0;
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

function makeFolder($name, $parentID, $token, $type, $domainID) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/container/v9/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, 
	"{ 
		\"container_id\": ".$parentID.", 
		\"domain_id\": ".$domainID .", 
		\"group_id\": $type, 
		\"name\": \"".$name."\",
		\"parent_id\": 0,
		\"parent_resource_type\": \"container\"
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
	$player = 0;
	$trigger = 0;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			if ($value->id == $playerID){
				$player = $value;
				$trigger = 1;
				break;
			}
		}
	}
	
	if ($trigger == 0){
		echo "Error: Unable to assign Player to Display Unit, no such player ID found for player ID: ".$playerID;
		return 0;
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
		\"name\": \"".$player->name ."-".$newName ."\", 
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

function postDisplayUnit($token, $name, $domainID, $containerID, $displayUnitTypeID) {

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/display_unit/v12/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, true);

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"address\": \"\",
        \"bmb_host_id\": 0,
        \"container_id\": $containerID,
        \"display_unit_type_id\": $displayUnitTypeID,
        \"domain_id\": $domainID,
        \"enforce_day_parts\": false,
        \"enforce_screen_controls\": false,
        \"geolocation\": \"(0,0)\",
        \"name\": \"$name\"
	}");

	$headers = array(
		'Accept: application/json',
		'Authorization: Bearer '.$token
		//'Content-Type: application/json'
	);
	
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);

	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);		
	return $result;
}

function assignFullCriteriaToDisplayUnit($displayUnitID, $side, $location, $groupNumber, $carNumber, $trainNumber, $screenType, $trainType, $domainID, $token) {
	//Slow and ugly... should just get criteria JSON and send that....
	
	$sideCriteria = getCriteriaID($side, $token, $domainID);
	$locationCriteria = getCriteriaID($location, $token, $domainID);
	$groupNumberCriteria = getCriteriaID($groupNumber, $token, $domainID);
	//$carNumberCriteria = getCriteriaID($carNumber, $token, $domainID);
	//$trainNumberCriteria = getCriteriaID($trainNumber, $token, $domainID);
	$screenTypeCriteria = getCriteriaID($screenType, $token, $domainID);
	//$trainTypeCriteria = getCriteriaID($trainType, $token, $domainID);
	
	addCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $locationCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $groupNumberCriteria, $token, $domainID);
	//addCriteriaToDisplayUnit($displayUnitID, $carNumberCriteria, $token, $domainID);
	//addCriteriaToDisplayUnit($displayUnitID, $trainNumberCriteria, $token, $domainID);
	addCriteriaToDisplayUnit($displayUnitID, $screenTypeCriteria, $token, $domainID);
	//addCriteriaToDisplayUnit($displayUnitID, $trainTypeCriteria, $token, $domainID);

	
}

function getLoopPolicyIDbyName($loopPolicyName, $domainID, $token){
	//Function Stub, will give valid response.
	return 270852457;
}

function createDayPart($displayUnitID, $domainID, $token){
	//return 364223831;
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/day_part/v5/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{ 
		\"day_mask\": 127, 
		\"domain_id\": $domainID, 
		\"end_date\": \"8000-12-31\", 
		\"end_time\": \"00:00:00\", 
		\"impressions_per_hour\": -1, 
		\"name\": \"default\", 
		\"parent_id\": $displayUnitID, 
		\"start_date\": \"1756-01-01\", 
		\"start_time\": \"00:00:00\", 
		\"virtual_end_date\": \"8000-12-31\", 
		\"virtual_start_date\": \"1756-01-01\", 
		\"weight\": 0
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
	
	$decode_data = json_decode($result);
	

	
	//echo var_dump($decode_data);
	

	
	
	
	$arCount = 0;
	$temp = 0;
	$value = 0;
			
	if (is_array($decode_data->day_part)){
		foreach($decode_data->day_part as $key=>$value){
			try {
					//echo $value->id;
					return $value->id;
			}
			catch(Exception $e){
				
			}
		}
			return 0;
		}
	return 0;

	
	
	
}

//STUB ->Needs loop policy ID
function createFrame($dayPartID, $domainID, $token){
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/skin/v7/add');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
	\"domain_id\": $domainID, 
	\"geometry_type\": 1, 
	\"height\": 100, 
	\"interactivity_timeout\": 0, 
	\"interactivity_trigger_id\": 0, 
	\"loop_policy_id\": 295177093, 
	\"name\": \"Fullscreen\", 
	\"parent_id\": $dayPartID, 
	\"screen_no\": 1, 
	\"width\": 100, 
	\"x\": 0, 
	\"y\": 0, 
	\"z\": 0
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
	
	
	$decode_data = json_decode($result);

	//echo var_dump($decode_data);
	$value = 0;
			
	if (is_array($decode_data->skin)){
		foreach($decode_data->skin as $key=>$value){
			try {
					return $value->id;
			}
			catch(Exception $e){
				
			}
		}
			return 0;
		}
	return 0;
	
	
	
}

function getFrame($displayUnitID, $domainID, $token){
	//get Day_Part list, filter by parentID (display unit)
	//get skin list, filter by parentID (day_part)
	//return matching skin
	//return json
	
	
	//echo "DU ID for Frame: ".$displayUnitID;
	
	
	$dayPartID = 0;
	$trigger = 0;
	
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/day_part/v5?domain_id='.$domainID);
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
	if (is_array($decode_data->day_part)){
			
		foreach($decode_data->day_part as $key=>$value){
			//echo "$value ";
			if ($value->parent_id == $displayUnitID){
				$dayPartID = $value->id;
				$trigger = 1;
				break;
			}
		}
	}
	
	if($trigger == 0){
		//echo "unable to find dayPartID for display unit: ".$displayUnitID;
		$dayPartID = createDayPart($displayUnitID, $domainID, $token);
		
		//Create Frame
		createFrame($dayPartID, $domainID, $token);

	}
	
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/skin/v7?domain_id='.$domainID);
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
		if (is_array($decode_data->skin)){
				
			foreach($decode_data->skin as $key=>$value){
				
				
				if ($value->parent_id == $dayPartID){
					return $value;
				}
			}
		}
	echo "Failed to find Frame json";
	return 0;
	
	
}

function pushRequest($playerID, $domainID, $token){
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16/push_request');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"domain_id\": ".$domainID.", \"player_id\": ".$playerID.", \"request_json\": \"string\"}");

	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	
}

function addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token){

	$loopPolicyID = getLoopPolicyIDbyName($loopPolicyName, $domainID, $token);
	
	//echo "DU ID for loop Policy: $displayUnitID";
	
	$frameJson = getFrame($displayUnitID, $domainID, $token);
	
	echo var_dump($frameJson);
	
	
	//update skin using /skin/v7
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/skin/v7');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
		\"active\": ".$frameJson->active .", 
		\"domain_id\": ".$frameJson->domain_id .", 
		\"geometry_type\": \"".$frameJson->geometry_type ."\", 
		\"height\": ".$frameJson->height .", 
		\"id\": ".$frameJson->id .", 
		\"interactivity_timeout\": ".$frameJson->interactivity_timeout .", 
		\"interactivity_trigger_id\": \"".$frameJson->interactivity_trigger_id ."\", 
		\"loop_policy_id\": ".$loopPolicyID .", 
		\"name\": \"".$frameJson->name ."\", 
		\"parent_id\": ".$frameJson->parent_id .", 
		\"screen_no\": \"".$frameJson->screen_no ."\", 
		\"width\": \"".$frameJson->width ."\", 
		\"x\": \"".$frameJson->x ."\", 
		\"y\": ".$frameJson->y .",
		\"z\": ".$frameJson->z ."
	}");
	
	$headers = array();
	$headers[] = 'Accept: application/json';
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
		return 0;
	}
	curl_close($ch);
	
	//echo $result;
	return 1;
	
	
}

function getDisplayTypeIDByName($displayUnitType, $token, $domainID){

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/display_unit_type/v6?domain_id='.$domainID);
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
	
	if (is_array($decode_data->display_unit_type)){
		foreach($decode_data->display_unit_type as $key=>$value){
			if ($value->name == $displayUnitType){
					return $value->id;
				}
			}
			return 0;
		}
		return 0;
}

function getDisplayUnitIDByName($displayUnitName, $token, $domainID){
	$duJson = getDisplayUnitJson ($token, $domainID, 0);
	return getDisplayUnitIDFromJson($duJson, $displayUnitName);
}

function getPlayerNameByID($playerID, $domainID, $token){
	$playerJson = getPlayerJson ($token, $domainID, 0);
	return getPlayerNameFromJson($playerJson, $playerID);
}

//Do everything test function
function schfiftyFive($side, $location, $groupNumber, $carNumber, $trainNumber, $screenType, $trainType, $agency, $playerID){
	
	$domainID = 0;
	$token = 0;
	$displayUnitType = "PerformanceTesting-Test_Display_Type-1920x1080-NonEnforced";
	$sideCriteria = "left";
	$locationCriteria = "01";
	$groupNumberCriteria = "01";
	$carNumberCriteria = 0;
	$trainNumberCriteria = 0;
	$screenTypeCriteria = "cove";
	$trainTypeCriteria = 0;
	$loopPolicyName = "default loop policy";
	
	//JSON CONFIG FILE
	$config_json = file_get_contents("fieldops_config.json");

	//echo $config_json;

	$config_json_decoded = json_decode($config_json);

	//print_r($config_json_decoded);

	$config = $config_json_decoded->fieldops_config;

	//print_r($config);

	//Get Domain ID and Token from JSON
	$domainID = $config->domain_id;
	$token = $config->token;

	// echo "\nDomain ID: " . $domainID . "\n";
	// echo "Token: " . $token . "\n\n";

	$criteria_translation_table = $config_json_decoded->criteria_translation_table;
	$criteria_translation_table_Location02 = $config_json_decoded->criteria_translation_table_location2;
	$criteria_translation_table_Location05 = $config_json_decoded->criteria_translation_table_location5;
	$displaytype_translation_table = $config_json_decoded->displaytype_translation_table;
	
	//Find Criteria Names
	//Side
		if (strcasecmp($side,"left")==0){
			$sideCriteria = $criteria_translation_table->side_left;
		}
		else if (strcasecmp($side,"right") == 0){
			$sideCriteria = $criteria_translation_table->side_right;
		}
	//groupNumber
		if (strcasecmp($groupNumber,"01")==0){
			$groupNumberCriteria = $criteria_translation_table->group_01;
		}
		else if (strcasecmp($groupNumber,"02") == 0){
			$groupNumberCriteria = $criteria_translation_table->group_02;
		}
		else if (strcasecmp($groupNumber,"03") == 0){
			$groupNumberCriteria = $criteria_translation_table->group_03;
		}
		else if (strcasecmp($groupNumber,"04") == 0){
			$groupNumberCriteria = $criteria_translation_table->group_04;
		}
	//screenType, display type, loop policy
		if (strcasecmp($screenType,"cove")==0){
			$screenTypeCriteria = $criteria_translation_table->cove;
			$displayUnitType = $displaytype_translation_table->cove;
			$loopPolicyName = $config->loop_policy_cove;
		}
		else if (strcasecmp($screenType,"square") == 0){
			$screenTypeCriteria = $criteria_translation_table->square;
			$displayUnitType = $displaytype_translation_table->square;
			$loopPolicyName = $config->loop_policy_square;
		}
		else if (strcasecmp($screenType,"3sm") == 0){
			$screenTypeCriteria = $criteria_translation_table->threesm;
			$displayUnitType = $displaytype_translation_table->threesm;
			$loopPolicyName = $config->loop_policy_3sm;
		}
		//Testing display unit type
			if (domainID == 0 || domainID == 259890691){
					$displayUnitType = $displaytype_translation_table->testing;
					$loopPolicyName = $config->loop_policy_testing;
			}
	//screenLocation
		if (strcasecmp($groupNumber,"01")==0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = $criteria_translation_table_Location02->one;
		}
		else if (strcasecmp($groupNumber,"02") == 0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = $criteria_translation_table_Location02->two;
		}
		else if (strcasecmp($groupNumber,"01") == 0){
			$locationCriteria = $criteria_translation_table_Location05->one;
		}
		else if (strcasecmp($groupNumber,"02") == 0){
			$locationCriteria = $criteria_translation_table_Location05->two;
		}
		else if (strcasecmp($groupNumber,"03") == 0){
			$locationCriteria = $criteria_translation_table_Location05->three;
		}
		else if (strcasecmp($groupNumber,"04") == 0){
			$locationCriteria = $criteria_translation_table_Location05->four;
		}
		else if (strcasecmp($groupNumber,"05") == 0){
			$locationCriteria = $criteria_translation_table_Location05->five;
		}
	
	
	
	
	$playerName = getPlayerNameByID($playerID, $domainID, $token);
	$displayUnitTypeID = getDisplayTypeIDByName($displayUnitType, $token, $domainID);
	$displayUnitName = "".$trainNumber."-".$trainType."-".$carNumber."-".$side."-".$screenType."-".$groupNumber."-".$location;
	$displayUnitID = getDisplayUnitIDByName($displayUnitName, $token, $domainID);
	
	//Does Display Unit Exist?
	if ($displayUnitID == 0){
		//find DU container
		$duContainerID = folderExists($trainNumber, $token, $domainID);
		if ($duContainerID == 0){
			$agencyContainerID = folderExists($agency, $token, $domainID);
			if ($agencyContainerID == 0){
				$agencyContainerID = makeFolder($agency, 0, $token, 8, $domainID);
			}
			$duContainerID = makeFolder($trainNumber, $parentID, $token, 8, $domainID);
		}
		
		//Make Display Unit
		$displayUnitID = postDisplayUnit($token, $displayUnitName ,$domainID, $duContainerID, $displayUnitTypeID);
		$displayUnitID = getDisplayUnitIDByName($displayUnitName, $token, $domainID);

		addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token);
		assignFullCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $locationCriteria, $groupNumberCriteria, $carNumberCriteria, $trainNumberCriteria, $screenTypeCriteria, $trainTypeCriteria, $domainID, $token);
	
	}
	
	//Assign Display Unit to Player
	assignPlayerToDisplayUnit($displayUnitID, $playerID, $token);
	
	//Move Player to production folder
		//Odd logic here, no parent id for player continer vs. DU container?
		$playerContainerID = folderExists($agency, $token, $domainID);
		if ($playerContainerID == 0){
				$agencyContainerID = folderExists($agency, $token, $domainID);
				if ($agencyContainerID == 0){
					$agencyContainerID = makeFolder($agency, 0, $token, 2, $domainID);
				}
				$playerContainerID = makeFolder($trainNumber, $parentID, $token, 2, $domainID);
		}
		movePlayer($playerContainerID, $playerID, $token);
	
	//Rename Player
	renamePlayer($displayUnitName, $playerID, $token);
	
	
}



function apiDemo($side, $location, $groupNumber, $carNumber, $trainNumber, $screenType, $trainType, $agency, $playerID){
	//Ideally many of the fields in this function will be read in via JSON. however for testing purposes, this function has them hard-coded. 
	
	$domainID = 0;
	$token = 0;
	$displayUnitType = "PerformanceTesting-Test_Display_Type-1920x1080-NonEnforced";
	$sideCriteria = "left";
	$locationCriteria = "01";
	$groupNumberCriteria = "01";
	$carNumberCriteria = 0;
	$trainNumberCriteria = 0;
	$screenTypeCriteria = "cove";
	$trainTypeCriteria = 0;
	$loopPolicyName = "default loop policy";
	
	
	//Get Domain ID and Token from JSON
	$domainID = 259890691;
	$token = "b7f241acb072f484f0a79ea9889d1d03";
		
	//Find Criteria Names
	//Side
		if (strcasecmp($side,"left")==0){
			$sideCriteria = "Side_Left";
		}
		else if (strcasecmp($side,"right") == 0){
			$sideCriteria = "Side_Right";
		}
	//groupNumber
		if (strcasecmp($groupNumber,"01")==0){
			$groupNumberCriteria = "Group_01";
		}
		else if (strcasecmp($groupNumber,"02") == 0){
			$groupNumberCriteria = "Group_02";
		}
		else if (strcasecmp($groupNumber,"03") == 0){
			$groupNumberCriteria = "Group_03";
		}
		else if (strcasecmp($groupNumber,"04") == 0){
			$groupNumberCriteria = "Group_04";
		}
	//screenType, display type, loop policy
		if (strcasecmp($screenType,"cove")==0){
			$screenTypeCriteria = "Screen_Type_Cove";
		}
		else if (strcasecmp($screenType,"square") == 0){
			$screenTypeCriteria = "Screen_Type_Square";
		}
		else if (strcasecmp($screenType,"3sm") == 0){
			$screenTypeCriteria = "Screen_Type_3SM";
		}
		//Testing display unit type
			if ($domainID == 0 || $domainID == 259890691){
					$displayUnitType = "PerformanceTesting-Test_Display_Type-1920x1080-NonEnforced";
					$loopPolicyName = "default loop policy";
			}
	//screenLocation
		if (strcasecmp($groupNumber,"01")==0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = "2_Array_01";
		}
		else if (strcasecmp($groupNumber,"02") == 0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = "2_Array_02";
		}
		else if (strcasecmp($groupNumber,"01") == 0){
			$locationCriteria = "5_Array_01";
		}
		else if (strcasecmp($groupNumber,"02") == 0){
			$locationCriteria = "5_Array_02";
		}
		else if (strcasecmp($groupNumber,"03") == 0){
			$locationCriteria = "5_Array_03";
		}
		else if (strcasecmp($groupNumber,"04") == 0){
			$locationCriteria = "5_Array_04";
		}
		else if (strcasecmp($groupNumber,"05") == 0){
			$locationCriteria = "5_Array_05";
		}
	
	$playerName = getPlayerNameByID($playerID, $domainID, $token);
	$displayUnitTypeID = getDisplayTypeIDByName($displayUnitType, $token, $domainID);
	
	//echo $displayUnitTypeID;
	
	$displayUnitName = "".$trainNumber."-".$trainType."-".$carNumber."-".$side."-".$screenType."-".$groupNumber."-".$location;
	$displayUnitID = getDisplayUnitIDByName($displayUnitName, $token, $domainID);
	
	//Does Display Unit Exist?
	if ($displayUnitID == 0){
		//find DU container
		/*
		$duContainerID = folderExists($trainNumber, $token, $domainID);
		if ($duContainerID == 0){
			$agencyContainerID = folderExists($agency, $token, $domainID);
			if ($agencyContainerID == 0){
				$agencyContainerID = makeFolder($agency, 0, $token,  8,$domainID);
			}
			$duContainerID = makeFolder($trainNumber, $agencyContainerID, $token, 8, $domainID);
		}
		*/
		
		//Testing Container
		$duContainerID = 364223845;
		
		//Make Display Unit
		$displayUnitID = postDisplayUnit($token, $displayUnitName ,$domainID, $duContainerID, $displayUnitTypeID);
		$displayUnitID = getDisplayUnitIDByName($displayUnitName, $token, $domainID);

		addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token);
		assignFullCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $locationCriteria, $groupNumberCriteria, $carNumberCriteria, $trainNumberCriteria, $screenTypeCriteria, $trainTypeCriteria, $domainID, $token);
	}
	
	
	
	//Assign Display Unit to Player
	assignPlayerToDisplayUnit($displayUnitID, $playerID, $token);
	
	//Move Player to production folder
		//Odd logic here, no parent id for player continer vs. DU container?
		$playerContainerID = folderExists($agency, $token, $domainID);
		if ($playerContainerID == 0){
				$agencyContainerID = folderExists($agency, $token, $domainID);
				if ($agencyContainerID == 0){
					$agencyContainerID = makeFolder($agency, 0, $token,  2, $domainID);
				}
				$playerContainerID = makeFolder($trainNumber, 364220699, $token,  2,$domainID);
		}
		movePlayer($playerContainerID, $playerID, $token);
	
	//Rename Player
	
	renamePlayer($displayUnitName, $playerID, $token);
	
	//push changes to Player
	
	pushRequest($playerID, $domainID, $token);
	
	
	
}





?>