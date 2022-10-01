<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$AD_fname = $_POST['AD_fname'];
$AD_lname = $_POST['AD_lname'];
$AD_employeeID = $_POST['AD_employeeID'];
$AD_phonenumber = $_POST['AD_phonenumber'];
$AD_username = $_POST['AD_username'];
$CON_AD_password = $_POST['AD_password'];
$sql = "UPDATE admin SET 
AD_fname = '$AD_fname',
AD_lname = '$AD_lname',
AD_phonenumber = '$AD_phonenumber',
AD_username='$AD_username',
AD_password = '$CON_AD_password'
WHERE AD_employeeID = $AD_employeeID";
?>

<?php
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
 //echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        แก้ไขผู้ดูแลระบบเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
    if($_SESSION["UserID"] == $AD_employeeID){
        session_reset();
        $_SESSION["UserID"] = $AD_employeeID;
        $_SESSION["User"] = $AD_fname." ".$AD_lname;
        $_SESSION["level"] = "A";
        }
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลงทะเบียนผู้ดูแลระบบไม่สำเร็จ<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
}
//<button class="btnCancel">ตกลง</button>
?>
<?php include("./Footer.php");?>  