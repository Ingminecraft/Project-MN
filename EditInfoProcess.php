<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>

<?php
$DI_ID = $_GET['DI_ID'];
$sql = "SELECT * FROM dorminformation WHERE DI_ID = $DI_ID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);


//print_r($_FILES);

$dir = "uploadsInfo/";
$DI_picture = $dir . basename($_FILES["image"]["name"]);
//ย้ายไฟล์เป็นจริงลบภาพเก่า
if (move_uploaded_file($_FILES["image"]["tmp_name"], $DI_picture)){
  if($row["DI_picture"] != "Image/none.png")
  {unlink("./".$row["DI_picture"]);}
}
if ($DI_picture == "uploadsInfo/"){
$DI_picture = $row["DI_picture"];
}

 



$DI_date = date('d/m/Y');
$DI_detail = $_POST["DI_detail"];
$sql = "UPDATE dorminformation SET 
DI_picture = '$DI_picture',
DI_detail = '$DI_detail',
DI_date = '$DI_date'
WHERE DI_ID = $DI_ID";


$result = mysqli_query($conn,$sql);
//echo $sql;
if($result){
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "Black" >
        แก้ไขรายละเอียดหอพักเสร็จสิ้น<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <meta http-equiv="refresh" content="3; url=./ShowInfo.php">
        </a>กำลังนำคุณกลับไปหน้า รายละเอียดหอพัก
        </td>
    </tr>
    ';
} else {
    echo'<br><br>
    <table align="center"><tr><td>
        <font size ="+20" color = "red" >
        แก้ไขรายละเอียดหอพักล้มเหลว<br><br>
        </font>
        </td></tr></tr><td align="center">
        <a href="./ShowAdmin.php">
        <img src="https://c.tenor.com/x8v1oNUOmg4AAAAM/rickroll-roll.gif"><br>
        <meta http-equiv="refresh" content="3; url=./ShowInfo.php">
        </a>กำลังนำคุณกลับไปหน้า รายละเอียดหอพัก
        </td>
    </tr>
    ';
}



//<button class="btnOk">ตกลง</button>
?>
<?php include("./Footer.php");?>  