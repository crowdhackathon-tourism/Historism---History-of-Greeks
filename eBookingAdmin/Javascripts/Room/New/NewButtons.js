function add(){//add one row to table

	var fromN = document.getElementById("timestamp").value;	
	var toN = document.getElementById("timestamp1").value;
	var available = document.getElementById("available").value;
	var price = document.getElementById("price").value;


	var table=document.getElementById("newRoomAvailabilityTable");
	var rowCount = table.rows.length;
	
	var FromTd = new Date(fromN);
    var ToTd = new Date(toN);
	var Vflag = true;
	for(var i=1; i<rowCount; i++){
		var row = table.rows[i];
  		var From = new Date(row.cells[1].innerHTML);    
    	var To   = new Date(row.cells[2].innerHTML); 
    	
    
		if((From > FromTd) && (From < ToTd)){
		   	Vflag = true;
		}
		else if((From > FromTd) && (To > ToTd)){
			Vflag = true;
		}
		else if((From > FromTd) && (To < ToTd)){
			Vflag = true;
		}
		else if((To < FromTd) && (To < ToTd)){
			Vflag = true;
		}

		else{
	        Vflag = false;
		}
	}
	
	if(Vflag){
	var row=table.insertRow(rowCount);
	var cell0=row.insertCell(0);
	var cell1=row.insertCell(1);
	var cell2=row.insertCell(2);
	var cell3=row.insertCell(3);
	var cell4=row.insertCell(4);


	cell0.innerHTML= rowCount;
	cell1.innerHTML= fromN;
	cell2.innerHTML= toN;
	cell3.innerHTML= available;
	cell4.innerHTML= price;

	document.getElementById("timestamp").value = null;
	document.getElementById("timestamp1").value= null;
	document.getElementById("available").value= null;
	document.getElementById("price").value= null;

	document.getElementById("newRoomAvailabilityminusButton").disabled = false;
	}
	else{
		alert("You have enter tha same dates");
	}
}



function remove(){//remove the last row from the table

	var table=document.getElementById("newRoomAvailabilityTable");
	var rowCount = table.rows.length;
	table.deleteRow(rowCount-1);


	if(rowCount == 2){
		document.getElementById("newRoomAvailabilityminusButton").disabled = true;
	}

}



function createNewRoom(){//POST entire form to the server

var id = document.getElementById("newRoomid").value;
var type = document.getElementById("newRoomtype").value;
var description = document.getElementById("newRoomdescription").value;
var capacity = document.getElementById("newRoomcapacity").value;
var myVflag1 = false;
var myVflag2 = false;
var myVflag3 = false;



  if(capacity == "" || capacity == null){
 	myVflag1 = false;
 	document.getElementById("capacityValidate").innerHTML= "Required";	
  }
  else{
 	 	if((parseFloat(capacity ) == parseInt(capacity )) && !isNaN(capacity)){
      		myVflag1 = true;
      		document.getElementById("capacityValidate").innerHTML= "";
      		

	
  		}
  		else{
 			myVflag1 = false;
 			document.getElementById("capacityValidate").innerHTML= "Numbers"
 		}
  } 


 if(type == "" || type == null ){
 	myVflag2 = false;
 	document.getElementById("typeValidate").innerHTML = "Required";
 }
 else{
 	myVflag2 = true;
 	document.getElementById("typeValidate").innerHTML = "";

 }



 if(description == "" || description == null ){
    myVflag3 = false;
 	document.getElementById("descriptionValidate").innerHTML= "Required";
 	
 }
 else{
 	myVflag3 = true;
 	document.getElementById("descriptionValidate").innerHTML= "";

 }

if(myVflag1 && myVflag2 && myVflag3){
	var table=document.getElementById("newRoomAvailabilityTable");
	var rowCount = table.rows.length;



	if(rowCount > 1){
	//We get the HTML table and transform it to javascript table
	    var Mystr = ""; 
	  

    	var From = new Array(rowCount-1);
    	var To = new Array(rowCount-1);
        var Available = new Array(rowCount-1);
        var Price = new Array(rowCount-1);
        
        
    	for (var i = 1; i < rowCount; i++) {
    		var row = table.rows[i];
    		
    		From[i]=row.cells[1].innerHTML;
    		To[i] =row.cells[2].innerHTML;
    		Available[i]=row.cells[3].innerHTML;
    		Price[i]=row.cells[4].innerHTML; 
    		 
    		Mystr =  Mystr + "&From[]="+From[i]+"&To[]="+To[i]+"&Available[]="+Available[i]+"&Price[]="+Price[i];  		
        }              
    		
    		 
    		
    		
  			    
  			

  		
	//We POST all attributes to server
    
	Write("Ajax/Room/CreateNewRoomButtonAjax.php", "id="+id+"&type="+type+"&description="+description+"&capacity="+capacity+Mystr);
	}
	else{
	//We POST only General informations
	Write("Ajax/Room/CreateNewRoomButtonAjax.php", "id="+id+"&type="+type+"&description="+description+"&capacity="+capacity);
   	}

	
	
	
}	
else{
}
	

	

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
	

function Write(url,content){ // url is the script and data is a string of parameters
	
		var xhr = createXHR();
		
		xhr.onreadystatechange=function(){
          if (xhr.readyState==4 && xhr.status==200){
          document.getElementById("desktop").innerHTML=xhr.responseText;
          }
        }
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
}  
		












