function DeleteRoom(Rid,c){
   if(confirm("Delete Room with ID: "+Rid+" ?")){
   document.getElementById("row"+c).style.textDecoration='line-through';
     WriteBig2("Ajax/Room/DeleteRoom.php", "Rid="+Rid,c);
  }
 else{}
}





function PriceRoom(Rid,c){
	var test1 = document.getElementById("PriceButtonResault"+c).innerHTML;
	
	if(test1 != ""){
	   	document.getElementById("PriceButton"+c).value = "Open";
    	document.getElementById("PriceButtonResault"+c).innerHTML = "";
	}
	else{
	    document.getElementById("PriceButton"+c).value = "Close";
    	WriteBig("Ajax/Room/PriceRoom.php", "Rid="+Rid+"&c="+c,c);

	}



}


function AlterPriceRatio(){
  var from = document.getElementById("date_from").innerHTML;
  var to = document.getElementById("date_to").innerHTML;

  document.getElementById("AlterPriceLabel").innerHTML = from +"-"+to ;

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
		
		
function WriteBig(url,content,ca){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("PriceButtonResault"+ca).innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		}  
		
		

