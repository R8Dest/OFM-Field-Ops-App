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
    window.location.href = "\Test HTML/Individual.html";
}

function GenerateHTMLMultiple()
{
    //generate HTML
    window.location.href = "\Test HTML/Multiple.html";
    //$("#mainDiv").HTML("Test");

}