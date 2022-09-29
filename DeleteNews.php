<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DN_ID = $_GET['DN_ID'];
$sql = "SELECT * FROM dormnews WHERE DN_ID = $DN_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br><br>
<table id=BoxGray align="center"  style=width:80%; >
    <tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "red" >
        ลบข่าวสาร<br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="" >หัวข้อข่าว :</td>
        <td align="Left" bgcolor=""><?php echo $row["DN_title"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">วันที่ :</td>
        <td align="Left" bgcolor=""><?php echo $row["DN_date"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ID :</td>
        <td align="Left" bgcolor=""><?php echo $row["DN_ID"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ID เจ้าของ :</td>
        <td align="Left" bgcolor=""><?php echo $row["AD_employeeID"];?></td>
    </tr>
    <tr>
        <td align="center" bgcolor="" colspan="2">
        <?php 
        if($row["DN_picture"] == "Image/none.png"){
            echo "<img src='./". $row["DN_picture"] ."'width=0%>";
        }else{
            echo "<img src='./". $row["DN_picture"] ."'width=60%>";
        }?>
        </td>
    </tr>
        <td colspan="2" align="Center"><br><br>
        <a href="./DeleteNewsProcess.php?DN_ID=<?php echo $DN_ID;?>">
        <button class="btnOk">ยืนยัน</button>
        </a>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><a href="./Home.php">
        <button class=btnCancel>ยกเลิก</button></a>
        </td>
    </tr>
</table>

<?php include("./Footer.php");?>   