function RButtonAjax(Rid,c){
var test1 = document.getElementById("RButtonResault"+c).innerHTML;
	if(test1 != ""){
    document.getElementById("RButton"+c).value = "Open";
    document.getElementById("RButtonResault"+c).innerHTML = "";
	}
	else{
	    document.getElementById("RButton"+c).value = "Close";
    	WriteBig("Ajax/RButtonAjax.php", "Rid="+Rid+"&c="+c,c);

	}

}

function DButtonAjax(Rid,c){
   if(confirm("Delete reservetion with ID: "+Rid+" ?")){
   document.getElementById("row"+c).style.textDecoration='line-through';
     WriteBig2("Ajax/DButtonAjax.php", "Rid="+Rid,c);
  }
 else{}
}



function ReButtonAjax(Rid,c,counter,RoomType){
   var hiddenCounter = document.getElementById("hiddenCounter"+c).value;
   var amount = document.getElementById("RoomAmount").innerHTML;
 
   if((hiddenCounter == '1') && (amount == '1') ){
   	 alert("You can not remove all rooms ! ");	
   }
   else{
   	 if(confirm("Remove room from reservation with ID: "+Rid+" ?")){
   	 
   	 WriteBig3("Ajax/ReButtonAjax.php", "Rid="+Rid+"&RoomType="+RoomType,c,counter);
   	
   	 }
   	 else{}
   	 
   }
  
   
}




function RaButtonAjax(Rid,c){
var x =  document.getElementById("RaSelector"+c).selectedIndex;
var RoomType =  document.getElementById("RaSelector"+c).options[x].value;

	 if(confirm("Remove room from reservation with ID: "+Rid+" ?"))
   	 WriteBig3("Ajax/RaButtonAjax.php", "Rid="+Rid+"&RoomType="+RoomType,c);
   	 else{}	
	
}


function DaiButtonAjax(Rid,c){
   alert("Dai");

}

function DaoButtonAjax(Rid,c){
  alert("Dao");
}







function createXHR(){
		
		var ajaxRequest;  // The variable that makes Ajax possible!
	
	try{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch (e){
		// Internet Explorer Browsers
		try{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e){
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}       return ajaxRequest;
}
	

function WriteBig(url,content,ca){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("RButtonResault"+ca).innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		}  
		
		
		
function WriteBig2(url,content,ca){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("row"+ca).innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		}  
		
				
				

		
				

 		
function WriteBig3(url,content,ca,countera){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("row"+ca+"-"+countera).innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		}  
		

		
		$(function()
{
    // check placeholder browser support
    if (!Modernizr.input.placeholder)
    {
 
        // set placeholder values
        $(this).find('[placeholder]').each(function()
        {
            if ($(this).val() == '') // if field is empty
            {
                $(this).val( $(this).attr('placeholder') );
            }
        });
 
        // focus and blur of placeholders
        $('[placeholder]').focus(function()
        {
            if ($(this).val() == $(this).attr('placeholder'))
            {
                $(this).val('');
                $(this).removeClass('placeholder');
            }
        }).blur(function()
        {
            if ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))
            {
                $(this).val($(this).attr('placeholder'));
                $(this).addClass('placeholder');
            }
        });
 
        // remove placeholders on submit
        $('[placeholder]').closest('form').submit(function()
        {
            $(this).find('[placeholder]').each(function()
            {
                if ($(this).val() == $(this).attr('placeholder'))
                {
                    $(this).val('');
                }
            })
        });
 
    }
});
		
		