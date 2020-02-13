$(document).ready(start);

function start() {
	$("#btnSubmit").click(function(){
        var value = $("#select1 option:selected").html();
	    alert("testing " + value);
	});
}