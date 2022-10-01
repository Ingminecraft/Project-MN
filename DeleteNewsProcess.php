<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php
$DN_ID = $_GET['DN_ID'];

$sql = "SELECT * FROM dormnews WHERE DN_ID = $DN_ID";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($row["DN_picture"] != "Image/none.png")
{unlink("./".$row["DN_picture"]);}

$sql="DELETE FROM dormnews WHERE DN_ID = $DN_ID";
$result = mysqli_query($conn,$sql);
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลบข่าวสารเสร็จสิ้น<br><br>
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
        <font size ="+20" color = "black" >
        ลบข่าวสารไม่สำเร็จ<br><br>
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