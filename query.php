<?php
header("Content-Type: text/html;charset=utf-8"); 
error_reporting( E_ALL&~E_NOTICE );
include('connect.php');//链接数据库
	//向数据库插入表单传来的值的sql
    $sql="select * from userinfo ";//where 姓名='$name'";
    mysqli_query($link,'set names utf8');
    $result=mysqli_query($link,$sql);//执行sql
// 输出数据

echo "<table border='1'>";
echo "<td><h3>id</h3></td>";
echo "<td><h3>productname</h3></td>";
echo "<td><h3>firstdate</h3></td>";
echo "<td><h3>pattern</h3></td>";
echo "<td><h3>money</h3></td>";
echo "<td><h3>plan_periods</h3></td>";
echo "<td><h3>periods</h3></td>";
echo "<td><h3>accountvalue</h3></td>";
//echo "<td><h3>areacode</h3></td>";
echo "<td><h3>phonenumber</h3></td>";
//echo "<td><h3>captcha</h3></td>";
echo "<td><h3>recorddate</h3></td>";
echo "<td><h3>openid</h3></td>";
echo "<td><h3>flag</h3></td>";
while($row = mysqli_fetch_array($result)) {
//$row = mysqli_fetch_array($result);

echo "<tr>\n";
echo "<td>".$row[0];echo "</td>";
echo "<td>".$row[1];echo "</td>";
echo "<td>".$row[2];echo "</td>";
echo "<td>".$row[3];echo "</td>";
echo "<td>".$row[4];echo "</td>";
echo "<td>".$row[5];echo "</td>";
echo "<td>".$row[6];echo "</td>";
echo "<td>".$row[7];echo "</td>";
echo "<td>".$row[8]."".$row[9];echo "</td>";
//echo "<td>".$row[10];echo "</td>";
echo "<td>".$row[11];echo "</td>";
echo "<td>".$row[12];echo "</td>";
echo "<td>".$row[13];echo "</td>";
echo "</tr>\n";

//print_r($row);
    }
echo "</table>";
    mysqli_close($link);//关闭数据库
?>