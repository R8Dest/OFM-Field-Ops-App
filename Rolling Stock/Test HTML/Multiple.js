$(document).ready(start);

function start() {
    $("#mainDiv").hide();

}
var countID;
var TABLE;
function initTABLE()
{
  TABLE =   '   <table bgcolor="d3d3d3" border="2">  '  + 
 '   				<thead>  '  + 
 '   					<tr>  '  + 
 '   						<th colspan="8">  '  + 
 '   							<div class="row">  '  + 
 '   								<div class="col-sm-4">  '  + 
 '   									<p><b>Player ' + countID + ' ID:</b></p>   '  + 
 '   								</div>  '  + 
 '   								<div class="col-sm-8">  '  + 
 '   									<p>  '  + 
 '   										<select name="Player_ID' + countID + '" id="IDSelect' + countID + '" onchange="enableOptions()">  '  + 
 '   										<option value="" disabled selected hidden>Select ID</option>  '  + 
 '   										<option value="260689719">260689719</option>  '  + 
 '   										<option value="455668123">455668123</option>  '  + 
 '   										<option value="12455789">12455789</option>  '  + 
 '   										<option value="189223488">189223488</option>  '  + 
 '   										<option value="260689719">260689719</option>  '  + 
 '   										<option value="455668123">455668123</option>  '  + 
 '   										<option value="12455789">12455789</option>  '  + 
 '   										<option value="189223488">189223488</option>  '  + 
 '   										<option value="260689719">260689719</option>  '  + 
 '   										<option value="455668123">455668123</option>  '  + 
 '   										<option value="12455789">12455789</option>  '  + 
 '   										<option value="189223488">189223488</option>  '  + 
 '   										<option value="260689719">260689719</option>  '  + 
 '   										<option value="455668123">455668123</option>  '  + 
 '   										<option value="12455789">12455789</option>  '  + 
 '   										<option value="189223488">189223488</option>  '  + 
 '   										</select>  '  + 
 '   									</p>   '  + 
 '   								</div>  '  + 
 '   							</div>  '  + 
 '   						</th>  '  + 
 '   					</tr>  '  + 
 '   				</thead>  '  + 
 '     '  + 
 '   				<!--Titles for each column-->  '  + 
 '   				<tbody>  '  + 
 '   					<tr>  '  + 
 '   						<td>  '  + 
 '   							Train #  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Car #  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Screen Type  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Location  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							Side  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							Group #  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							HW Sku  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							Serial #  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '     '  + 
 '   					<!--Selections for each column-->  '  + 
 '   					<tr>  '  + 
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="Train_Number' + countID + '" id="Train#Select' + countID + '">  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="T001">T001</option>  '  + 
 '   								<option value="T002">T002</option>  '  + 
 '   								<option value="T003">T003</option>  '  + 
 '   								<option value="T5299">T5229</option>  '  + 
 '   								<option value="T5300">T5300</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="Car' + countID + '" id="CarSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="1">1</option>  '  + 
 '   								<option value="2">2</option>  '  + 
 '   								<option value="3">3</option>  '  + 
 '   								<option value="4">4</option>  '  + 
 '   								<option value="5">5</option>  '  + 
 '   								<option value="6">6</option>  '  + 
 '   								<option value="7">7</option>  '  + 
 '   								<option value="8">8</option>  '  + 
 '   								<option value="9">9</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="Screen_Type' + countID + '" id="TypeSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Square">Square</option>  '  + 
 '   								<option value="3SM">3SM</option>  '  + 
 '   								<option value="Cove">Cove</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="Location' + countID + '" id="LocSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="1">1</option>  '  + 
 '   								<option value="2">2</option>  '  + 
 '   								<option value="3">3</option>  '  + 
 '   								<option value="4">4</option>  '  + 
 '   								<option value="5">5</option>  '  + 
 '   								<option value="6">6</option>  '  + 
 '   								<option value="7">7</option>  '  + 
 '   								<option value="8">8</option>  '  + 
 '   								<option value="9">9</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="Side' + countID + '" id="SideSelect' + countID + '" onchange="updateSubValues(' + countID + ')">  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Left">Left</option>  '  + 
 '   								<option value="Right">Right</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="GroupNumber' + countID + '" id="GroupSelect' + countID + '" onchange="updateSubValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="1">1</option>  '  + 
 '   								<option value="2">2</option>  '  + 
 '   								<option value="3">3</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="HWSku' + countID + '" id="HWSkuSelect' + countID + '" onchange="updateSubValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="QSMi">QSMi</option>  '  + 
 '   								<option value="3SMi">3SMi</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="SerialNumber' + countID + '" id="SerialSelect' + countID + '" onchange="updateSubValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="AAAA">AAAA</option>  '  + 
 '   								<option value="BBBB">BBBB</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '   				</tbody>  '  + 
 '     '  + 
 '   				<!-- Table hidden until medium device size is reached -->  '  + 
 '     '  + 
 '   				<tbody>  '  + 
 '   					<tr>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							Side  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							Group #  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							HW Sku  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							Serial #  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '   					<tr>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="Side' + countID + '" id="SubSideSelect' + countID + '" onchange="updateMainValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Left">Left</option>  '  + 
 '   								<option value="Right">Right</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="GroupNumber' + countID + '" id="SubGroupSelect' + countID + '" onchange="updateMainValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="1">1</option>  '  + 
 '   								<option value="2">2</option>  '  + 
 '   								<option value="3">3</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="HWSku' + countID + '" id="SubHWSkuSelect' + countID + '" onchange="updateMainValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="QSMi">QSMi</option>  '  + 
 '   								<option value="3SMi">3SMi</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="SerialNumber' + countID + '" id="SubSerialSelect' + countID + '" onchange="updateMainValues(' + countID + ')" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="AAAA">AAAA</option>  '  + 
 '   								<option value="BBBB">BBBB</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '   				</tbody>  '  + 
 '   			</table>  '  + 
 '  			<br>  ' ; 
}


