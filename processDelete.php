<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php
$ID_Admin = $_GET["ID_Admin"];
$sql="DELETE FROM db_admin WHERE ID_Admin = $ID_Admin";
$result = mysqli_query($conn,$sql);
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
        ลบผู้ดูแลระบบเสร็จสิ้น<br><br>
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
        ลบดูแลระบบระบบไม่สำเร็จ<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <button class="btnOk">ตกลง</button>
        </a>
        </td>
    </tr>
    ';
}
?>
<?php include("./Footer.php");?>  