
<script>

function color_court1(){
greens=[];
if(courtbool1==true ){
court_num=1;
document.getElementById("court1").style.backgroundColor='orange';
courtbool1=false;
document.getElementById("court2").style.backgroundColor='#CCCCCC';courtbool2=true;
anotherWeek();
displayCalendar();

}
else if(courtbool1==false){
court_num=2;
anotherWeek();
displayCalendar();

document.getElementById("court1").style.backgroundColor='#CCCCCC';
if(courtbool2==true){document.getElementById("court2").style.backgroundColor='orange';courtbool2=false;};

courtbool1=true;

}
}
function color_court2(){
greens=[];
if(courtbool2==true){
court_num=2;
courtbool2=false;
document.getElementById("court2").style.backgroundColor='orange';
document.getElementById("court1").style.backgroundColor='#CCCCCC'; courtbool1=true;
console.log(courtbool2);

anotherWeek();
displayCalendar();

}
else if(courtbool2==false){
court_num=1;

if(courtbool1==true){document.getElementById("court1").style.backgroundColor='orange'; courtbool1=false;};
document.getElementById("court2").style.backgroundColor='#CCCCCC';
courtbool2=true;
anotherWeek();
displayCalendar();


}
}
function anotherWeek(){
if(court_num==1){
if(str3.length>0){
console.log("xxx"+range(first,last));
for(var i=0;i<str3.length;i++){
if(parseInt(str3[i].slice(0, 4))==parseInt(year) && (str3[i].slice(5, 7)==parseInt((firstMonth)) ||parseInt(str3[i].slice(5, 7))==parseInt((firstMonth+1))) && In(str3[i].slice(8,10), range(first,last))){
greens.push(str3[i]);
				}
			}
		}
	}else{
	if(str4.length>0){
for(var i=0;i<str4.length;i++){
if(str4[i].slice(0, 4)==year && (str4[i].slice(5, 7)==(firstMonth+1) ||str4[i].slice(5, 7)==(firstMonth)) && In(str4[i].slice(8,10), range(first,last))){
console.log("was here");
greens.push(str4[i]);
				}
			}
		}

	}
	console.log("greens "+greens);
}

console.log("in DB court1:"+str3);
console.log("in DB court2:"+str4);

  var flags=[];
  for(var i=0;i<=49;i++){
   flags[i]=true;
}
var flags1=[];
  for(var i=0;i<=49;i++){
   flags1[i]=true;
}



function range(start, stop, step=1) {
    var a = [], b = start;
    var count=0;
        if(start>= dayPerMonth[firstMonth]-7){
    for(var i=start;i<=dayPerMonth[firstMonth-1];i++){
    a.push(i);
    count+=1;
    }
    for(var i=1;i<stop+1;i++){
    a.push(i);
    
    }
    }
    else{
    var fl=true;
    while (b < stop) {
    if (fl==true){
    a.push(start);
    fl=false;
    }
        a.push(b += step || 1);
    }}
    return a;
}

function In(who,inWhere){
for(var i=0;i<inWhere.length;i++){
if(who==inWhere[i]){
return true;
}
}
}



function callurl(){
	id= document.getElementById("greens").value;
	location.href="checkWeekly.php?greens="+raz+"&first1="+first+"&last1="+last+"&year="+year+"&firstMonth="+firstMonth+"&del="+del1+"&court_num="+court_num+"&lastMonth="+lastMonth;
}

 function choose_all(num_day,hours_counter){
 greens=[];
 array_days=[];
 array_hours=[];
displayCalendar();
  for(var i=0;i<49;i++){
   flags[i]=true;
   flags1[i]=true;
  disableclick((i+1),array_days[i],array_hours[i]);

   } 
}


var flagy=true;//A variable to detect if we are at the end of month
var flag2=true;// Checks if we moved to the next month
var dayCheck=0;// In which day of the week the month ends


function build_next(dayPerMonth){ //the relevant month last day, for instance february the 28th
reset_all();
array_days=[];
array_hours=[];
forDelete();
 anotherWeek();
	if(flag2==false || isFirst==true){
		if(lastMonth==0){firstMonth=0;
			 
			}else if(firstMonth!=lastMonth){firstMonth+=1};
		first=last+1;
		if(last==dayPerMonth){last=0;first=-6; lastMonth+=1;
	}else{last=first+6};
		flag2=true; 
		}
	if(lastMonth==12){
		if(flagy==true){
			if(last>dayCheck){
				flagy=false;
				firstMonth=0;
				lastMonth=0;
				year+=1;
				
				}
		}
		
		else{
			first=1;
			last=7;
	}
		}
	else if(last>dayCheck && dayCheck!=0){
				//last=last-dayCheck;
			
		dayCheck=0;
}		
		else{
		if(isFirst!=true){
	    first+=7;
	    last+=7;
		}else{isFirst=false};
		}
		if(first > 21){ 
		for(var i=0;i<7;i++){
		console.log(i+first);
			if(i+first==dayPerMonth){
				dayCheck=i+1;
				last=7-i-2;
						if(last==0){last=dayPerMonth;
				}else{
				if(lastMonth==11){lastMonth=0;year+=1}else{lastMonth+=1}}; 
				flag2=false;				
				break;
			}
			}
			}
			
console.log("first "+first+" last "+last+" day of month(dayCheck): "+dayCheck+" the day we got in the function: "+ dayPerMonth);

	
greens=[];

 anotherWeek();
  displayCalendar()	; 
	console.log("bool1 "+courtbool1+"bool2 "+courtbool2);
}




