$(document).ready(start);

function start() {
	   $("#btnIndividual").click(function(){
	       GenerateHTMLIndividual();
	   });
	   $("#btnMultiple").click(function(){
	       GenerateHTMLMultiple();
	   });

}

function GenerateHTMLIndividual()
{
    //generate HTML
    window.location.href = "\Player Registration/Individual.html";
}

function GenerateHTMLMultiple()
{
    //generate HTML
    window.location.href = "\Player Registration/Multiple.html";
    //$("#mainDiv").HTML("Test");

}