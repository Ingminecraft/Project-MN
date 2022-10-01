<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>

<?php
$DPI_ID = $_GET['DPI_ID'];
$sql = "SELECT * FROM doposititem WHERE DPI_ID = $DPI_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);


//print_r($_FILES);

$dir = "uploadsWithdraw/";
$DPI_picture = $dir . basename($_FILES["image"]["name"]);
//ย้ายไฟล์เป็นจริงลบภาพเก่า
if (move_uploaded_file($_FILES["image"]["tmp_name"], $DPI_picture)){
  if($row["DPI_picture"] != "Image/none.png")
  {unlink("./".$row["DPI_picture"]);}
}
if ($DPI_picture == "uploadsWithdraw/"){
$DPI_picture = $row["DPI_picture"];
}

 



$DPI_detail = $_POST['DPI_detail'];
$DPI_date = date('d/m/Y');
$DS_studentID = $_SESSION["UserID"];
$sql = "UPDATE doposititem SET 
DPI_detail = '$DPI_detail',
DPI_picture = '$DPI_picture',
DPI_date = '$DPI_date',
DS_studentID='$DS_studentID'
WHERE DPI_ID = $DPI_ID";


$result = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "Black" >
        แก้ไขรายการของฝากเสร็จสิ้น<br><br>
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
        <font size ="+20" color = "red" >
        แก้ไขรายการของฝากล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <img src="https://c.tenor.com/x8v1oNUOmg4AAAAM/rickroll-roll.gif">
        <meta http-equiv="refresh" content="3; url=./Withdraw.php">
        </a>กำลังนำคุณกลับไปหน้า รายการของฝาก
        </td>
    </tr>
    ';
}



//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  