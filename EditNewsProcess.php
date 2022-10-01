<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>

<?php
$DN_ID = $_GET['DN_ID'];
$sql = "SELECT * FROM dormnews WHERE DN_ID = $DN_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);


//print_r($_FILES);

$dir = "uploadsNews/";
$DN_picture = $dir . basename($_FILES["image"]["name"]);
//ย้ายไฟล์เป็นจริงลบภาพเก่า
if (move_uploaded_file($_FILES["image"]["tmp_name"], $DN_picture)){
  if($row["DN_picture"] != "Image/none.png")
  {unlink("./".$row["DN_picture"]);}
}
if ($DN_picture == "uploadsNews/"){
$DN_picture = $row["DN_picture"];
}

 


$DN_title = $_POST['TopNews'];
$DN_detail = $_POST['CenterNews'];
$DN_date = date('d/m/Y');
$AD_employeeID = $_SESSION["UserID"];
$sql = "UPDATE dormnews SET 
DN_title = '$DN_title',
DN_picture = '$DN_picture',
DN_detail = '$DN_detail',
DN_date = '$DN_date',
AD_employeeID='$AD_employeeID'
WHERE DN_ID = $DN_ID";


$result = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "Black" >
        แก้ไขข้อมูลข่าวสารเสร็จสิ้น<br><br>
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
        แก้ไขมูลข่าวสารล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <img src="https://c.tenor.com/x8v1oNUOmg4AAAAM/rickroll-roll.gif">
        <meta http-equiv="refresh" content="3; url=./Home.php">
        </a>กำลังนำคุณกลับไปหน้า Home
        </td>
    </tr>
    ';
}



//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  