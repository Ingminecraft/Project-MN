<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include("./Menu.php");?>
<?php
$NameStd = $_POST['NameStd'];
$sql = "SELECT * FROM dormstudent";
$query = mysqli_query($conn,$sql);

//echo $sql
?>
<br><br>
<table id=BoxGray align="center" 
style="width:90%;padding:0px 80px;border-radius:50px;border-color:black;border:solid;">
    <tr>
        <td width=250px>
            <h2>จัดการรายการของที่ฝาก</h2>
        </td>
        <td>
        <?php if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){
                echo '<div align=right><form action="./WithdrawFiler.php?NameStd=" method="post">
                <select id="NameStd" name="NameStd">';
                foreach($query as $data){
                echo '<option value="'.$data['DS_fname'].'">'.$data['DS_fname'].'</option>';}
                echo'</select>
                <input type="submit" value="เรียกดู" style="width:100px;padding:4px">
                </div></form>';}}?>
        </td>
        <td><a href="./Withdraw.php"><button class=btnCancel style="width:75px;padding:5px" >Clear</button></a></td>
    </tr>
    <tr>
</table>
<?php
$sql = "SELECT * FROM doposititem INNER JOIN dormstudent 
ON doposititem.DS_studentID=dormstudent.DS_studentID
WHERE DS_fname='$NameStd'
ORDER BY `doposititem`.`DPI_ID` DESC";
$query = mysqli_query($conn,$sql);
?>
<?php if(isset($_SESSION['level'])){if($_SESSION['level']=="M"){?>
<table align="center" style="width:80%;padding:5px 80px;border:solid;color:gray;">
<tr>
    <td>
        <a href="./AddWithdraw.php" class=TextButton style="color:gray">
            <font size=6>+ เพิ่มรายการของฝาก</font>
        </a>
    </td>
</tr>
</table>
<?php }}?>
<?php foreach($query as $data){ ?>
<table align="center" style="width:80%;padding:10px 10px 10px 80px;border:solid;border-color:gray;table-layout:fixed;">
    <tr>
    <td bgcolor="" width=70%>
    <a href="./ShowWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>
    "class=TextButton><font size=5><?php echo $data['DPI_detail']?></font></a>
    <?php
    if(isset($_SESSION['level'])){if($_SESSION['level']=="A"){
        echo "[".$data['DS_fname']." ".$data['DS_lname']." : ".$data['DS_studentID']."]";
    }};
    ?>
    </td>
    <td align ="Right">
    <?php if($data["DPI_status"]==0){echo "<font color=red>█</font> สถานะอยู่ในคลัง";} ?>
    <?php if($data["DPI_status"]==1){echo "<font color=orange>█</font> สถานะรอรับคืน";} ?>
    <?php if($data["DPI_status"]==2){echo "<font color=green>█</font> สถานะรับคืนแล้ว";} ?>
    <a href="./EditWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>">
    <button class=btnWhite><i class="fa fa-edit fa-2x"></i></button></a>

    <a href="./DeleteWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>">
    <button class=btnWhiteD><i class="fa fa-trash fa-2x"></i></button></a>
    
    </td>
    </tr>
</table>
<?php }?>
<?php include("./Footer.php");?>  