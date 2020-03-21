<?php 

	if (isset($_SESSION['date'])) {
	$date=$_SESSION['date'];}
else $_SESSION['date']="";

if (isset($_SESSION['y'])) {
	$_SESSION['y']=$_SESSION['y'];
	$_SESSION['m']=$_SESSION['m'];
	$_SESSION['d']=$_SESSION['d'];
	}
	
$date=date("Y-m-d");
$date = explode('-', $date);
$year=$date[0];
$month=$date[1];
$day=$date[2];

if (isset($_REQUEST['y'])) {
	$_SESSION['y']=$_REQUEST['y'];
	$_SESSION['m']=$_REQUEST['m'];
	$_SESSION['d']=$_REQUEST['d'];
	}
else
{
	$_SESSION['y']=$year;
	$_SESSION['m']=$month;
	$_SESSION['d']=$day;
	}

$id=$_SESSION['id'];

?>
<html dir="rtl">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<head> 
<title>calendar</title>
<script>
function loadinfo(element, id, url) 
{
	var	date=new Date(id);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById(element).innerHTML = this.responseText;
		document.getElementById(element).value = date.getFullYear()+"/"+(date.getMonth()+1)+"/"+date.getDate();
		}
	};	
	xhttp.open("GET", url+"?year="+date.getFullYear()+"&month="+(date.getMonth()+1)+"&day="+date.getDate(), true);
	xhttp.send();
}

var dateNow = new Date();
var month = dateNow.getMonth();
var year = dateNow.getFullYear();
var old_click_num =1;
function disableclick(id) {
	 document.getElementById(old_click_num).style.color="black";
	 document.getElementById(id).style.color="#0099FF";
	 old_click_num=id;
	 }

function displayCalendar(){
 
 
 var htmlContent ="";
 var FebNumberOfDays ="";
 var counter = 1;
 

 var nextMonth = month+1; //+1; //Used to match up the current month with the correct start date.
 var prevMonth = month -1;
 var day = dateNow.getDate();
 
 
 
 //Determining if February (28,or 29)  
 if (month == 1){
    if ( (year%100!=0) && (year%4==0) || (year%400==0)){
      FebNumberOfDays = 29;
    }else{
      FebNumberOfDays = 28;
    }
 }
 
 
 // names of months and week days.
 var monthNames = ["ינואר","פברואר","מרץ","אפריל","מאי","יוני","יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר", "דצמבר"];
 var dayNames = ["ראשון","שני","שלישי","רביעי","חמישי","שישי", "שבת"];
 var dayPerMonth = ["31", ""+FebNumberOfDays+"","31","30","31","30","31","31","30","31","30","31"]
 
 
 // days in previous month and next one , and day of week.
 var nextDate = new Date(nextMonth +' 1 ,'+year);
 var weekdays= nextDate.getDay();
 var weekdays2 = weekdays;
 var numOfDays = dayPerMonth[month];
 console.log("nextDate : "+nextDate+" num of day "+ numOfDays+ "weekdays "+ weekdays);
 
 // this leave a white space for days of pervious month.
 while (weekdays>0){
    htmlContent += "<td class='daily'></td>";
 
 // used in next loop.
     weekdays--;
 }
 
 // loop to build the calander body.
 while (counter <= numOfDays){
 
     // When to start new line.
    if (weekdays2 > 6){
        weekdays2 = 0;
        htmlContent += "</tr><tr>";
    }
 
 
    // if counter is current day.
    // highlight current day using the CSS defined in header.
    if (year==dateNow.getFullYear() && month==dateNow.getMonth()&&counter==day){
    	htmlContent +="<td style='border-radius:10px' id="+counter+" class='dayNow' width='120' height='60' onclick='disableclick("+counter+"); get_day("+counter+")' onMouseOver='this.style.background=\"#FF0000\"; style='border: 0px transparent; padding: 0px; margin: 0px; text-align: left;' valign='TOP' width='14%'>"
						+"<span style='font-weight: bold;'><font face='Arial' size='4'>"+counter+"</font></span><br /></td>";
    }else{
        htmlContent +="<td style='border-radius:10px' id="+counter+" class='monthNow' onMouseOver='this.style.background=\"#dbd9d9\"; ' onMouseOut='this.style.background=\"#f2efef\";' width='120' height='60' style='border: 0px transparent; padding: 0px; margin: 0px; text-align: right;' valign='TOP' width='14%'"+
        " onclick='get_day("+counter+"); disableclick("+counter+");'><span style='font-weight: bold;'><font face='Arial' size='4'>"+counter+"</font></span><br /></td>";    
 
    }
    
    weekdays2++;
    counter++;
 }
 
 
 
 // building the calendar html body.
 var calendarBody ="<table><tr><td></td>"
 +"<td><input name=\"Button2\" class='buttonn' type=\"button\" value=\"<<החודש הקודם \" onclick=\"build_pri()\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"Button1\" type=\"button\" class=\"buttonn\" value=\"החודש הבא>>\" onclick=\"build_next()\"></td></table>";
  calendarBody +="<br><table class='calendar'> <tr class='monthNow'><th colspan='7'><font face='Arial,sans' size='6'>"
 +monthNames[month]+" "+ year +"</th></tr>";
 calendarBody +="<tr class='dayNames'><td background: rgb(50, 0, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"ראשון</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"&nbsp;&nbsp;שני&nbsp;&nbsp</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שלישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"רביעי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"חמישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שישי</span></font></center></td>"+"<td background: rgb(191, 191, 191);'><center><font color=white face='Arial,sans' size='6'>"
						+"<span style='text-shadow: rgba(0, 0, 0, 0.3) 0px 2px 3px; -webkit-font-smoothing: antialiased; font-family: Montserrat, Arial;'>"
						+"שבת</span></font></center></td></tr>"
 calendarBody += "<tr>";
 calendarBody += htmlContent;
 calendarBody += "</tr></table>";
 // set the content of div .
 document.getElementById("calendar").innerHTML=calendarBody;
 
}

