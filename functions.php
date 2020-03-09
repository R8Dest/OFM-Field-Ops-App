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

function postDisplayUnit($token, $domainID, $containerID, $displayUnitTypeID, $name) {

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
        \"name\": $name
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

function getFrame($displayUnitID, $domainID, $token){
	//get Day_Part list, filter by parentID (display unit)
	//get skin list, filter by parentID (day_part)
	//return matching skin
	//return json
	
	
	$dayPartID;
	
	
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
			if ($value->parent_id == $displayUnitID){
				$dayPartID = $value->id;
				break;
			}
		}
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

function addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token){

	$loopPolicyID = getLoopPolicyIDbyName($loopPolicyName, $domainID, $token);
	$frameJson = getFrame($displayUnitID, $domainID, $token);
	
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

//STUB
function getDisplayTypeIDByName($displayUnitType, $token, $domainID){
	//Function Stub, will give valid response.
	return 268552897;
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
	$config_josn_decoded = json_decode($config_json);
	
	$config = $config_josn_decoded->fieldops_config;
	
	//echo json_decode($config_josn_decoded->fieldops_config[0]);
	
	$criteria_translation_table = $config_josn_decoded->criteria_translation_table;
	$criteria_translation_table_Location02 = $config_josn_decoded->criteria_translation_table_location2;
	$criteria_translation_table_Location05 = $config_josn_decoded->criteria_translation_table_location5;
	$displaytype_translation_table = $config_josn_decoded->displaytype_translation_table;
	
	//Get Domain ID and Token from JSON
	$domainID = $config->domain_id;
	$token = $config->token;
	
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
		$duContainer = folderExists($trainNumber, $token, $domainID);
		if ($duContainer == 0){
			$agencyContainerID = folderExists($agency, $token, $domainID);
			if ($agencyContainerID == 0){
				$agencyContainerID = makeFolder($agency, 0, $token, $domainID);
			}
			$duContainer = makeFolder($trainNumber, $parentID, $token, $domainID);
		}
		
		//Make Display Unit
		$displayUnitID = postDisplayUnit($token, $domainID, $duContainer, $displayUnitTypeID);
		addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token);
		assignFullCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $locationCriteria, $groupNumberCriteria, $carNumberCriteria, $trainNumberCriteria, $screenTypeCriteria, $trainTypeCriteria, $domainID, $token);
	}
	
	//Assign Display Unit to Player
	assignPlayerToDisplayUnit($displayUnitID, $playerID, $token);
	
	//Move Player to production folder
	
	//Rename Player
	
	
	
}


?>
