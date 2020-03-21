<?php // content="text/plain; charset=utf-8"
 include("connect_db.php");
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

session_start();
$first=$_SESSION['first2'];
$last=$_SESSION['last2'];




$arri=[];
$query1 = "SELECT dayofweek(game_date) as day,count(*) as c FROM games where game_date between \"$first\" and \"$last\" group by day order by day asc ";
$result1 = $conn->query($query1);

$bool=[false,false,false,false,false,false,false,false];

if ($result1 ->num_rows > 0) {
	while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {  
	   $bool[$row['day']]=true;
	  $arri[$row['day']]=$row['c'];
	
}
for ($i = 1; $i <= 7; $i++) {
if($bool[$i]==false){
$arri[$i]=0;
}
  }
//echo $arri[7]." ".$arri[6]." ".$arri[5]." ".$arri[4]." ".$arri[3]." ".$arri[2]." ".$arri[1];
$data1y=array($arri[7],$arri[6],$arri[5],$arri[4],$arri[3],$arri[2],$arri[1]);
//$data1y=array(1,2,3,4,2,5,2);
$arr1= implode(",",$arri);
}
else{
$data1y=array(0,0,0,0,0,0,0);
};

//echo $arri[7]." ".$arri[6]." ".$arri[5]." ".$arri[4]." ".$arri[3]." ".$arri[2]." ".$arri[1];
//$s=(string)$arri[0];

//$data1y=array(1,2,3,4,2,5,2);




// Create the graph. These two calls are always required
$graph = new Graph(1000,400,'auto');
$graph->SetScale("textlin");
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,1,2,3,4,5));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels(array("תבש","ישיש","ישימח","יעיבר","ישליש","ינש","ןושאר"));
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
//$b2plot = new BarPlot($data2y);
//$b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));//,$b2plot,$b3plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("blue");

//$b2plot->SetColor("white");
//$b2plot->SetFillColor("#11cccc");



//$b3plot->SetColor("white");
//$b3plot->SetFillColor("#1111cc");
$graph->title->Set("");


// Display the graph
$graph->Stroke();

?>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
