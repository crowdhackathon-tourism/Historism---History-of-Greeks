function checkAvaliability(){
var from =  document.getElementById("timestamp").value;
var to =  document.getElementById("timestamp1").value;

WriteBig("Ajax/Availability/checkButtonAjax.php", "from="+from+"&to="+to);


}

function setAvaliability(){
   alert("a");
var from =  document.getElementById("timestamp").value;
var to =  document.getElementById("timestamp1").value;

	var selObj = document.getElementById('roomSelector');
	var selIndex = selObj.selectedIndex;
	var room =  selObj.options[selIndex].value;

var available = document.getElementById("setAvailable").value;
var price = document.getElementById("setPrice").value;  

WriteBig("Ajax/Availability/setButtonAjax.php", "from="+from+"&to="+to+"&roomid="+room+"&available="+available+"&price="+price);


}


function WriteBig(url,content){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("myava").innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
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
	
