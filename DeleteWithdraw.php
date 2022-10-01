<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$DPI_ID = $_GET['DPI_ID'];
$sql = "SELECT * FROM doposititem INNER JOIN dormstudent 
ON doposititem.DS_studentID=dormstudent.DS_studentID WHERE DPI_ID = $DPI_ID ";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br><br>
<table id=BoxGray align="center"  style=width:80%; >
    <tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "red" >
        ลบรายการของฝาก<br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="" >รายการของฝาก :</td>
        <td align="Left" bgcolor=""><?php echo $row["DPI_detail"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ID เจ้าของ :</td>
        <td align="Left" bgcolor=""><?php echo $row["DS_studentID"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ชื่อเจ้าของ :</td>
        <td align="Left" bgcolor=""><?php echo $row["DS_fname"]." ".$row["DS_lname"];?></td>
    </tr>
    <tr>
        <td align="right" bgcolor="">ฝากวันที่ :</td>
        <td align="Left" bgcolor=""><?php echo $row["DPI_date"];?></td>
    </tr>
    <tr>
        <td align="center" bgcolor="" colspan="2">
        <?php 
        if($row["DPI_picture"] == "Image/none.png"){
            echo "<img src='./". $row["DPI_picture"] ."'width=0%>";
        }else{
            echo "<img src='./". $row["DPI_picture"] ."'width=60%>";
        }?>
        </td>
    </tr>
        <td colspan="2" align="Center"><br><br>
        <a href="./DeleteWithdrawProcess.php?DPI_ID=<?php echo $DPI_ID;?>">
        <button class="btnOk">ยืนยัน</button>
        </a>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><a href="./Withdraw.php">
        <button class=btnCancel>ยกเลิก</button></a>
        </td>
    </tr>
</table>

<?php include("./Footer.php");?>   