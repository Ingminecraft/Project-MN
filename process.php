<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$FN_Admin = $_POST['FN_Admin'];
$LN_Admin = $_POST['LN_Admin'];
$ID_Admin = $_POST['ID_Admin'];
$PHONE_Admin = $_POST['PHONE_Admin'];
$USERNAME_Admin = $_POST['USERNAME_Admin'];
$CON_PASS_Admin = $_POST['PASS_Admin'];
$sql="INSERT INTO `db_admin` (`ID_Admin`, `FN_Admin`, `LN_Admin`, `PHONE_Admin`, `USERNAME_Admin`, `PASS_Admin`) 
VALUES ('$ID_Admin', '$FN_Admin', '$LN_Admin','$PHONE_Admin','$USERNAME_Admin', '$CON_PASS_Admin')";
?>

<?php
$result = mysqli_query($conn,$sql);


if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลงทะเบียนผู้ดูแลระบบเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php">
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
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php">
        </a>
        </td>
    </tr>
    ';
}
//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  