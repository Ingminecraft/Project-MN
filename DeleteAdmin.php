<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$AD_employeeID = $_GET['AD_employeeID'];
$sql = "SELECT * FROM admin WHERE AD_employeeID=$AD_employeeID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br><br>
<table id=BoxGray align="center">
    <tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "red" >
        ลบผู้ดูแลระบบ<br><br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ชื่อ-นามสกุล :</td>
        <td align="Left" bgcolor=""><?php echo $row["AD_fname"]." ".$row["AD_lname"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ชื่อผู้ใช้งาน :</td>
        <td align="Left" bgcolor=""><?php echo $row["AD_username"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ID :</td>
        <td align="Left" bgcolor=""><?php echo $row["AD_employeeID"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">เบอร์โทรศัพท์ :</td>
        <td align="Left" bgcolor=""><?php echo $row["AD_phonenumber"];?></td>
    </tr>
        <td colspan="2" align="Center"><br><br>
        <a href="./processDelete.php?AD_employeeID=<?php echo $AD_employeeID;?>">
        <button class="btnOk">ยืนยัน</button>
        </a>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><a href="./ShowAdmin.php">
        <button class=btnCancel onclick="history.back()">ยกเลิก</button></a>
        </td>
    </tr>
</table>

<?php include("./Footer.php");?>    