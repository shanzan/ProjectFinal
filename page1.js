
         var bikeImage=["bk-1.png","bk-2.png","bk-3.png","bk-4.png","bk-5.png","bk-6.png"];
         var recebtbike=["Ducati-1098.jpg","eSuperbike.jpg","ktm-1290.jpg","sportsbk.jpg","yamaha.jpg","bike-wallpaper-17.jpg"];
         var bikePrice=["1200$","2000$","700$","1000$","1120$","990$"];
         var bikesLink=["https://www.google.com.bd/#gws_rd=cr","https://www.google.com.bd/#gws_rd=cr","https://www.google.com.bd/#gws_rd=cr","https://www.google.com.bd/#gws_rd=cr","https://www.google.com.bd/#gws_rd=cr","https://www.google.com.bd/#gws_rd=cr"];         
         var binex=0;
         var rec=0;
         function bikeFeturedNext() {
		document.getElementById("image1").src="image/"+bikeImage[binex];
                  document.getElementById("bikePrice").innerHTML=bikePrice[binex];
                  document.getElementById("bikeUrl").href=bikesLink[binex];
                  document.getElementById("bikeName").innerHTML=bikeImage[binex];
                  binex++;
		if(binex==6){
			binex=0;
			document.getElementById("image1").src="image/"+bikeImage[0];
                           document.getElementById("bikePrice").innerHTML=bikePrice[0];
                           document.getElementById("bikeUrl").href=bikesLink[0];
                           document.getElementById("bikeName").innerHTML=bikeImage[0];

		}  
         }
         function bikeFeturedPrevious() {
		if(binex==0){
			document.getElementById("image1").src="image/"+bikeImage[5];
                           document.getElementById("bikePrice").innerHTML=bikePrice[5];
                           document.getElementById("bikeUrl").href=bikesLink[5];
                           document.getElementById("bikeName").innerHTML=bikeImage[5];
                           binex=0;
		}else{
                           document.getElementById("image1").src="image/"+bikeImage[binex];
                           document.getElementById("bikePrice").innerHTML=bikePrice[binex];
                           document.getElementById("bikeUrl").href=bikesLink[binex];
                           document.getElementById("bikeName").innerHTML=bikeImage[binex];
                           binex--;         
         }  

         }
         function bikeRecentNext() {
                  rec++;
		document.getElementById("image2").src="image/"+recebtbike[binex];
                  document.getElementById("bikePrice1").innerHTML=bikePrice[binex];
                  document.getElementById("bikeUrl1").href=bikesLink[binex];
                  document.getElementById("bikeName1").innerHTML=recebtbike[binex];
		if(rec==5){
			rec=0;
			document.getElementById("image2").src="image/"+recebtbike[0];
                           document.getElementById("bikePrice1").innerHTML=bikePrice[0];
                           document.getElementById("bikeUrl1").href=bikesLink[binex];
                           document.getElementById("bikeName1").innerHTML=recebtbike[binex];

		}  
         }
          function bikeRecentPrevious() {
                 if(rec==0){
			rec=5;
			document.getElementById("image2").src="image/"+recebtbike[5];
                           document.getElementById("bikePrice1").innerHTML=bikePrice[5];
                           document.getElementById("bikeUrl1").href=bikesLink[5];
                           document.getElementById("bikeName1").innerHTML=recebtbike[5];

		} else{
                            rec--;
		document.getElementById("image2").src="image/"+recebtbike[binex];
                  document.getElementById("bikePrice1").innerHTML=bikePrice[binex];
                  document.getElementById("bikeUrl1").href=bikesLink[binex];
                  document.getElementById("bikeName1").innerHTML=recebtbike[binex];
                  }
         }
         window.onload=function() {
               var t=setInterval(bikeFeturedNext,3000);
               var x=setInterval(bikeRecentNext,3000);
         }

var imageCount = 1;
var total = 5;

function photo(x) {
	var image = document.getElementById('image');
	imageCount = imageCount + x;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "image/banner-"+ imageCount +".jpg";
	clearInterval(time); 								// clear interval stops the set interval.
	time =  window.setInterval(function photoA() {
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){imageCount = 1;}
	if(imageCount < 1){imageCount = total;}	
	image.src = "image/banner-"+ imageCount +".jpg";
	},2000);
	}
 
