var previous=0;
var select=-1;
function toolcell(num)
{
	
	if(previous!=-1)
	{
		
		if(previous!=num)
		{
			document.getElementById('tool'+previous+'').innerHTML="";
			document.getElementById('tool'+num+'').innerHTML="<a href='javascript:ForProcess("+num+");'><img src='Photos/b_edit.png' width='15' height='15' title='Edit'></a> <a href='javascript:okk("+num+");'><img src='Photos/xicon.jpg' width='15' height='15' title='Delete'></a>";
			previous=num;									 
		}
		
		
	}
	else
	{
		document.getElementById('tool'+num+'').innerHTML="<a href='javascript:ForProcess("+num+");'><img src='Photos/b_edit.png' width='15' height='15' title='Edit'></a> <a href='javascript:okk("+num+");'><img src='Photos/xicon.jpg' width='15' height='15' title='Delete'></a>";
		previous=num;	
	}


}


function ForProcess(num)
{
	
		
			
		//document.getElementById(num).style.backgroundColor="grey";
	/*if(select==-1)
	{
		document.getElementById(num).style.backgroundColor="grey";
		document.getElementById('tool'+num).style.backgroundColor="white";
		select=num;
	}
	else
	{
		document.getElementById('tool'+num).style.backgroundColor="white";
		document.getElementById(select).style.backgroundColor="white";
		document.getElementById(num).style.backgroundColor="grey";
		select=num;
	}
	
	*/
	var  fold= new Array();
	fold[0]="Code";
	fold[1]="Name";
	fold[2]="Description";
	fold[3]="Date";
	fold[4]="Time";
	fold[5]="Lecturer";
	fold[6]="Publisher";
	fold[7]="Finally_date"
	
	var str=document.getElementById('Time'+num).value;
	
	var n=str.split(":");
		
	var temp="<table>";
	
			//alert(document.getElementById(fold[0]+num).innerHTML);
			//alert("<tr><th>"+fold[0]+":</th><td><input type='text' id='ch"+fold[0]+"' value='"+document.getElementById(''+fold[0]+''num).value+"'></td></tr>");
	
	for(var i=0;i<fold.length-1;i++)
	{	
		temp+="<tr id='"+i+"' >";
		if(i==0)
			temp+="<th>"+fold[i]+":</th><td align='center'><label id='ch"+fold[i]+"'>"+document.getElementById(fold[i]+num).value+"</label></td>";
		else if(i==3)
			temp+="<th>"+fold[i]+":</th><td><input class='selectday'  id='timestamp'  type='Text'  name='timestamp' value='"+document.getElementById(fold[i]+num).value+"'></td>";
		else if(i==4)
		{	
			temp+="<th>"+fold[i]+":</th><td>";
			temp+= "<select id='chHour'>";
			for(var h=8;h<23;h++)
			{
				if(h==n[0])
					temp+="<option selected value='"+h+"'>"+h+"</option>";
				else
					temp+="<option  value='"+h+"'>"+h+"</option>";
			}
			temp+="</select>:";
			
			temp+= "<select id='chMinute'>";
			for(var h=0;h<60;h=h+5){	
				
				if((h>-1)&&(h<10))
				{
					if(h==n[1])
						temp+="<option selected value='0"+h+"'>0"+h+"</option>";
						
					else
						temp+="<option  value='0"+h+"'>0"+h+"</option>";
				}
				else
				{
					if(h==n[1])
						temp+="<option selected value='"+h+"'>"+h+"</option>";
						
					else
						temp+="<option  value='"+h+"'>"+h+"</option>";		
				}	
			
			}
			temp+="</select>";
			
			temp+=" <select id='ch"+fold[7]+"'>";
			if(document.getElementById(fold[7]+num).value==1){
				temp+="<option value='0'>Optional</option>";
				temp+="<option selected value='1'>Confirmed</option>";
			}
			else{
				temp+="<option selected value='0'>Optional</option>";
				temp+="<option  value='1'>Confirmed</option>";		
			}
			
			temp+="</select></td>";
	
		}
		else if(i==6)
			temp+="<th>"+fold[i]+":</th><td align='center'><label id='ch"+fold[i]+"'>"+document.getElementById(fold[i]+num).value+"</label></td>";
		else
			temp+="<th>"+fold[i]+":</th><td><input type='text' id='ch"+fold[i]+"' value='"+document.getElementById(fold[i]+num).value+"'></td>";
		temp+="</tr>";
	
	
	
	}
	
	
	
	temp+="<tr><td colspan='2' style='border-left: 1px solid #C1DAD7' align='center'><input type='button' value='Save' onclick='update("+num+")'><input type='button' value='Cancel' onclick='cancel()'></td></tr></table>"
	document.getElementById('processing').innerHTML=temp;
	
}





