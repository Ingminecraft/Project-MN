<?php include("./Header.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include("./Menu.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DPI_ID = $_GET['DPI_ID'];
$sql = "SELECT * FROM doposititem WHERE DPI_ID = $DPI_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br>
<table>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 200px; ">
    <font size=5>วันที่</font> <font size=5 color=gray><?php echo " ".$row["DPI_date"];?></font>
    </td>
</tr>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 200px; ">
        <font size=5><?php echo $row["DPI_detail"];?></font>
    </td>
</tr>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 0px; " align=center>
    <?php 
        if($row["DPI_picture"] == "Image/none.png"){
            echo "<img src='./". $row["DPI_picture"] ."'width=0%>";
        }else{
            echo "<img src='./". $row["DPI_picture"] ."'width=50%>";
    }?>
    </td>
</tr>
<tr>
<td align=right><button class=btnCancel onclick="history.back()">กลับ</button></td>
</tr>
</table>

<?php include("./Footer.php");?>    