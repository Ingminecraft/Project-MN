<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$AD_employeeID = $_GET["AD_employeeID"];
$sql="DELETE FROM admin WHERE AD_employeeID = $AD_employeeID";
$result = mysqli_query($conn,$sql);
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลบผู้ดูแลระบบเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลบดูแลระบบระบบไม่สำเร็จ<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowAdmin.php"></a>
กำลังคุณกลับไปหน้าแสดงรายชื่อผู้ดูแลระบบ
        </td>
    </tr>
    ';
}
//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  