function cancel()
{
	
	document.getElementById('processing').innerHTML="";

}


function update(tr)
{	
	var id=document.getElementById('Code'+tr).value;
	var content="id="+id;
	
	var chname=document.getElementById('chName').value;
	var name=document.getElementById('Name'+tr).value;
	var chlecturer=document.getElementById('chLecturer').value;
	var lecturer=document.getElementById('Lecturer'+tr).value;	
	var chdescription=document.getElementById('chDescription').value;
	var description=document.getElementById('Description'+tr).value;
	var chfinallydate=document.getElementById('chFinally_date').value;
	var finallydate=document.getElementById('Finally_date'+tr).value;
	var date=document.getElementById('Date'+tr).value;
	var chdate=document.getElementById('timestamp').value;
	var time=document.getElementById('Time'+tr).value;	
	var h=document.getElementById('chHour').value;
	var m=document.getElementById('chMinute').value;
	var chtime=h+":"+m;
	
	if(chname!=name)
		content+="&name="+chname;
		
		
		
	if(chlecturer!=lecturer)
		content+="&lecturer="+chlecturer;
		
	if(chdescription!=description)
		content+="&description="+chdescription;	
	
	if(chfinallydate!=finallydate)
		content+="&finallydate="+chfinallydate;		

	if(chdate!=date)
		content+="&date="+chdate;	
			
	if(chtime!=time)
		content+="&time="+chtime;	
	
		content+="&row="+tr;
	
	
	upDateForm('Ajax/updateEventAjax.php',content,tr);
}




function upDateForm(url,content,tr){ 
// url is the script and data is a string of parameters

		var xhr = createXHR();
		
		xhr.onreadystatechange=function()
		{
          if (xhr.readyState==4 && xhr.status==200)
          {		
          	document.getElementById(tr).innerHTML="";	     
         	document.getElementById(tr).innerHTML=xhr.responseText;
         	document.getElementById(tr).style.fontStyle='italic';
         	document.getElementById(tr).style.fontWeight = 'bold';
         	//document.getElementById(tr).style.fontSize='22';
         	
		document.getElementById('tool'+previous+'').innerHTML="<a href='javascript:ForProcess("+previous+");'><img src='Photos/b_edit.png' width='15' height='15' title='Edit'></a> <a href='javascript:okk("+previous+");'><img src='Photos/xicon.jpg' width='15' height='15' title='Delete'></a>";
        	setTimeout(function(){ cleartr(tr)},3000);
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

function cleartr(tr)
{
         document.getElementById(tr).style.fontStyle='normal';
         document.getElementById(tr).style.fontWeight = 'normal';	
}




function okk(num)
{	
	var id=document.getElementById('Code'+num).value;
	var con = confirm("Are You Sure");
	if (con ==true)
	{
		deleteForm('Ajax/deleteEventAjax.php','id='+id,num);
	}

}

function deleteForm(url,content,tr)
{ // url is the script and data is a string of parameters

		var xhr = createXHR();
		
		xhr.onreadystatechange=function()
		{
          if (xhr.readyState==4 && xhr.status==200)
          {		
          		     
         	var str=xhr.responseText;
         	
			if(str==0)
				document.getElementById(tr).innerHTML="";
			
          }
        }
 		
  		xhr.open("POST", url, true);		
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send(content); 
} 
