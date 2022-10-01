<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$ID = $_GET['DPI_ID'];
$status = $_POST[$ID];
$Admin = $_SESSION['UserID'];
$sql="UPDATE `doposititem` SET 
`DPI_status`= $status,
`AD_employeeID`= $Admin
WHERE DPI_ID = $ID";
$result = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        รับของคืนเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php"></a>
กำลังคุณกลับไปหน้า ตรวจรายการของคืน
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "red" >
        รับของคืนล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php"></a>
กำลังคุณกลับไปหน้า ตรวจรายการของคืน
        </td>
    </tr>
    ';
}
//<button class="btnCancel">ตกลง</button>
?>
<?php include("./Footer.php");?>