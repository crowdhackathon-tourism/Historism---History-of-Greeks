function Click_Activation(){
	var x = document.getElementById('ConfirmationCode').value;
	var d = document.getElementById('database').value;
	var ip = document.getElementById('ip').value;
	
	Write("Ajax/Activation.php", "ConfirmationCode="+x+"&database="+d+"&ip="+ip);


}



function createXHR(){
		var request = false;
		
        try {	
            request = new ActiveXObject('Msxml2.XMLHTTP');
            }
        catch (err2){
            try{
                request = new ActiveXObject('Microsoft.XMLHTTP');
           		}
            catch (err3){
				try{	
					request = new XMLHttpRequest();
				}
				catch (err1){
					request = false;
				}
            }
         }
       return request;
}
	
function Write(url, content){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("ava").innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		
		 
} 
