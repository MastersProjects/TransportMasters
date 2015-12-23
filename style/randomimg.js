//Get random background image
$(document).ready(function(){
//the highest number of the image you want to load
var upperLimit = 3;

var randomNum = Math.floor((Math.random() * upperLimit) + 1);    

 $(".imgheader").css({
	 "background-image":"url('img/background_0" + randomNum + ".jpg')",
	 "margin-top": "-10px"
 });

 });


function errorInput (field) {
	document.getElementById("from").style.color = "blue";
};