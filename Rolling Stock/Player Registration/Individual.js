$(document).ready(start);

function start() {
    var playerID = 0;

}

function setPlayerID()
{
    playerID = $("#IDSelect").children("option:selected").val();
    enableOptions();
}

function showNextOption()
{

}

function enableOptions() {
  document.getElementById("LocSelect").disabled = false;
  document.getElementById("TrainSelect").disabled = false;
  document.getElementById("CarSelect").disabled = false;
  document.getElementById("TypeSelect").disabled = false;
  document.getElementById("Train#Select").disabled = false;
  document.getElementById("SideSelect").disabled = false;
  document.getElementById("GroupSelect").disabled = false;
  document.getElementById("HWSkuSelect").disabled = false;
  document.getElementById("SerialSelect").disabled = false;

}