<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include('./connection/connection.php');?>

<?php
//print_r($_FILES);
$DPI_picture = "Image/none.png";

$dir = "uploadsWithdraw/";
$DPI_picture = $dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $DPI_picture)){}
if ($DPI_picture == "uploadsWithdraw/"){
    $DPI_picture = "Image/none.png";
}
$sql = "SELECT MAX(DPI_ID) as DPI_ID FROM doposititem;";
$query = mysqli_query($conn,$sql);
$data = mysqli_fetch_assoc($query);

$DPI_detail = $_POST['CenterNews'];
$DPI_ID = $data['DPI_ID'] + 1;
$DPI_date = date('d/m/Y');
$DS_studentID = $_SESSION["UserID"];
$sql="INSERT INTO `doposititem` (`DPI_ID`, `DPI_detail`, `DPI_picture`, `DPI_date`, `DS_studentID`) 
VALUES ('$DPI_ID', '$DPI_detail', '$DPI_picture','$DPI_date', '$DS_studentID')";
$result = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "black" >
       เพิ่มรายการของฝากเสร็จสิ้น<br><br>
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
        เพิ่มรายการของฝากล้มเหลว<br><br>
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