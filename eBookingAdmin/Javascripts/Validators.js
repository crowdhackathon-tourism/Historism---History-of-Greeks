
	function checkNewRoom(){
     document.getElementByName("EmailV").innerHTML ="";
 document.getElementByName("PhoneV").innerHTML ="";
 document.getElementByName("FnameV").innerHTML ="";
 document.getElementByName("LnameV").innerHTML ="";

var flag = 0;

var email=document.getElementByName("ID").value;
var fname=document.getElementByName("Descriptio").value;
var lname=document.getElementByName("Price").value;
var phone=document.getElementByName("Type").value;
var phone=document.getElementByName("Capacity").value;
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

var regexObj = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;


   if(reg.test(email) == false){
      document.getElementByName("EmailV").innerHTML ="Invalid Email";
      flag = 1;
   }
   
   if(regexObj.test(phone) == false){
      document.getElementByName("PhoneV").innerHTML ="Invalid Phone";
      flag = 1;
   }
   if(fname == ""){
      document.getElementByName("FnameV").innerHTML ="Required";
      flag = 1;
   }
   if(lname ==""){
     document.getElementByName("LnameV").innerHTML ="Required";
     flag = 1;
   }
   
if(flag==0){
return true;
}
else{
return false;
} 
     
     
     
	}	
