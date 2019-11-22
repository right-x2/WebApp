function ch(){
	
	// alert("1");
	if( $("bling").checked ){
		alert("Hello, world!");
		$("mytext").style.fontWeight = "bold";
	} else{
		// alert("2");
		$("mytext").style.fontWeight = "normal";
	}
}

function textSize() {
	$("mytext").style.fontSize= "24pt";

}