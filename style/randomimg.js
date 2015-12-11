$(document).ready(function(){

//the highest number of the image you want to load
var upperLimit = 4;

//get random number between 1 and 3
//change upperlimit above to increase or 
//decrease range
var randomNum = Math.floor((Math.random() * upperLimit) + 1);    

 //change the background image to a random jpg
 //edit add closing )  to prevent syntax error
 $(".imgheader").css("background-image","url('img/background_0" + randomNum + ".jpg')");//<--changed path

 });