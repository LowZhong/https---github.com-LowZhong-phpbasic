<!DOCTYPE html>
<html>

<body>
    
<!DOCTYPE html>
<html>
<body>
<?php
$day_names = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
echo "<select>";

foreach($day_names as $day)
{
echo "<option>".$day."</option>";
}
echo "</select>";
?>

<?php
$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
echo "<select>";

foreach($month_names as $month)
{
echo "<option>".$month."</option>";
}
echo "</select>";
?>

<?php
$year_names = array(1990,1991,1992,1993,1994,1995,1996,1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021,2022);
echo "<select>";

foreach($year_names as $year)
{
echo "<option>".$year."</option>";
}
echo "</select>";
?>

</body>
</html>

</body>

</html>
