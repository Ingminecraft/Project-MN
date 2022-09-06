<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$FirstName = $_POST['FristName'];
$LastName = $_POST['LastName'];
$NAME_Admin = $FirstName." ".$LastName;
$ID_Admin = $_POST['ID_Admin'];
$PHONE_Admin = $_POST['PHONE_Admin'];
$CON_PASS_Admin = $_POST['PASS_Admin'];
$sql="INSERT INTO `db_admin` (`ID_Admin`, `NAME_Admin`, `PHONE_Admin`, `PASS_Admin`) VALUES ('$ID_Admin', '$NAME_Admin', '$PHONE_Admin', '$CON_PASS_Admin')";
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