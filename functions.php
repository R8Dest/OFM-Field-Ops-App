<?php


function getDisplayUnitJson($token, $domainID, $containerID) {
echo "getDisplayUnitJson" . "<br>";
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

function getSinglePlayerJson($token, $playerID) {
echo "getSinglePlayerJson" . "<br>";
$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16/'.$playerID);
		
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
echo "getPlayerJson" . "<br>";
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
echo "getCriteriaJson" . "<br>";
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
echo "getDisplayUnitNameFromJson" . "<br>";
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
echo "getDisplayUnitIDFromJson" . "<br>";
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
echo "getPlayerNameFromJson" . "<br>";
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
echo "getplayerIDFromJson" . "<br>";
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
	echo "folderExists" . "<br>";
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
	echo "makeFolder" . "<br>";
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
	echo "getCriteriaID" . "<br>";
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
	echo "addCriteriaToDisplayUnit" . "<br>";
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
	echo "assignPlayerToDisplayUnit" . "<br>";
	$playerJson = getPlayerJson($token, 0, 283279899);
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
	echo "renamePlayer" . "<br>";
	$playerJson = getSinglePlayerJson($token, $playerID);
	//$playerJson = getPlayerJson($token, 0, 283279899);
	$player;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			//if ($value->id == $playerID){
				$player = $value;
				break;
			//}

		}
	}

	//$player = getSinglePlayerJson($token, 355747462);
	//$player = $player->host;
	
	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
	    \"active\": ".$player->active .",
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
    echo "movePlayer" . "<br>";
    $playerJson = getSinglePlayerJson($token, $playerID);
	//$playerJson = getPlayerJson($token, 0, 283279899);
	$player;
	
	$decode_data = json_decode($playerJson);
	if (is_array($decode_data->host)){
			
		foreach($decode_data->host as $key=>$value){
			//if ($value->id == $playerID){
				$player = $value;
				break;
			//}

		}
	}

	//$player = getSinglePlayerJson($token, 355747462);
	//$player = $player->host;

	
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, 'https://api.broadsign.com:10889/rest/host/v16');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

	curl_setopt($ch, CURLOPT_POSTFIELDS, "
	{ 
	    \"active\": ".$player->active .",
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
echo "postDisplayUnit" . "<br>";
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
	echo "assignFullCriteriaToDisplayUnit" . "<br>";
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
	echo "getLoopPolicyIDbyName" . "<br>";
	//Function Stub, will give valid response.
	return 270852457;
}

function createDayPart($displayUnitID, $domainID, $token){
	echo "createDayPart" . "<br>";
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
	echo "createFrame" . "<br>";
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
	echo "getFrame" . "<br>";
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
	echo "pushRequest" . "<br>";
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
	echo "addLoopPolicyToDisplayUnit" . "<br>";

	$loopPolicyID = getLoopPolicyIDbyName($loopPolicyName, $domainID, $token);
	
	//echo "DU ID for loop Policy: $displayUnitID";
	
	$frameJson = getFrame($displayUnitID, $domainID, $token);
	
	//echo var_dump($frameJson);
	
	
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
	echo "getDisplayTypeIDByName" . "<br>";

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
	echo "getDisplayUnitIDByName" . "<br>";
	$duJson = getDisplayUnitJson ($token, $domainID, 0);
	return getDisplayUnitIDFromJson($duJson, $displayUnitName);
}

function getPlayerNameByID($playerID, $domainID, $token){
	echo "getPlayerNameByID" . "<br>";
	$playerJson = getPlayerJson ($token, $domainID, 0);
	return getPlayerNameFromJson($playerJson, $playerID);
}





?>