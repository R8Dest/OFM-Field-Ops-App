$(document).ready(start);

var playerIDs = Array();

function start() {
    window.addEventListener("resize", checkWindowSize);
    checkWindowSize();
    generatePlayersHTML();
    $("#IDSelect").append(playerIDs);
}

function updateSubValues()
{
    $("#subLocSelect").val($("#LocSelect").val());
    $("#subTypeSelect").val($("#TypeSelect").val());
    $("#subSideSelect").val($("#SideSelect").val());
    $("#subGroupSelect").val($("#GroupSelect").val());
    
}

function updateRegValues()
{
    $("#LocSelect").val($("#subLocSelect").val());
    $("#TypeSelect").val($("#subTypeSelect").val());
    $("#SideSelect").val($("#subSideSelect").val());
    $("#GroupSelect").val($("#subGroupSelect").val());
    
}

function checkWindowSize()
{
    if(document.documentElement.clientWidth < 768)
    {
        $("#LocSelect").prop("disabled", true);
        $("#TypeSelect").prop("disabled", true);
        $("#SideSelect").prop("disabled", true);
        $("#GroupSelect").prop("disabled", true);
        
        $("#subLocSelect").prop("disabled", false);
        $("#subTypeSelect").prop("disabled", false);
        $("#subSideSelect").prop("disabled", false);
        $("#subGroupSelect").prop("disabled", false);
    }
    else
    {
        $("#LocSelect").prop("disabled", false);
        $("#TypeSelect").prop("disabled", false);
        $("#SideSelect").prop("disabled", false);
        $("#GroupSelect").prop("disabled", false);
        
        $("#subLocSelect").prop("disabled", true);
        $("#subTypeSelect").prop("disabled", true);
        $("#subSideSelect").prop("disabled", true);
        $("#subGroupSelect").prop("disabled", true);
    }
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

function generatePlayersHTML()
{
  //config variable holds the fieldops_config json file
    var config = readConfigJson().fieldops_config;

    //ajax request to playerID.php which assembles the post variables and uses them to call
    //getPlayerJson() from functions.php. Makes a synchronus request which sort of defeats the
    //point of AJAX but this avoids issues with waiting for a response from the server
    $.ajax({
      type: "POST",
      url: 'playerID.php',
      dataType: 'json',
      async: false,
      data: {functionname: 'getPlayerJson', arguments: ['b7f241acb072f484f0a79ea9889d1d03', config.domain_id, config.provisioning_container_id]},

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

function readConfigJson()
{
  //reads local json file so the domain_id and provisioning_container_id can be used to generate player html
  var config;
  $.ajax({
    url: '/ofm-field-ops-app/fieldops_config.json',
    dataType: 'json',
    async: false,
    success: function(data)
    {
      config = data;
    }
  });
  return config;
}

//Function is called at submission of form. Re-enables any disabled fields so they are included in the form. Can be used for error checking if needed
function submitForm()
{
  $("#BrandedSelect").prop("disabled", false);
}