var flag=true;


        jQuery(function() {
            jQuery('.selectday').datepicker({
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
 
 
 
 
function daysInMonth(month,year) {
var m = [31,28,31,30,31,30,31,31,30,31,30,31];
if (month != 2) return m[month - 1];
if (year%4 != 0) return m[1];
if (year%100 == 0 && year%400 != 0) return m[1];
return m[1] + 1;
} 




