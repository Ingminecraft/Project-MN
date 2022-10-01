<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');
$sql = "SELECT * FROM admin WHERE AD_employeeID !=".$_SESSION["UserID"];
$query = mysqli_query($conn,$sql);
?>
    <br>
    <font size ="+20" color = "black">
       จัดการผู้ดูแลระบบ
    </font>
    <br><br>
    <a href="./AddAdmin.php">
    <button class=btnAddAdmin><font size="5">เพิ่มผู้ดูแลระบบ</font></button>
    </a>
    <br><br><br>
    <!-- แสดงรายชื่อ -->
<?php foreach($query as $data){ ?>
    <table id=BoxBlackGray>
        <tr>
            <td>
    <font size ="" color = "white">
<?php echo $data['AD_employeeID'] ." : ".$data['AD_fname']." ".$data['AD_lname']?>
</td><td align="right">
        <a href="./EditAdmin.php?AD_employeeID=<?php echo $data['AD_employeeID'];?>">
        <button class="btnEdit"><i class="fa fa-edit"></i></button></a><a href="./DeleteAdmin.php?AD_employeeID=<?php echo $data['AD_employeeID'];?>"><button class="btnDelete"><i class="fa fa-trash"></i></button></a>
    </font>
</tr>
    </table>
    <br>
<?php }?>

<?php include("./Footer.php");?>    