function build_pri(dayPerMonth=28,prevMonth){
reset_all();
forDelete();
if(isFirst && last<8){
flag2=false;}
if(flag2==false || last==1){
if(last<0){
last=dayPerMonth[firstMonth]-last;
}
if(lastMonth==0){lastMonth=11;}else{lastMonth-=1};
if(firstMonth<8 ){
last=first-1;
first=last-6;
}else{
last=prevMonth-dayCheck-3;
first=last-6;
}
flag2=true; 
}
		if(lastMonth==0 && first<dayCheck){
		firstMonth=11;
		lastMonth=11;
		year-=1;
		}
			if((dayPerMonth[firstMonth]-6)<last){// if we are at the end of month
		last=dayPerMonth-1;
		first=last-6;
		if(first>dayCheck){
		flagy=false;
		}		
		}
	else if(first>dayCheck && dayCheck!=0){
			dayCheck=0;
}		
		else if(isFirst==false){
	    first-=7;
	    last-=7;
			} 
			if(last < 8  && isFirst==false ){ 
						for(var i=1;i<8;i++){
		console.log(i+first);
			if(last==i){
						if(prevMonth==undefined){prevMonth=31};
				dayCheck=7-i;
				firstMonth-=1;
				first=prevMonth-dayCheck+2;
				break;}
				if(firstMonth==0 || firstMonth==-1){firstMonth=12;year-=1;}; 
							flag2=false;
				}
			
			
			}
			console.log("first "+first+" last "+last+" day of month(dayCheck): "+dayCheck+  " the day we got in the function: "+ dayPerMonth);
isFirst=false;
 anotherWeek();
  displayCalendar()	; 

}

	
	function forDelete() {
var x=firstMonth;
var y=lastMonth;
if(last>27 && last<32){
if(del.length==2){
del=[];
}
del.push(year+"-"+ x+"-"+first);
del.push(year+"-"+ y+"-"+last);
del1=del.toString();
}else if(last<8){
if(del.length==2){
del=[];
}

del.push(year+"-"+ x+"-"+first);
del.push(year+"-"+ y+"-"+last);
del1=del.toString();
}
else{
if(del.length==2){
del=[];
}

del.push(year+"-"+ x+"-"+first);
del.push(year+"-"+ x+"-"+last);
del1=del.toString();
console.log("sss "+del);
}
}

	
	function disableclick(id,num_day,hours_counter,w) {

var x=firstMonth;
var y=lastMonth;
console.log("firstmonth "+x+" lastmonth "+y+" numday "+num_day+ "hours "+hours_counter+" dayCheck"+ w);
if((num_day<=w)){
if((x.toString()).length==1 &&(num_day.toString()).length==1){
var tempi=year+"-"+"0"+y+"-"+"0"+num_day+" "+hours_counter+":00:00";
console.log("a");
}
else if((x.toString()).length>1 &&(num_day.toString()).length==1){
var tempi=year+"-"+y+"-"+"0"+num_day+" "+hours_counter+":00:00";
console.log("b");

}
else if((x.toString()).length==1 &&(num_day.toString()).length>1){
var tempi=year+"-"+"0"+y+"-"+num_day+" "+hours_counter+":00:00";
console.log("c");

}
else{
var tempi=year+"-"+y+"-"+num_day+" "+hours_counter+":00:00";
console.log("d");

}
}else{
if((y.toString()).length==1 &&(num_day.toString()).length==1){
var tempi=year+"-"+"0"+y+"-"+"0"+num_day+" "+hours_counter+":00:00";
console.log("e");

}
else if((y.toString()).length>1 &&(num_day.toString()).length==1){
var tempi=year+"-"+x+"-"+"0"+num_day+" "+hours_counter+":00:00";
console.log("f");

}
else if((y.toString()).length==1 &&(num_day.toString()).length>1){

var tempi=year+"-"+"0"+x+"-"+num_day+" "+hours_counter+":00:00";
console.log("g");

}
else{
var tempi=year+"-"+x+"-"+num_day+" "+hours_counter+":00:00";
console.log("h");

}
}
if(court_num==1){
	if(flags[id-1]==true){
	 document.getElementById(id).style.backgroundColor='orange';
	 greens.push(tempi);
	flags[id-1]=false;
	
	}else{
flags[id-1]=true;
  var index = greens.indexOf(tempi);
  //console.log("tempi "+tempi);
  //console.log("index: "+index);
       greens.splice(index, 1);
	 document.getElementById(id).style.backgroundColor='white';
	 
	}
	}else{
	if(flags1[id-1]==true){
	 document.getElementById(id).style.backgroundColor='orange';
	 greens.push(tempi);
	flags1[id-1]=false;
	
	}else{
flags1[id-1]=true;
  var index = greens.indexOf(tempi);
  //console.log("tempi "+tempi);
  //console.log("index: "+index);
       greens.splice(index, 1);
	 document.getElementById(id).style.backgroundColor='white';
	 
	}
//console.log(greens);
	}



raz=greens.toString();
console.log("greens= "+greens);
 
	
	 }
function reset_all(){
  for(var i=1;i<=50;i++){
   flags[i-1]=true;
   flags1[i-1]=true;
}
greens=[];  
displayCalendar();

}

</script>
