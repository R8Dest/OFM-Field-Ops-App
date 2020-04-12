$(document).ready(start);

function start() {
    $("#mainDiv").hide();
}

var countID;
var playerIDs = Array();
var TABLE;

function initTABLE()
{
  TABLE =   '   <table border="2">  '  + 
 '   				<thead>  '  + 
 '   					<tr>  '  + 
 '   						<th colspan="4">  '  + 
 '   							<div class="row>  '  + 
 '                                <div">' +
 '   									<p style="white-space:nowrap;"><b>Player ' + countID + ' ID:</b></p>   '  + 
 '                                </div>' +
 '                                <div>' +
 '   									<p>  '  + 
 '   										<select name="Player_ID' + countID + '" id="IDSelect' + countID + '">  '  + 
 '   										<option value="" disabled selected hidden>Select ID</option>  '  + 
                                            playerIDs + 
 '   										</select>  '  + 
 '   									</p>   '  + 
 '                                </div>' +
 '   							</div>  '  + 
 '   						</th>  '  + 
 '   					</tr>  '  + 
 '   				</thead>  '  + 
 '     '  + 
 '   				<!--Titles for each column-->  '  + 
 '   				<tbody>  '  + 
 '   					<tr>  '  + 
 '   						<td>  '  + 
 '   							Screen Type  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Location  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Side  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							Group #  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '     '  + 
 '   					<!--Selections for each column-->  '  + 
 '   					<tr>  '  + 
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
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="Side' + countID + '" id="SideSelect' + countID + '">  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="Left">Left</option>  '  + 
 '   								<option value="Right">Right</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   						<td>  '  + 
 '   							<div>  '  + 
 '   								<select name="GroupNumber' + countID + '" id="GroupSelect' + countID + '">  '  + 
 '   								<option value="" disabled selected hidden>...</option>  '  + 
 '   								<option value="1">1</option>  '  + 
 '   								<option value="2">2</option>  '  + 
 '   								<option value="3">3</option>  '  + 
 '   								</select>  '  + 
 '   								<br><br>  '  + 
 '   							</div>  '  + 
 '   						</td>  '  + 
 '   					</tr>  '  + 
 '   				</tbody>  '  + 
 '   			</table>  ';
}


function submitTrainInfo()
{
  if(!trainTypeFormIsValid())
  {
    alert("Please fill in all required data");
  }
  else
  {
    $("#mainDiv").show();
    $("#mainDiv").html("");
    countID = 1;
    $("#mainDiv").append('<div class="jumbotron text-center">' +
      '<h1 style="color:#660099;"><b>SQUARES</b></h1>' +
     '</div>');

    generateTables(4);
    //All cars except 142 (A) have 4 square screens
    if($("#TrainSelect").val() == "R142 (A)")
    {
      for(i = 1; i <= 3; i++)
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
    }
    else
    {
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
    }
    
    //If the car is branded then there are cove screens as well
    //either 10, 12, or 15 screens depending on the trainType
    if($("#BrandedSelect").val() == "true")
    {
      $("#mainDiv").append('<div class="jumbotron text-center">' +
        '<h1 style="color:#660099;"><b>COVES</b></h1>' +
       '</div>');

      var trainType = $("#TrainSelect").val(); 

      //locCount is used to count the players in a group rather than
      //trying to find the location number using i
      var locCount = 1;

      //12 coves for R68 B and R68A B
      if(trainType == "R68 (B)" || trainType == "R68A (B)")
      {
        generateTables(12);
        
        //A little magic numbery but i starts at 5 so it won't start
        //overwriting the first 4 square screens
        for(i = 5; i <= 16; i++)
        {
          if(i <= 10)
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Left");
            $("#GroupSelect" + i).val("1");
            $("#LocSelect" + i).val(locCount);
            if(i == 10)
              locCount = 1;
            else
              locCount++;
          }
          else
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Right");
            $("#GroupSelect" + i).val("2");
            $("#LocSelect" + i).val(locCount);
            locCount++;
          }
        }
      }
      else if(trainType == "R160 (A)")
      {
        generateTables(15);
        for(i = 5; i <= 19; i++)
        {
          if(i <= 9)
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Left");
            $("#GroupSelect" + i).val("1");
            $("#LocSelect" + i).val(locCount);

            if(i == 9)
              locCount = 1;
            else
              locCount++;
          }
          else if(i <= 14)
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Left");
            $("#GroupSelect" + i).val("2");
            $("#LocSelect" + i).val(locCount);

            if(i == 14)
              locCount = 1;
            else
              locCount++;
          }
          else
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Right");
            $("#GroupSelect" + i).val("3");
            $("#LocSelect" + i).val(locCount);
            locCount++;
          }
        }
      }
      else
      {
        generateTables(10);
        for(i = 5; i <= 14; i++)
        {
          if(i <= 9)
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Left");
            $("#GroupSelect" + i).val("1");
            $("#LocSelect" + i).val(locCount);

            if(i == 9)
              locCount = 1;
            else
              locCount++;
          }
          else
          {
            $("#TypeSelect" + i).val("Cove");
            $("#SideSelect" + i).val("Right");
            $("#GroupSelect" + i).val("2");
            $("#LocSelect" + i).val(locCount);
            locCount++;
          }
        }
      }
    }
  }
}