function selectTrainType()
{
  $("#mainDiv").show();
  $("#mainDiv").html("");
  countID = 1;
  switch($("#TrainSelect option:checked").val())
  {
    
    case "R211":
      generateTables(15);
      break;    
    case "R62":
      //4 square
      $("#mainDiv").append('<div class="jumbotron text-center">' +
		'<h1 style="color:#660099;"><b>SQUARES</b></h1>' +
       '</div>');
      generateTables(4);
      //First 4 are square screens
      for(i = 1; i <= 4; i++)
      {
        $("#TypeSelect" + i).val("Square");
      }

      $("#SideSelect1").val("Left");
      $("#GroupSelect1").val("1");
      $("#LocSelect1").val("1");

      $("#SideSelect2").val("Left");
      $("#GroupSelect2").val("1");
      $("#LocSelect2").val("2");

      $("#SideSelect3").val("Right");
      $("#GroupSelect3").val("2");
      $("#LocSelect3").val("1");

      $("#SideSelect4").val("Right");
      $("#GroupSelect4").val("2");
      $("#LocSelect4").val("2");
      
      break;    
    case "R62A":
      generateTables(15);
      break;    
    case "R68":
      generateTables(15);
      break;    
    case "R142":
      generateTables(15);
      break;    
    case "R142A":
      generateTables(15);
      break;    
    case "R143":
      generateTables(15);
      break;    
    case "R160":
      generateTables(15);
      break;    
    case "R188":
      generateTables(15);
      break;  
    case "R179":
      generateTables(15);
      break;     


  }

}

function generateTables(num)
{
  for(i = 0; i < num; i++)
  {
    initTABLE();
    $("#mainDiv").append(TABLE);
    countID++;
  }
}

function enableOptions() {
  // Removed the feature that enables options once the PlayerID is selected
  // to lower confusion while building the auto-generating HTML
  /*
  document.getElementById("LocSelect").disabled = false;
  document.getElementById("TrainSelect").disabled = false;
  document.getElementById("CarSelect").disabled = false;
  document.getElementById("TypeSelect").disabled = false;
  document.getElementById("Train#Select").disabled = false;
  document.getElementById("SideSelect").disabled = false;
  document.getElementById("GroupSelect").disabled = false;
  document.getElementById("HWSkuSelect").disabled = false;
  document.getElementById("SerialSelect").disabled = false;*/
}

//BUG: submits duplicate values in the POST when the form is submitted
function updateSubValues(tableNum)
{
    document.getElementById("SubSideSelect" + tableNum).selectedIndex = document.getElementById("SideSelect" + tableNum).selectedIndex;
    document.getElementById("SubGroupSelect" + tableNum).selectedIndex = document.getElementById("GroupSelect" + tableNum).selectedIndex;
    document.getElementById("SubHWSkuSelect" + tableNum).selectedIndex = document.getElementById("HWSkuSelect" + tableNum).selectedIndex;
    document.getElementById("SubSerialSelect" + tableNum).selectedIndex = document.getElementById("SerialSelect" + tableNum).selectedIndex;
}
function updateMainValues(tableNum)
{
  document.getElementById("SideSelect" + tableNum).selectedIndex = document.getElementById("SubSideSelect" + tableNum).selectedIndex;
  document.getElementById("GroupSelect" + tableNum).selectedIndex = document.getElementById("SubGroupSelect" + tableNum).selectedIndex;
  document.getElementById("HWSkuSelect" + tableNum).selectedIndex = document.getElementById("SubHWSkuSelect" + tableNum).selectedIndex;
  document.getElementById("SerialSelect" + tableNum).selectedIndex = document.getElementById("SubSerialSelect" + tableNum).selectedIndex;
}