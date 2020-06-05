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

initHTML();
$length = 0;
if(isset($_POST['countID']))
{
	$countID = $_POST['countID'];
}
else
{
	$countID = 1;
}
if(isset($_POST['Train_Type']) && isset($_POST['BrandedSelect']) && isset($_POST['Train_Number']) && isset($_POST['CarSelect']))
{
	$trainType = $_POST['Train_Type'];
	$brandedSelect = $_POST['BrandedSelect'];
	$trainNumber = $_POST['Train_Number'];
	$carSelect = $_POST['CarSelect'];
	$length = $countID-1;
}
$progress = 1;

$agency = 0;
//$agency = $_POST['Agency']; This is not implemented on the front end as far as im aware yet



    //Create Player_ID variables for each player entry
for($i = 1;$i<=$length; $i++){
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
	//THIS IS NO LONGER NEEDED. COUNTING IS DONE VIA A VARIABLE 'COUNTID'
	/*
for($i = 1; $i<=19; $i++){
    if(${"playerID" . $i} == 'empty'){
        $length = $i-1;
    break;
    }


}
*/
    

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



//var_dump($player1);
//var_dump($player2);
//var_dump($player3);
//var_dump($player4);
//var_dump($player5);
//var_dump($player14);
function initHTML()
{
    echo '<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>OFM Broadsign Deployment</title>
    </head>';

	echo '<!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
    
    echo '<body>
    <div class="jumbotron text-center">
		<h1 style="color:#660099;"><b>OUTFRONT</b> Media</h1>
		<p>Rail Deployment</p> 
	</div>';

    
    echo '<div class="container-fluid">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
					<div class="progress">
					  <div id="progressbar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					<br>
					<div class="form-group">
					  <textarea readonly class="form-control rounded-0" id="textarea" style="resize: none; height: 50vh;"></textarea>
					</div>

					<button>Copy</button>
					<button>Return to Player Registration</button>
                </div>
                <div class="col-2">
                </div>
			</div>
		</div>';


	echo '</body>
      </html>';
}

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
    $groupNumber = 'G' . $playerArray['groupNumber'];
    $agency = "Agency";
	
	
	
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
		if (strcasecmp($groupNumber,"1")==0){
			$groupNumberCriteria = $criteria_translation_table->group_01;
		}
		else if (strcasecmp($groupNumber,"2") == 0){
			$groupNumberCriteria = $criteria_translation_table->group_02;
		}
		else if (strcasecmp($groupNumber,"3") == 0){
			$groupNumberCriteria = $criteria_translation_table->group_03;
		}
		else if (strcasecmp($groupNumber,"4") == 0){
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
			if ($domainID == 0 || $domainID == 259890691){
					$displayUnitType = $displaytype_translation_table->testing;
					$loopPolicyName = $config->loop_policy_testing;
			}
	//screenLocation
		if (strcasecmp($groupNumber,"1")==0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = $criteria_translation_table_Location02->one;
		}
		else if (strcasecmp($groupNumber,"2") == 0 && strcasecmp($screenType, "square") == 0){
			$locationCriteria = $criteria_translation_table_Location02->two;
		}
		else if (strcasecmp($groupNumber,"1") == 0){
			$locationCriteria = $criteria_translation_table_Location05->one;
		}
		else if (strcasecmp($groupNumber,"2") == 0){
			$locationCriteria = $criteria_translation_table_Location05->two;
		}
		else if (strcasecmp($groupNumber,"3") == 0){
			$locationCriteria = $criteria_translation_table_Location05->three;
		}
		else if (strcasecmp($groupNumber,"4") == 0){
			$locationCriteria = $criteria_translation_table_Location05->four;
		}
		else if (strcasecmp($groupNumber,"5") == 0){
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
			$duContainerID = makeFolder($trainNumber, $agencyContainerID, $token, 8, $domainID);
		}
	    echoFunction("    DU not found, generating DU");
		//Make Display Unit
		$displayUnitID = postDisplayUnit($token, $displayUnitName ,$domainID, $duContainerID, $displayUnitTypeID);
		$displayUnitID = getDisplayUnitIDByName($displayUnitName, $token, $domainID);

		addLoopPolicyToDisplayUnit($displayUnitID, $loopPolicyName, $domainID, $token);
		assignFullCriteriaToDisplayUnit($displayUnitID, $sideCriteria, $locationCriteria, $groupNumberCriteria, $carNumberCriteria, $trainNumberCriteria, $screenTypeCriteria, $trainTypeCriteria, $domainID, $token);
	
	}
	
	//GetPlayerJson
	$playerJson = getSinglePlayerJson($token, $playerID);
	
	//Assign Display Unit to Player
	//assignPlayerToDisplayUnit($displayUnitID, $token, $playerJson);
	
	//Move Player to production folder
	$agency = "Agency2";
	$playerContainerID = folderExists($agency, $token, $domainID);
	if ($playerContainerID == 0){
			$agencyContainerID = folderExists($agency, $token, $domainID);
			if ($agencyContainerID == 0){
				$agencyContainerID = makeFolder($agency, 0, $token, 2, $domainID);
			}
			$playerContainerID = makeFolder($trainNumber, $agencyContainerID, $token, 2, $domainID);
	}
	
	//echoFunction("    Moving Player");
	//movePlayer($playerContainerID, $token, $playerJson);
	
	//Rename Player
	//echoFunction("    Renaming Player");
	//renamePlayer($displayUnitName, $token, $playerJson);
	
	//One function to assign player to display unit, move to proper folder, and rename it
	updatePlayer($displayUnitID, $playerContainerID, $displayUnitName, $token, $playerJson);

	
}

function echoFunction($text)
{
    echo '<script>var $textarea = $("#textarea")
                    $textarea.append("' . $text . '\n");
				    $textarea.scrollTop($textarea[0].scrollHeight);
		    </script>';
    ob_flush(); 
    flush(); 
}

/*

This for loop will register all players that were filled out on the front end.
If the player array is empty, it will not attempt to register that player.

*/
set_time_limit(300);
	

for($i = 1; $i<=$length; $i++){
    echoFunction("Registering Player " . $i);

    if(!in_array("empty", ${"player" . $i})){
    // Starting clock time in seconds 
	//$start_time = microtime(true); 
	//$a=1; 
	
	registerPlayer(${"player" . $i}, $trainType, $brandedSelect, $trainNumber, $carSelect, $agency);
	echoFunction("Player " . $i . " has been registered");
    
	// End clock time in seconds 
	//$end_time = microtime(true); 

	// Calculate script execution time 
	//$execution_time = ($end_time - $start_time); 

	//echo "<br>" . $i . " Execution time of script = ".$execution_time." sec" . "<br>"; 
    
    }
    else
    {
    	echoFunction("Player " . $i . " was not registered, empty player ID");
    }
    $progress++;
     echo '<script>$("#progressbar").css("width", ' . $i * 100 / $length . ' + "%").attr("aria-valuenow", ' . $i * 100 / $length . ');</script>';
     

    
}
echoFunction("Player registration complete");
//re-enable buttons once for loop is done


/*$array = array(
    "playerID" => 375616668,
    "screenType" => "cove",
    "location" => 1,
    "side" => "left",
    "groupNumber" => 1);
registerPlayer($array, $trainType, $brandedSelect, $trainNumber, $carSelect, $agency);*/


?>