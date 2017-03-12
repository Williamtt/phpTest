<?php
//以下為連接資料庫伺服器
$dbhost = '128.199.177.228';
$dbuser = 'test';
$dbpass = 'testtest';
$dbname = $_POST["dbName"];
$Ssn = $_POST["Ssn"];
$con = mysql_connect($dbhost,$dbuser,$dbpass);
if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

//以下針對資料庫的$dbname 資料庫用傳來的 Ssn 做查詢
mysql_select_db($dbname, $con);
$result = mysql_query("SELECT * FROM Employee WHERE Ssn = ". $Ssn);

//以下建立動態表單，將查詢結果顯示在表單中
echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>";
while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);

// 以下跟上面資料庫無關，只示範如何利用回圈建立表格之範例
echo "<form>";
echo "<table border='1'>";
for ($i=1;$i<=4;$i++)
{
echo "<tr>";
        for ($j=1;$j<=9;$j++)
        {
                echo "<td>";
                //echo '<input type="text" name="textfield">';
                                        // name就自己想看要用變數代入之類的
                echo $i+$j;
                echo "</td>";
        }

echo "</tr>";
}
echo "</table>";
echo "</form>";

?>