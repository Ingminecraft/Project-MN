<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$ID = $_SESSION['UserID'];
$sql = "SELECT * FROM dormstudent WHERE DS_studentID=$ID";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);


$WID = $row["WIR_ID"];
$Time = '"'.$_POST['Time'].'"';
$Date = date("d/m/Y", strtotime($_POST['date']));
$Date = '"'.$Date.'"';

$sql="UPDATE `withdrawitemrequestdocument` SET 
`WIR_date`=$Date,
`WIR_time`=$Time
WHERE WIR_ID = $WID";


$result = mysqli_query($conn,$sql);

$sql="UPDATE `doposititem` SET 
`DPI_status`= 1
WHERE DS_studentID = $ID AND `DPI_status`= 0";
$query = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        แจ้งความประสงค์รับของคืนเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php"></a>
กำลังคุณกลับไปหน้า จัดการรายการของที่ฝาก
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "red" >
        แจ้งความประสงค์รับของคืนล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php"></a>
กำลังคุณกลับไปหน้า จัดการรายการของที่ฝาก
        </td>
    </tr>
    ';
}
//<button class="btnCancel">ตกลง</button>
?>
<?php include("./Footer.php");?>