var time = window.setInterval(function photoA() {    // just addign the sunction to the variable so you can target it.
	var image = document.getElementById('image');
	imageCount = imageCount + 1;
	if(imageCount > total){
                  imageCount = 1;
         }
	if(imageCount < 1){
                  imageCount = total;
         }	
	image.src = "image/banner-"+ imageCount +".jpg";
	},2000);
//.............

//////..................................///////
/////login validation////
function validateForm() {
    var x = document.forms["userform"]["name"].value;
    var y=document.forms["userform"]["p_no"].value;
    var z=document.forms["userform"]["bkp_no"].value;
    var a=document.forms["userform"]["email"].value;
    var ag=document.forms["userform"]["age"].value;
    var pass=document.forms["userform"]["pass"].value;
    var cpass=document.forms["userform"]["cpass"].value;
    if (x == null || x == "" || isNaN(x)==false ) {
     document.forms["userform"]["name"].style.border="2px solid red";
         return false;
    }else if(y==null || y == ""|| !validPhone(y)){
        document.forms["userform"]["p_no"].style.border="2px solid red";
         return false;  
    }else if(z==null || z == ""|| !validPhone(z)){
        document.forms["userform"]["bkp_no"].style.border="2px solid red";
         return false;  
    }
    else if(a==null || a==""||  emailValidation(a)==false) {
        document.forms["userform"]["email"].style.border="2px solid red";
         return false;  
    }
    else if(ag==null || ag==""||  isNaN(ag)==true || ag<15 || ag>70) {
        document.forms["userform"]["age"].style.border="2px solid red";
         return false;  
    }
     else if(pass==null || pass==""||  pass.length<6) {
        document.forms["userform"]["pass"].style.border="2px solid red";
         return false;  
    }
    else if(cpass==null || cpass==""||  cpass.length<6) {
        document.forms["userform"]["cpass"].style.border="2px solid red";
         return false;  
    }
     else if(pass!=cpass) {
        document.forms["userform"]["cpass"].style.border="2px solid red";
         return false;  
    }
    else{
        return true;
    }
    
}

function validPhone(no){
         var x=no.split('');
          if(x.length >11 || x.length < 11 || x[0]!=0){
                  return false;
         }
         return true;
}
function emailValidation(email){
        var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");
        
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
        return false;
    }
    
}
function validateupdate(){
    var x = document.forms["userform"]["name"].value;
    var y=document.forms["userform"]["p_no"].value;
    var z=document.forms["userform"]["bkp_no"].value;
    var a=document.forms["userform"]["email"].value;
    var ag=document.forms["userform"]["age"].value;
    if (x == null || x == "" || isNaN(x)==false ) {
     document.forms["userform"]["name"].style.border="2px solid red";
         return false;
    }else if(y==null || y == ""|| !validPhone(y)){
        document.forms["userform"]["p_no"].style.border="2px solid red";
         return false;  
    }else if(z==null || z == ""|| !validPhone(z)){
        document.forms["userform"]["bkp_no"].style.border="2px solid red";
         return false;  
    }
    else if(a==null || a==""||  emailValidation(a)==false) {
        document.forms["userform"]["email"].style.border="2px solid red";
         return false;  
    }
    else if(ag==null || ag==""||  isNaN(ag)==true || ag<15 || ag>70) {
        document.forms["userform"]["age"].style.border="2px solid red";
         return false;  
    }
    else{
        return true;
    }
}


function passchange(){
    var pass = document.forms["passform"]["pass1"].value;
    var newpass=document.forms["passform"]["newpass"].value;
    var cpass=document.forms["passform"]["conpass"].value;
    if(pass==null || pass==""||  pass.length<6) {
        document.forms["passform"]["newpass"].style.border="2px solid red";
         return false;  
    }
    else if(newpass==null || newpass==""||  newpass.length<6) {
        document.forms["passform"]["newpass"].style.border="2px solid red";
         return false;  
    }
     else if(newpass!=cpass) {
        document.forms["passform"]["cpass"].style.border="2px solid red";
         return false;  
    }
    else{
        return true;
    }

}
function addproduct(){
         var pricw = document.forms["aproduct"]["pprice"].value;
        var noproduct=document.forms["aproduct"]["nofproduct"].value;
        if(pricw==null || pricw == ""|| isNaN(pricw)==true ){
        document.forms["aproduct"]["pprice"].style.border="2px solid red";
         return false;  
    }
    else if(noproduct==null || noproduct == ""|| isNaN(noproduct)==true ){
        document.forms["aproduct"]["nofproduct"].style.border="2px solid red";
         return false;  
    }
    else{
        return true;
    }
}