//function show_daily_availability(day,month,year)
	//{
	//var date = "<?php echo $_SESSION['y']."-".$_SESSION['m']."-".$_SESSION['d'] ?>"
	//window.location.href = "load_daily_availability.php?date="+date;
     //    }
	


function build_next()
	{
	 if(month==11){
		month=0;
		year+=1;
		}
	else{
		month+=1;
		}

	 displayCalendar()	 
}
function build_pri(){
if(month==0){
month=11;
year-=1
}
else{
month-=1;
}
displayCalendar()

}
//function get_day(day)
//	{
//	var	date_selected=new Date(year, month, day);
//		//window.location.href = "load_daily_availability.php?year="+date_selected.getFullYear()+"&month="+(date_selected.getMonth()+1)+"&day="+date_selected.getDate();
//		window.location.href = "Filters Page.php?year="+date_selected.getFullYear()+"&month="+(date_selected.getMonth()+1)+"&day="+date_selected.getDate();
//			}
			
			function get_day(day){
	for(var i=0; i<8;i++){
						flags3[i]=true;
						}
						hours_clicked=[];

	var	date_selected=new Date(year, month, day);
	loadinfo('data', date_selected, 'info.php');
				
	}
 
	
</script> 

</head> 
 
<body onload="displayCalendar()"> 

<!--h1 align="center"> <?php echo "הנך מחובר כרגע כ: ".$_SESSION['login']?></h1-->


<table style="width: 100%">
		<td>&nbsp;</td>
		<td id="table" align="center">
		<table style="width: 100%">
			<tr>
				<td>
				
				<table style="width: 100%">
					<tr>
						<td id="calendar" align="center">&nbsp;</td>
					</tr>
				</table>
				
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
		</table>
		
		</td>
		<td>&nbsp;</td>
</table>
</body> 
<style> 
.buttonn{
background-color:white;
font-size:large;
padding:0.3em 1.2em;
margin:0 0.1em 0.1em 0;
border:0.16em solid rgba(255,255,255,0);
border-radius:2em;
box-sizing: border-box;
text-decoration:none;
font-family:'Roboto',sans-serif;
font-weight:300;
color:black;
text-shadow: 0 0.04em 0.04em rgba(0,0,0,0.35);
text-align:center;
transition: all 0.2s;
border-color:black;
}
.buttonn:hover{
text-shadow: 0 0 2em rgba(255,255,255,1);
color:black;
border-color:gray;
background-color:#0099FF

}
@media all and (max-width:30em){
.buttonn{

margin:0.2em auto;
 }
}
.monthNow{
 color: black;
 background:#f2efef;
 opacity:0.9;

}
.dayNow{
 border: 2px solid #0099FF;
 color: black;
 background:#f2efef;
 opacity:0.9;
}
.calendar td{
 htmlContent: 4px;
 width: 14.28%;
}
.monthNow th{
 background-color: #000000;
 color: #FFFFFF;
}
.dayNames{
 background:#0099FF;
 color: white;
 opacity:0.85;
 text-align: center;
}
.tdmh
{
	border-collapse: separate;
	border: solid thin black;
}
.tdms
{
	border-collapse: separate;
	border: solid thin gray;
}
.tdms:hover 
{
	background-color:navy;
	color: white;
	border-radius: 10px;
	cursor:pointer;
	border: solid thin blue;
}
.daily{
	border-radius:10px;
	background-color:#C0C0C0;
	opacity:0.85;
}
</style> 
</html>