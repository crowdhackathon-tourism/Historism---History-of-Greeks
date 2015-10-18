
function AjaxArray(){
//Pernoume to plithos twn apotelesmatwn




var variety = document.getElementById("variety").value;

var n = parseInt(variety);

var id=new Array();
var prices = new Array();
var amount=new Array();
var c=0;


//Elenxoume an o xristis exi kani select, se auta pou exi kani ta apothikeuoume 
for(var i=0;i<n;i++){

var selector = document.getElementById("selector"+i+"").value;

    if(selector > 0){
    
    id[c]=document.getElementById("id"+i+"").value;
    prices[c]=document.getElementById("LabelOveral"+i+"").innerHTML;
    amount[c]= selector;
    c=c+1;
    }
    else{

    }
   }

 if(c<=0){
	alert("You haven't choose any room.")

     } else{




//Dimiourgoume to string pou tha kanoume post
var Mystr = ""; 

for(var j=0;j<id.length;j=j+1){
  
      


  if((id.length-1)== j){
  Mystr =  Mystr + "R_id[]="+id[j]+"&R_prices[]="+prices[j]+"&R_amount[]="+amount[j];
  }
    
  else{
  Mystr =  Mystr +"R_id[]="+id[j]+"&R_prices[]="+prices[j]+"&R_amount[]="+amount[j]+"&";
  }
} 

//validate
  var summer = 0;
  for(var i=0;i<id.length;i++){
  var inta = parseInt(amount[i]);
   summer = summer +inta ;
  }
  
  if(summer>5){
 
  alert("You can book until 5 room per reservation!!!");
  }
  else{
  //alert(Mystr);
 
var database=document.getElementById('database').value;
var ip=document.getElementById('ip').value;

document.getElementById('ava').innerHTML='<center><img src="assets/img/loading2.gif" width="50" height="50" /></center>';
  WriteBig("Pages/booking/test_postArray.php", Mystr+"&database="+database+"&ip="+ip);

  }
  
  }

 
}



function WriteBig(url, content){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.body.innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
		
		 
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
