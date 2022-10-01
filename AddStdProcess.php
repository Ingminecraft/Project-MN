<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php

$sql="SELECT MAX(WIR_ID) as WIR_ID FROM withdrawitemrequestdocument;";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);
$WIR_ID = $data['WIR_ID'] + 1;
$sql="INSERT INTO `withdrawitemrequestdocument` (`WIR_ID`) 
VALUES ($WIR_ID)";
$result = mysqli_query($conn,$sql);

$DS_fname = $_POST['DS_fname'];
$DS_lname = $_POST['DS_lname'];
$DS_studentID = $_POST['DS_studentID'];
$DS_phonenumber = $_POST['DS_phonenumber'];
$CON_DS_password = $_POST['DS_password'];
$sql="INSERT INTO `dormstudent` (`DS_studentID`, `DS_fname`, `DS_lname`, `DS_phonenumber`, `DS_password`, `WIR_ID`,`DS_status`) 
VALUES ('$DS_studentID', '$DS_fname', '$DS_lname','$DS_phonenumber', '$CON_DS_password','$WIR_ID','1')";
?>

<?php
$result = mysqli_query($conn,$sql);
//echo $sql;


if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "Black" >
        ลงทะเบียนเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Home.php">
        </a>กำลังนำคุณกลับไปหน้า Home
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "red" >
        ลงทะเบียนล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Home.php">
        </a>กำลังนำคุณกลับไปหน้า Home
        </td>
    </tr>
    ';
}
//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  