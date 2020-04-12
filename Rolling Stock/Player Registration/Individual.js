$(document).ready(start);

function start() {
    window.addEventListener("resize", checkWindowSize);
    checkWindowSize();

}

function updateSubValues()
{
    $("#subSideSelect").val($("#SideSelect").val());
    $("#subGroupSelect").val($("#GroupSelect").val());
    $("#subSerialSelect").val($("#SerialSelect").val());
}

function updateRegValues()
{
    $("#SideSelect").val($("#subSideSelect").val());
    $("#GroupSelect").val($("#subGroupSelect").val());
    $("#SerialSelect").val($("#subSerialSelect").val());
}

function checkWindowSize()
{
    if(document.documentElement.clientWidth < 768)
    {
        $("#SideSelect").prop("disabled", true);
        $("#GroupSelect").prop("disabled", true);
        $("#SerialSelect").prop("disabled", true);

        $("#subSideSelect").prop("disabled", false);
        $("#subGroupSelect").prop("disabled", false);
        $("#subSerialSelect").prop("disabled", false);
    }
    else
    {
        $("#SideSelect").prop("disabled", false);
        $("#GroupSelect").prop("disabled", false);
        $("#SerialSelect").prop("disabled", false);

        $("#subSideSelect").prop("disabled", true);
        $("#subGroupSelect").prop("disabled", true);
        $("#subSerialSelect").prop("disabled", true);
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
