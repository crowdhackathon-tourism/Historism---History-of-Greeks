﻿
function checkBoxf(checkB){
	
	if(checkB.checked == true){
	   if(checkB.id == 'DefaultCheckBox'){
       document.getElementById("DefaultPrice").disabled=false;
       document.getElementById("DefaultTax").disabled=false;
       document.getElementById("DefaultDiscount").disabled=false;
       }
       else if(checkB.id == 'CustomCheckBox'){
       document.getElementById("CustomPrice").disabled=false;
       document.getElementById("CustomTax").disabled=false;
       document.getElementById("CustomDiscount").disabled=false;
       document.getElementById("AddCustomPrice").disabled=false;
       document.getElementById("CustomFrom").disabled=false;
       document.getElementById("CustomTo").disabled=false;

       }  
    }
	else if(checkB.checked == false){
	   if(checkB.id == 'DefaultCheckBox'){
       document.getElementById("DefaultPrice").disabled=true;
       document.getElementById("DefaultTax").disabled=true;
       document.getElementById("DefaultDiscount").disabled=true;
       }
       else if(checkB.id == 'CustomCheckBox'){
       document.getElementById("CustomPrice").disabled=true;
       document.getElementById("CustomTax").disabled=true;
       document.getElementById("CustomDiscount").disabled=true;
       document.getElementById("AddCustomPrice").disabled=true;
       document.getElementById("CustomFrom").disabled=true;
       document.getElementById("CustomTo").disabled=true;

       
       }  
 
	}
	
}

