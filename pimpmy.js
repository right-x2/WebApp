
window.onload = function(){
    document.getElementById("bling").onchange = ch;
    document.getElementById("but").onclick = textSize;
    document.getElementById("snoopy").onclick = myFunction;
    document.getElementById("Igpay Atinlay").onclick = piglatin;
    document.getElementById("Malkovitch").onclick = malkobich;
}

function ch(){
	// alert("1");
	if( $("bling").checked ){
		$("mytext").style.fontWeight = "bold";
		$("mytext").style.color = "green";
		$("mytext").style.textDecoration = "underline";
		document.body.style.backgroundImage = 'url("https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg")';
	} else{
		// alert("2");
		$("mytext").style.fontWeight = "normal";
		$("mytext").style.color = "black";
		$("mytext").style.textDecoration = "none";
		document.body.style.backgroundImage = "none";
	}
}
var myVar;
function textSize() {
	setInterval(function(){
		defaultsize();
	}, 500);

	//$("mytext").style.fontSize= "24pt";

}
function defaultsize(){
	var fontsize = document.getElementById("mytext").style.fontSize;
	if(!fontsize){
		$("mytext").style.fontSize = "14pt";		
	}
	else{
		$("mytext").style.fontSize = parseInt($("mytext").style.fontSize)+2+"pt";
	}
}
function myStopFunction() {
  clearTimeout(myVar);
}

function myFunction() {
  
  var str = document.getElementById("mytext").value;
  var text = document.getElementById("mytext");
  var res = str.toUpperCase();
  //var text = res.replace(".", "-izzle.");
  var answer = res.replace(".", "-izzle.");
  text.value = answer;
}

function piglatin(){
	var mytext = document.getElementById("mytext");
	mytext.value= mytext.value.toLowerCase();
	var vowel = ['a','i','o','u','e'];
	var s = "";
	var i = 0;
	var index = 0;

	if(vowel.includes(mytext.value[0])){
		s = mytext.value+"way";
	}
	else{
		for(let char of mytext.value){
			if(vowel.includes(char)){
				index = mytext.value.indexOf(char);
				break;
			}
		}
		s = mytext.value.substring(index,mytext.value.length) + mytext.value.substring(0,index) + "ay";
	}
	mytext.value = s;
}

function malkobich(){
	var mytext = document.getElementById("mytext");
	var sArray = mytext.value.split(" ");

	for(let word of sArray){
		if(word.length > 5){
			sArray[sArray.indexOf(word)] = "Malkovich";
		}
	}

	mytext.value = sArray.join(" ");
}