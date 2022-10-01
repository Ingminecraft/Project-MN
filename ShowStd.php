<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');
$sql = "SELECT * FROM dormstudent ORDER BY `dormstudent`.`DS_studentID` ASC";
$query = mysqli_query($conn,$sql);
?>
    <br>
    <font size ="+20" color = "black">
       จัดการนิสิตหอพัก
    </font><br><br>
    <!-- แสดงรายชื่อ -->
<?php foreach($query as $data){ ?>
    <table id=BoxBlackGray>
        <tr>
            <td>
    <font size ="" color = "white">
<?php echo $data['DS_studentID'] ." : ".$data['DS_fname']." ".$data['DS_lname']?>
</td><td align="right">
        <a href="./EditStd.php?DS_studentID=<?php echo $data['DS_studentID'];?>">
        <button class="btnEdit" style="border-radius: 0px 13px 13px 0px;"><i class="fa fa-edit"></i></button></a>
    </font>
</tr>
    </table>
    <br>
<?php }?>

<?php include("./Footer.php");?>    