<?php
    include 'functions.php';
    
    $token = "b7f241acb072f484f0a79ea9889d1d03";
    $domainID = "259890691";
    $DUcontainerID = "359197575"; //using the PHP Test Folder inside the Test folder for now 361744554

    $DU = getDisplayUnitJson($token, $domainID, $DUcontainerID);

    $decode_data = json_decode($DU);
    $arCount = 0;
    $temp = 0;
    
    if (is_array($decode_data->display_unit)) {
        
        foreach($decode_data->display_unit as $key=>$value) {
            $arCount = $arCount+1;
        }
        
        $ar = array_fill(0, $arCount, $arCount);
        
        foreach($decode_data->display_unit as $key=>$value) {
            $ar[$temp] = $value->name;
            $temp = $temp+1;
        }
        
        $_SESSION['array']=$ar;
    }

    function addDU($displayUnitTypeID) {

        // $id = postDisplayUnit($token, $domainID, $DUcontainerID, $displayUnitTypeID);
        // //echo $id;
        // return $id;

    }

?>

<html>
    <head>
        <title>DU test</title>
    </head>
    <body>
        <button id="getDisplayUnitsButton" onclick="DUbuttonClick()">Get Display Units</button>
    </body>

    <script>

    function DUbuttonClick() {

        var jArray = <?php 
		
        echo json_encode($_SESSION['array']);
		
		?>;

        //console.log(jArray.length);

        res = document.createElement("div");

        document.body.appendChild(document.createElement("h6"));
        
		for(var i = 0; i < jArray.length; i++) {
			var opt = jArray[i];
			var el = document.createElement("b");
			el.innerHTML = opt + "<br>";
			res.appendChild(el);
		}

        document.body.appendChild(res);

        document.body.appendChild(document.createElement("h6"));

        addDUbutton = document.createElement("button");
        //addDUbutton.setAttribute("id", "addDUbutton");
        addDUbutton.innerHTML = "Add Display Unit";
        addDUbutton.onclick = addDUbuttonClick;

        document.body.appendChild(addDUbutton);
        
    }

    function addDUbuttonClick() {

        // <?php
        // $displayUnitTypeID = "259890697"; //hard coding to 'default display type' for now
        // $id = addDU($displayUnitTypeID);
        // echo $id;
        // ?>

    }

    </script>   

</html>

