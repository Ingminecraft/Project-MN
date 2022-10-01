<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DN_ID = $_GET['DN_ID'];
$sql = "SELECT * FROM dormnews WHERE DN_ID = $DN_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br>
<table id=BoxGray align="center" 
style="width:90%;padding:0px 80px;border-radius:50px;border-color:black;border:solid;">
    <tr>
        <td>
            <h2>ข่าวสารหอพัก</h2>
        </td>
    </tr>
    <tr>
</table>
<br><br>
<table>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 200px; ">
        <font size=5>วันที่ <font color=gray><?php echo $row["DN_date"];?></font></font>
    </td>
</tr>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 200px; ">
        <font size=5><?php echo $row["DN_title"];?></font>
    </td>
</tr>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 200px; ">
        <font size=5><?php echo $row["DN_detail"];?></font>
    </td>
</tr>
<tr>
    <td width=1280px style=" padding: 0px 0px 40px 0px; " align=center>
    <?php 
        if($row["DN_picture"] == "Image/none.png"){
            echo "<img src='./". $row["DN_picture"] ."'width=0%>";
        }else{
            echo "<img src='./". $row["DN_picture"] ."'width=50%>";
    }?>
    </td>
</tr>
<tr>
<td align=right><button class=btnCancel onclick="history.back()">กลับ</button></td>
</tr>
<table>

<?php include("./Footer.php");?>    