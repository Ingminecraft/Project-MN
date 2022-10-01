<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$DS_fname = $_POST['AD_fname'];
$DS_lname = $_POST['AD_lname'];
$DS_studentID = $_POST['AD_employeeID'];
$DS_phonenumber = $_POST['AD_phonenumber'];
$CON_DS_password = $_POST['AD_password'];


if (isset($_POST["Banned"])) {
   $DS_right = $_POST["Banned"];    
} else {$DS_right = 0;}  
$sql = "UPDATE dormstudent SET 
DS_fname = '$DS_fname',
DS_lname = '$DS_lname',
DS_right = '$DS_right',
DS_phonenumber = '$DS_phonenumber',
DS_password = '$CON_DS_password'
WHERE DS_studentID = $DS_studentID";
?>

<?php
$result=mysqli_query($conn,$sql);
mysqli_close($conn);
 //echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        แก้ไขข้อมูลนิสิตหอพักเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Showstd.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
    if($_SESSION["UserID"] == $DS_studentID){
    session_reset();
    $_SESSION["UserID"] = $DS_studentID;
    $_SESSION["User"] = $DS_fname." ".$DS_lname;
    $_SESSION["level"] = "M";
    }
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "red" >
        แก้ไขข้อมูลนิสิตหอพักล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Showstd.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
}
//<button class="btnCancel">ตกลง</button>
?>
<?php include("./Footer.php");?>  