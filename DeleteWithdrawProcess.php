<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php
$DPI_ID = $_GET['DPI_ID'];

$sql = "SELECT * FROM doposititem WHERE DPI_ID = $DPI_ID";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($row["DPI_picture"] != "Image/none.png")
{unlink("./".$row["DPI_picture"]);}

$sql="DELETE FROM doposititem WHERE DPI_ID = $DPI_ID";
$result = mysqli_query($conn,$sql);
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
       ลบรายการของฝากเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php">
        </a>กำลังนำคุณกลับไปหน้า รายการของฝาก
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลบรายการของฝากล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php">
        </a>กำลังนำคุณกลับไปหน้า รายการของฝาก
        </td>
    </tr>
    ';
}
//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  