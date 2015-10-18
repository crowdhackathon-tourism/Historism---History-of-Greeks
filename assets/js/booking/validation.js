function dropdownV(){

var variety = document.getElementById("variety").value;

var n = parseInt(variety);
var c=0;

var hidd = document.getElementById("daysH").value;


//Elenxoume an o xristis exi kani select, se auta pou exi kani ta apothikeuoume 
 for(var i=0;i<n;i++){

     var selector = document.getElementById("selector"+i+"").value;
     
     if(selector > 0){
     document.getElementById("LabelOveral"+i).innerHTML = document.getElementById("LabelOveralHidden"+i).value * selector;
     c=c+1;
     }
     else{
		document.getElementById("LabelOveral"+i).innerHTML ='0';
     }
 }

 if(c>0){
   document.getElementById("bookNow").disabled=false;
 }
 else{
   document.getElementById("bookNow").disabled=true;
 }
}






function checkSubmit(){

 document.getElementById("EmailV").innerHTML ="";
 document.getElementById("PhoneV").innerHTML ="";
 document.getElementById("FnameV").innerHTML ="";
 document.getElementById("LnameV").innerHTML ="";

var flag = 0;

var email=document.getElementById("Email").value;
var fname=document.getElementById("Fname").value;
var lname=document.getElementById("Lname").value;
var phone=document.getElementById("Phone").value;

var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

var regexObj = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;


   if(reg.test(email) == false){
      document.getElementById("EmailV").innerHTML ="Invalid Email";
      flag = 1;
   }
   
   if(regexObj.test(phone) == false){
      document.getElementById("PhoneV").innerHTML ="Invalid Phone";
      flag = 1;
   }
   if(fname == ""){
      document.getElementById("FnameV").innerHTML ="Required";
      flag = 1;
   }
   if(lname ==""){
     document.getElementById("LnameV").innerHTML ="Required";
     flag = 1;
   }
   
if(flag==0){
return true;
}
else{
return false;
} 
 
}

