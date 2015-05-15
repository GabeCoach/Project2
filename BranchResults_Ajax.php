<?php include("header.php");?>
<div style="width:100%;">

    <h1 class="header">Henry Books - Branch Inventory</h1>
    <?php
    $apostrophe = $searchfield == "''";
    $bid = $_GET["branchid"];



    $sql = "SELECT * FROM BRANCH WHERE Branch_Number =" . $bid;

    $link = mysql_connect("localhost","root","qxwcs6RT");
    mysql_select_db("henrybooks",$link);
    $result = mysql_query($sql, $link);
    $resultcount = mysql_num_rows($result);
    while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
        echo "<p>Branch # " . $row[Branch_Number] . "</p>";
        echo "<p>Branch Name " . $row[Branch_Name] . "</p>";
        echo "<p>Location " . $row[Branch_Location] . "</p>";
    }
    $sql2 = "SELECT invent.book_code As BookCd, book_title as Title, Units_on_hand As Qty
              FROM invent, book
              WHERE book.book_code = invent.book_code and branch_number = " . $bid;
    $result2 = mysql_query($sql2,$link);
    $resultcount2 = mysql_num_rows($result2);


    ?>
    <table border="1">
        <caption><?php echo $resultcount2 ?> records retrieved.</caption>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Quantity</th>

        </tr>
        <?php
        while ($row2 = mysql_fetch_array($result2,MYSQL_ASSOC)){
            echo "<tr>
      <td>{$row2['BookCd']}</td>
      <td>{$row2['Title']}</td>
      <td>{$row2['Qty']}</td>


      </tr>";
        }
        ?>
    </table>