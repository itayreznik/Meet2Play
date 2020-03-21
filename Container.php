<!DOCTYPE html>
<html>
<body>

<h2 align="center";>גרף משחקים שבועי</h2>
<p align="center";>בגרף זה ניתן לראות את כמות המשחקים בכל יום במהלך השבוע</p>

<iframe src="bar_plot.php" align="center"; style="border:2px solid blue;height:400px;width:1020px;position:relative; left:180px" ></iframe>
<br><br>
<div align="center";><button onclick="razi()">חזרה לדף הקצאות שבועי</button></div>
<script> function razi(){
location.href = "weekly_calendar.php";
}
</script>

</body>
</html>
