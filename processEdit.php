<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$NAME_Admin = $_POST['NAME_Admin'];
$ID_Admin = $_POST['ID_Admin'];
$PHONE_Admin = $_POST['PHONE_Admin'];
$CON_PASS_Admin = $_POST['PASS_Admin'];
$sql = "UPDATE db_admin SET 
NAME_Admin = '$NAME_Admin',
PHONE_Admin = '$PHONE_Admin',
PASS_Admin = '$CON_PASS_Admin'
WHERE ID_Admin = $ID_Admin";
?>

<?php
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
// echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        แก้ไขผู้ดูแลระบบเส็รจสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <button class="btnOk">ตกลง</button>
        </a>
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลงทะเบียนผู้ดูแลระบบไม่สำเร็จ<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <button class="btnCancel">ตกลง</button>
        </a>
        </td>
    </tr>
    ';
}
?>
<?php include("./Footer.php");?>  