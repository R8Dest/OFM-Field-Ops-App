<?php

/*
This php file recieves the data from the front end submission form
it recieves the non changing variables 
 - Train_Type
 - BrandedSelect
 - Train_Number
 - CarSelect
 first, and assigns them to their respective variables.

 The rest of the data from each individual player is arranged into an array
 up to 19 total players. 
 So, the first player's info would be stored in an array called $player1
 the second player's info would be stored in an array called $player2, and so on.

 NOTE: these arrays do not contain the 'non-changing variables' mentioned at the top.
 It could be modified to do so, but currently is not set up that way.
*/

include_once("functions.php");
$trainType = $_POST['Train_Type'];
$brandedSelect = $_POST['BrandedSelect'];
$trainNumber = $_POST['Train_Number'];
$carSelect = $_POST['CarSelect'];
$agency = 0;
//$agency = $_POST['Agency']; This is not implemented on the front end as far as im aware yet
$length = 0;

    //Create Player_ID variables for each player entry
for($i = 1;$i<=19; $i++){
    ${"playerID" . $i} = isset($_POST["Player_ID".$i ]) ? $_POST["Player_ID".$i] : 'empty';

    }   
/*
    //Create SerialNumber variables for each player entry
for($i = 1;$i<=15; $i++){
    ${"serialNumber" . $i} = isset($_POST["SerialNumber".$i ]) ? $_POST["SerialNumber".$i] : 'empty';

    }
*/
    //Create Screen_Type variables for each player entry
for($i = 1;$i<=19; $i++){
    ${"screenType" . $i} = isset($_POST["Screen_Type".$i ]) ? $_POST["Screen_Type".$i] : 'empty';

    }

    //Create Location variables for each player entry
for($i = 1;$i<=19; $i++){
    ${"location" . $i} = isset($_POST["Location".$i ]) ? $_POST["Location".$i] : 'empty';
    
    }

    //Create Side variables for each player entry
for($i = 1;$i<=19; $i++){
    ${"side" . $i} = isset($_POST["Side".$i ]) ? $_POST["Side".$i] : 'empty';
    
    }

    //Create GroupNumber variables for each player entry
for($i = 1;$i<=19; $i++){
    ${"groupNumber" . $i} = isset($_POST["GroupNumber".$i ]) ? $_POST["GroupNumber".$i] : 'empty';
        
    }

    // Calculate how many players there are
for($i = 1; $i<=19; $i++){
    if(${"playerID" . $i} == 'empty'){
        $length = $i-1;
    break;
    }

}

    // Create arrays for all the variables in each player where info was entered
for($i=1; $i <= $length; $i++){
    ${"player" . $i} = [
        'playerID' => ${"playerID" . $i},
        //'serialNumber' => ${"serialNumber" . $i},
        'screenType' => ${"screenType" . $i},
        'location' => ${"location" . $i},
        'side' => ${"side" . $i},
        'groupNumber' => ${"groupNumber" . $i}

    ];

}


//for testing purposes, to ensure arrays are getting info from submit form. It works.


/*
var_dump($player1);
var_dump($player2);
var_dump($player3);
var_dump($player4);
var_dump($player5);
var_dump($player14);
*/


/* 

This function is Matt's function from functions.php, slightly altered to get the variables correctly.

Agency is not defined on the front end file that I have. So randomly assigned to 1, for testing.

All the passing of the variables from the front end to the function is working properly.

However, the actual registration process has not been tested, but all the variables are there.


*/
function registerPlayer($playerArray, $trainType, $brandedSelect, $trainNumber, $carNumber, $agency){	
    $playerID = $playerArray['playerID'];
    $screenType = $playerArray['screenType'];
    $location = $playerArray['location'];
    $side = $playerArray['side'];
    $groupNumber = $playerArray['groupNumber'];
    $agency = 1;
	
	
	
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


/*

This for loop will register all players that were filled out on the front end.
If the player array is empty, it will not attempt to register that player.

*/
for($i = 1; $i<=19; $i++){
    if(isset(${"player" . $i})){
    registerPlayer(${"player" . $i}, $trainType, $brandedSelect, $trainNumber, $carSelect, $agency);
    }
}


?>