
                
<?php 
 include("connect_db.php");
 include("weekly_calendar_css.css");

 session_start();
if(isset($_GET['court_num'])){
$_SESSION['court_num']=$_GET['court_num'];
$court_num=$_SESSION['court_num'];
}else{
$court_num=1;
}
if(isset($_GET['firstMonth'])){
$_SESSION['firstMonth']=$_GET['firstMonth'];
$firstMonth=$_SESSION['firstMonth'];
}else{
$firstMonth=0;
}
if(isset($_GET['lastMonth'])){
$_SESSION['lastMonth']=$_GET['lastMonth'];
$lastMonth=$_SESSION['lastMonth'];
}else{
$lastMonth=0;
}
if(isset($_GET['first'])){
$_SESSION['first']=$_GET['first'];
$first=$_SESSION['first'];
}else{
$first=0;
}
if(isset($_GET['last'])){
$_SESSION['last']=$_GET['last'];
$last=$_SESSION['last'];
}else{
$last=0;
}


$query1 = "select allocation_datetime,court_num from allocations where year(allocation_datetime)<YEAR(CURDATE()) + 1 and court_num=1";


$result1 = $conn->query($query1);

$str3="";
$flag=true;
if ($result1 ->num_rows > 0) {
	while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {  
	if($flag==true){
	$str3.= $row['allocation_datetime'];
	$flag=false;
	}
	else
	{
	$str3.= ",".$row['allocation_datetime'];
	};			
}
}
$query2 = "select allocation_datetime,court_num from allocations where year(allocation_datetime)<YEAR(CURDATE()) + 1 and court_num=2";
$result2 = $conn->query($query2);
$str4="";
$flag=true;
if ($result2 ->num_rows > 0) {
	while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {  
	if($flag==true){
	$str4.= $row['allocation_datetime'];
	$flag=false;
	}
	else
	{
	$str4.= ",".$row['allocation_datetime'];
	};			
}
}
$conn->close();
?>



<?php include("gk_inc_title.php") ?>

<html  dir="rtl">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width">

<head> 
<title>calendar</title>
<script>
var FebNumberOfDays="";
 //Determing if February (28,or 29)  
if (firstMonth == 1){
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
      FebNumberOfDays = "29";
      console.log("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
    }}else{
      FebNumberOfDays = "28";
      }

 // names of months and week days.
 var monthNames = ["ינואר","פברואר","מרץ","אפריל","מאי","יוני","יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר", "דצמבר"];
 var dayNames = ["ראשון","שני","שלישי","רביעי","חמישי","שישי", "שבת"];
 var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"];
var del1="";
var array_days=[];
var array_hours=[];
var isFirst=true;
var str3 = "<?php echo $str3 ?>";
var str4 = "<?php echo $str4 ?>";
var court_num="<?php echo $court_num ?>";
if(court_num==1){
var courtbool1=false;
var courtbool2=true;
}else{
var courtbool1=true;
var courtbool2=false;
}



var del=[];
var dateNow = new Date();
if("<?php echo $firstMonth?>"==0){
var firstMonth = dateNow.getMonth()+1;
}else{var firstMonth=parseInt("<?php echo $firstMonth?>")
};
if("<?php echo $lastMonth?>"==0){
var lastMonth=firstMonth;
}else{var lastMonth=parseInt("<?php echo $lastMonth?>")
};
var year = dateNow.getFullYear();
var curr = new Date; // get current date
if("<?php echo $first?>"==0){
console.log(curr.getDate() - curr.getDay());
if((curr.getDate() - curr.getDay())<0){
console.log("curr.getDate() "+curr.getDate()+" curr.getDay() "+curr.getDay());
var first = parseInt(dayPerMonth[firstMonth])-(7-parseInt(curr.getDay()-1));
console.log("ccc "+curr.getDay());
}else{
var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
}
}else{var first=parseInt("<?php echo $first?>")};