function generateTables(num)
{
  generatePlayersHTML();
  for(i = 0; i < num; i++)
  {
    initTABLE();
    $("#mainDiv").append(TABLE);
    countID++;
  }
}

function generatePlayersHTML()
{
    $.ajax({
      type: "POST",
      url: 'playerID.php',
      dataType: 'json',
      async: false,
      data: {functionname: 'getPlayerJson', arguments: ['b7f241acb072f484f0a79ea9889d1d03', '259890691', '283279899']},

      success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                      var result = JSON.parse(obj.result);
                      for(i = 0; i < result.host.length; i++)
                      {
                        if(result.host[i].active == true)
                          playerIDs[i] = '<option value="' + result.host[i].id + '">' + result.host[i].id + '</option>\n';
                      }
                    }
                    else {
                        console.log(obj.error);
                    }
              }
    }); 

    
}

function trainTypeSelect()
{
  switch($("#TrainSelect option:checked").val())
  {
    
  
    case "R62 (A & B)":
      disableBranded("false");
      break;    
    case "R62A (A & B)":
      disableBranded("false");
      break;    
    case "R68 (A & B)":
      disableBranded("false");
      break;
    case "R68 (B)":
      disableBranded("true");
      break;
    case "R68A (A & B)":
      disableBranded("false");
      break;
    case "R68A (B)":
      disableBranded("true");
      break;
    case "R142 (A)":
      disableBranded("false");
      break;    
    case "R142 (B)":
      enableBranded();
      break;
    case "R142A (A)":
      disableBranded("false");
      break;    
    case "R142A (B)":
      enableBranded();
      break;
    case "R143 (B)":
      enableBranded();
      break;    
    case "R160 (A)":
      enableBranded();
      break;    
    case "R160 (B)":
      disableBranded("false");
      break;
    case "R188 (A)":
      disableBranded("false");
      break;  
    case "R188 (B & C)":
      enableBranded();
      break;
    case "R179 (A)":
      disableBranded("false");
      break;     
    case "R179 (B)":
      disableBranded("false");
      break;
    case "R211":
      disableBranded("true");
      break;  
    default:

  }
}

function disableBranded(isBranded)
{
  $("#BrandedSelect").val(isBranded);
  $("#BrandedSelect").prop("disabled", true);
}
function enableBranded()
{
  $("#BrandedSelect").val("");
  $("#BrandedSelect").prop("disabled", false);
}

function trainTypeFormIsValid()
{
  var type, branded, trainNumber, carNumber;
  type = $("#TrainSelect").val();
  branded = $("#BrandedSelect").val();
  trainNumber = $("#TrainNumberSelect").val();
  carNumber = $("#CarSelect").val();

  if(type == null || branded == null || trainNumber == null || carNumber == null)
  {
    return false;
  }
  else
  {
    return true;
  }
}
