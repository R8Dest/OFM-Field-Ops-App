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
 '   								<option value="QSM">QSM</option>  '  + 
 '   								<option value="MTA_QSM">MTA QSM</option>  '  + 
 '   								<option value="Cove">Cove CC48</option>  '  + 
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
 '   								<select name="Side' + countID + '" id="SideSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Left">Left</option>  '  + 
 '   								<option value="Right">Right</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="GroupNumber' + countID + '" id="GroupSelect' + countID + '" >  '  + 
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
 '   								<select name="HWSku' + countID + '" id="HWSkuSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="QSMi">QSMi</option>  '  + 
 '   								<option value="3SMi">3SMi</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-none d-md-table-cell">  '  + 
 '   							<div>  '  + 
 '   								<select name="SerialNumber' + countID + '" id="SerialSelect' + countID + '" >  '  + 
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
 '   								<select name="Side' + countID + '" id="SideSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Left">Left</option>  '  + 
 '   								<option value="Right">Right</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="GroupNumber' + countID + '" id="GroupSelect' + countID + '" >  '  + 
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
 '   								<select name="HWSku' + countID + '" id="HWSkuSelect' + countID + '" >  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="QSMi">QSMi</option>  '  + 
 '   								<option value="3SMi">3SMi</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td class="d-md-none">  '  + 
 '   							<div>  '  + 
 '   								<select name="SerialNumber' + countID + '" id="SerialSelect' + countID + '" >  '  + 
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
  }

}

function generateTables(num)
{
  if(num > 0)
  {
    initTABLE();
    $("#mainDiv").append(TABLE);
    countID++;
    generateTables(num-1);
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