if("<?php echo $last?>"!=0){
var last=parseInt("<?php echo $last?>");

}
console.log("firmonth "+firstMonth+" lastMonth "+lastMonth);

console.log("first "+first+"curr.getDate() "+curr.getDate()+"curr.getDay() "+curr.getDay());
//var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
if("<?php echo $last?>"==0){
if(first==0){
first=dayPerMonth[firstMonth];
firstMonth-=1;
var last=6;
}

else if(first==dayPerMonth[firstMonth-1]){
lastMonth=lastMonth+1;
var last=6;
}
else if(first>25){
var last=7-parseInt((dayPerMonth[firstMonth-1]-first));
lastMonth=lastMonth+1;
}else{
var last=first+6;
}
}
var w=(7-(dayPerMonth[firstMonth-1]-first));
 var raz="";
//firstMonth=firstMonth-1;
//lastMonth=lastMonth-1;
var raz="";
var greens=[];
str3=str3.split(",");
console.log("in DB: "+str3);
str4=str4.split(",");

function displayCalendar(){
 var htmlContent ="";
 var FebNumberOfDays ="";
 var counter = 1;
 var hours_counter=11;
 // days in previous month and next one , and day of week.
 var weekdays2 = 0;
 var numOfDays = dayPerMonth[firstMonth];
 var num_day=1;
 // loop to build the calander body.
var bbb=true;
var remember=parseInt(first)+parseInt(weekdays2);
 while (counter <= 49){
 
 if(counter==1){
  	forDelete();
  	}
 	if (bbb==true){
 	num_day=parseInt(first)+parseInt(weekdays2);
 	 
 	}  
 	if(num_day>dayPerMonth[firstMonth-1]){
  	num_day=1;
  	bbb=false;
  	}
  	
  	 if (weekdays2 > 6){
        weekdays2 = 0;
       hours_counter=hours_counter+2;
      num_day=remember;
    }

    var razi=firstMonth+1;
 for(var i=0;i<greens.length;i++){
if(parseInt(num_day)==parseInt(greens[i].slice(8,10)) && (razi-1==greens[i].slice(6,7) || (razi)==greens[i].slice(6,7)) && greens[i].slice(11,13)==hours_counter){
if(court_num==1){
flags[counter-1]=false;
}else{flags1[counter-1]=false;};

}

    }


  	     // When to start new line.
  	 if(court_num==1){
 	if(flags[counter-1]==true){
          htmlContent +="<td id="+counter+" class='monthnow daily';   width='160'; height='50'"+
        " onclick='disableclick("+counter+","+num_day+","+hours_counter+");'><span  style='font-weight: bold; '><font face='Arial' size='3'>"+hours_counter+":00 </font></span><br /></td>";   
        } else{
         htmlContent +="<td style='background-color:orange;' id="+counter+" class='monthnow daily';  width='160';height='50'  "+
        " onclick='disableclick("+counter+","+num_day+","+hours_counter+");'><span style='font-weight: bold;'><font face='Arial' size='3'>"+hours_counter+":00 </font></span><br /></td>"; 
        }
     
        }else if(court_num==2){
        if(flags1[counter-1]==true){

             htmlContent +="<td id="+counter+" class='monthnow daily';  width='160'; height='50' "+
        " onclick='disableclick("+counter+","+num_day+","+hours_counter+");'><span style='font-weight: bold;'><font face='Arial' size='3'> "+hours_counter+":00</font></span><br /></td>";   
        } else{
         htmlContent +="<td style='background-color:orange;' id="+counter+" class='monthnow daily';   width='160'; height='50'  "+
        " onclick='disableclick("+counter+","+num_day+","+hours_counter+");'><span style='font-weight: bold;'><font face='Arial' size='3'> "+hours_counter+":00</font></span><br /></td>"; 
        }

        }


 
     var tempi=counter-1;
     

    weekdays2++;
        if (weekdays2 > 6){
        htmlContent += "</tr><tr>";
}

 array_days.push(num_day);
 array_hours.push(hours_counter);   


    counter++;
    num_day++;
 }
last=num_day-1;
console.log(lastMonth);
 // building the calendar html body.
 var calendarBody ="<table><tr><td><input name=\"Button2\" class=\"buttons\" type=\"button\" value=\"<< השבוע הקודם \" onclick=\"build_pri("+dayPerMonth[firstMonth]+","+dayPerMonth[lastMonth-1]+")\">&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class=\"buttons\" name=\"Button1\" type=\"button\" value=\"השבוע הבא>>\" onclick=\"build_next("+dayPerMonth[firstMonth]+")\"></td></table>";
 
  calendarBody +="<br><table class='calendar'> <tr class='monthNow'><th colspan='7'><font face='Arial,sans' size='5.5'>"
+ first+"-"+monthNames[firstMonth-1]+" "+last+"-"+monthNames[lastMonth-1]+" "+ year +"</th></tr>";
 calendarBody +="<tr class='dayNames'><td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"ראשון</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"&nbsp;שני&nbsp;</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שלישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"רביעי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"חמישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color='#000000' face='Arial,sans' size='5.5'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שבת</span></font></center></td></tr>"
 calendarBody += "<tr>";
 calendarBody += htmlContent;
 calendarBody += "</tr></table>";
 calendarBody+="<form method=\"post\" action=\"checkWeekly.php?greens="+raz+"&first="+first+"&last="+last+"&year="+year+"&firstMonth="+firstMonth+"&lastMonth="+lastMonth+"&del="+del1+"&court_num="+court_num+"\" style=\"height: 348px\" >";
 calendarBody+="<input class=\"buttons\" id=\"court1\"  name=\"court1\" type=\"button\" value=\"מגרש 1\" onclick=\"color_court1()\" /><input id=\"court2\" class=\"buttons\" name=\"court2\" type=\"button\" value=\"מגרש 2\" onclick=\"color_court2()\" /><br>"
 calendarBody+="<input class=\"buttons\" name=\"Reset1\" type=\"button\" value=\"איפוס\" onclick=\"reset_all()\">"
 +"<input class=\"buttons\" id=\"greens\" name=\"Submit1\" type=\"button\" value=\"שמור\" onclick=\"callurl()\" /><input class=\"buttons\" name=\"chooseAll\" type=\"button\" value=\"בחר הכל\" onclick=\"choose_all("+num_day+","+hours_counter+")\" /><br><input class=\"buttons\" name=\"run\" type=\"button\" value=\"הרץ אלגוריתם\" onclick=\"runa()\" /><input class=\"buttons\" name=\"run\" type=\"button\" value=\"גרף משחקים שבועי\" onclick=\"runb()\" /> </form>"
 document.getElementById("calendar").innerHTML=calendarBody;
 console.log("gershon"+courtbool1+courtbool2);
 if(courtbool1==true && courtbool2==true){
 document.getElementById("court1").style.backgroundColor='orange';
  }else if(courtbool2==false){ document.getElementById("court2").style.backgroundColor='orange';}
else{document.getElementById("court1").style.backgroundColor='orange';}console.log(flags);

}
function runa(){
location.href="algorithm.php";
}
function runb(){
//alert(del1);
window.location.href="Container.php?del1="+del1;
}

</script> 

<?php include("weekly_calendar2.php") ?>
<script>anotherWeek(); </script>
</head> 
 
<body class="bg" onload="displayCalendar()" > 

<div >

<table style="width: 100%">
	<tr>
		<td>&nbsp;</td>
		<td id="table" align="center">
		<table style="width: 100%">
			<tr>
				<td>
				<table style="width: 100%">
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td class ="calendar1"id="calendar" align="center">&nbsp;</td>
					</tr>
					<tr>
						<td style="text-align: center">
						<form method="post">
						</form>
						</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td id="data" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			
		</table>
		</td>
		<td>&nbsp;</td>
	</tr>
</table>
</div>

</body> 
</html>
