function get_text(val) {

	//alert(val);

	document.getElementById("text").innerHTML=val;
}
function log_validation(argument) {
	document.getElementById("success").style.display="block";
	document.getElementById("error").style.display="block";

	var a = document.getElementById("un").value;
	var b = document.getElementById("pw").value;

	//alert(a);
	//alert(b);
	if (a==""||b=="") {
		
		document.getElementById("success").style.display="none";
	} else {
		document.getElementById("error").style.display="none";
		document.getElementById("un").value="";
	    document.getElementById("pw").value="";
		
	}
}