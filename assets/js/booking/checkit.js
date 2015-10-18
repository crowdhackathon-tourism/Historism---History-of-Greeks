function check(){
	
document.getElementById('ava').innerHTML='<center><img src="assets/img/loading2.gif" width="50" height="50" /></center>';

var date_in=document.getElementById('timestamp').value;
var date_out=document.getElementById('timestamp1').value;
var room_type=document.getElementById('roomtype').value;
var database=document.getElementById('database').value;
var ip=document.getElementById('ip').value;

var d1 = new Date(date_in); 
var d2 = new Date(date_out); 
var one_day=1000*60*60*24;
var days = Math.ceil((d2.getTime()-d1.getTime())/(one_day));
document.getElementById("nights").innerHTML= days+ " nights";
document.getElementById("daysH").value = days;

Write("Ajax/medphpFcheck.php", "dateIn="+date_in+"&dateOut="+date_out+"&roomType="+room_type+"&days="+days+"&database="+database+"&ip="+ip);

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

function Simple_Write(url, content){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
         
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		
		 
} 

function WriteBig(url, content){ // url is the script and data is a string of parameters
	
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

var flag=true;


		
        jQuery(function($) {
        	
            $('.selectday').datepicker({
                onSelect: function(dateText, option) {
                      
                        callPopup();
                }
                
                

            });
        });

   
   

 function callPopup() {
            jQuery("a.inline1").trigger("click");
           
        	
      	

        var ch1=document.getElementById('timestamp').value;
		var ch2=document.getElementById('timestamp1').value;
		if(ch1>=ch2)
			flag=true;

 		if(flag==true)
 		{    
 			var x=document.getElementById('timestamp').value;
 			
 			var y=x.substring(8,10);
 			y++;
 			if(y>0 && y<10)
 				document.getElementById('timestamp1').value=x.substring(0,8)+"0"+y;
 			else
 			{
 				var yy=ch1.substring(0,4);
				var mm=ch1.substring(5,7);
				var dd=ch1.substring(8,10);
				
 				var kk=daysInMonth(mm,yy);
 				
				if(y>kk)
				{
					
					mm++;
					y="01";
					if(mm>0 && mm<10)
						document.getElementById('timestamp1').value=yy+"-0"+mm+"-"+y;
					else if(mm>12)
					{
						yy++;
						mm="01";
						document.getElementById('timestamp1').value=yy+"-"+mm+"-"+y;

					
					}
					else
						document.getElementById('timestamp1').value=yy+"-"+mm+"-"+y;
					
				}
				else
				{ 			
					document.getElementById('timestamp1').value=x.substring(0,8)+y;
				}
 				

			}
			flag=false;	
		}		
		
		
		

            
  }
 
 
function test()
{
	var ch1=document.getElementById('timestamp').value;
	
	
	var kk=daysInMonth(mm,yy);


	alert(kk);
}
 
 
function daysInMonth(month,year) {
var m = [31,28,31,30,31,30,31,31,30,31,30,31];
if (month != 2) return m[month - 1];
if (year%4 != 0) return m[1];
if (year%100 == 0 && year%400 != 0) return m[1];
return m[1] + 1;
} 

