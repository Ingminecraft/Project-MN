<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include('./connection/connection.php');?>
<?php 
$ID_Admin = $_GET['ID_Admin'];
$sql = "SELECT * FROM db_admin WHERE ID_Admin=$ID_Admin";
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
        <td align="Left" bgcolor=""><?php echo $row["FN_Admin"]." ".$row["LN_Admin"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ชื่อผู้ใช้งาน :</td>
        <td align="Left" bgcolor=""><?php echo $row["USERNAME_Admin"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ID :</td>
        <td align="Left" bgcolor=""><?php echo $row["ID_Admin"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">เบอร์โทรศัพท์ :</td>
        <td align="Left" bgcolor=""><?php echo $row["PHONE_Admin"];?></td>
    </tr>
        <td colspan="2" align="Center"><br><br>
        <a href="./processDelete.php?ID_Admin=<?php echo $ID_Admin;?>">
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