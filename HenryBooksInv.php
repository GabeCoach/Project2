<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Henry Books Branches</title>
</head>
<body>
<h1>Henry Books Branch Inventories</h1>

<p>Select a Branch and click 'GO' to see the inventory at that branch.</p>
<form id="BranchForm" action="BranchResults.php" method="post">
<?php
$dbc=mysql_connect("localhost", "root", "qxwcs6RT");
mysql_select_db("henrybooks",$dbc);
$query = "SELECT * FROM branch ORDER BY Branch_Name";
$result = mysql_query($query, $dbc);
$resultcount=mysql_num_rows($result);
echo $resultcount;
echo '<select id="bookid" name="bid">';

if (mysql_num_rows($result)>0){

    while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
        echo '<option value="' .$row[Branch_Number] .'"> ' . $row[Branch_Name] .'</option>';

   }

}
echo'</select>';

?>
<input type="submit" value="Go" name="go" id="go">
</form>



</body>
</html>