<?php include("./connection/connection.php");?>
<?php include("./Header.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include("./Menu.php");?>
<?php
$NameStd = $_POST['NameStd'];
$DateStd = date("d/m/Y", strtotime($_POST['date']));
$sql = "SELECT * FROM dormstudent";
$query = mysqli_query($conn,$sql);
//echo $DateStd;
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
                echo '<div align=right><form action="./CheckFiler.php?NameStd=" method="post">
                <select id="NameStd" name="NameStd">';
                echo '<option value="">ทุกคน</option>';
                foreach($query as $data){
                echo '<option value="DS_fname='."'".$data['DS_fname']."'".' and">'.$data['DS_fname'].'</option>';
                }
                echo'</select>
                <input id="NameStd" type="date" name="date" min="<?php echo $Threeday?>" required>
                <input type="submit" value="เรียกดู" style="width:100px;padding:5px"></div>
                </form>';}}
                ?>        
        </td>
        <td><a href="./Check.php"><button class=btnCancel style="width:75px;padding:5px" >Clear</button></a></td>
    </tr>
    <tr>
</table>
<?php

$sql = "SELECT * FROM doposititem 
INNER JOIN dormstudent ON dormstudent.DS_studentID=doposititem.DS_studentID
INNER JOIN withdrawitemrequestdocument ON dormstudent.WIR_ID=withdrawitemrequestdocument.WIR_ID
WHERE $NameStd WIR_date='$DateStd';";
$query = mysqli_query($conn,$sql);
//echo $sql
?>
<?php foreach($query as $data){ ?>
<table align="center" style="width:80%;padding:10px 10px 10px 80px;border:solid;border-color:gray;table-layout:fixed;">
    <tr>
    <td bgcolor="" width=50%>
    <a href="./ShowWithdraw.php?DPI_ID=<?php echo $data['DPI_ID'];?>
    "class=TextButton><font size=5><?php echo $data['DPI_detail']?></font></a>
    <?php
    echo "[".$data['DS_fname']." ".$data['DS_lname']."-".$data['WIR_date']."-".$data['WIR_time']."]";
    ?>
    </td>
    <td align ="Right" bgcolor=>
    <form action="./CheckProcess.php?DPI_ID=<?php echo $data['DPI_ID'];?>" method="post">
    <?php if($data["DPI_status"]==0){echo '     
      <input type="radio" id="IN" Name="'.$data["DPI_ID"].'" value="0" required checked>อยู่ในคลัง
      &nbsp;&nbsp;
      <input type="radio" id="WAIT" Name="'.$data["DPI_ID"].'" value="1">รอรับคืน
      &nbsp;&nbsp;
      <input type="radio" id="OUT" Name="'.$data["DPI_ID"].'" value="2">รับคืนแล้ว
      &nbsp;&nbsp;';} ?>
    <?php if($data["DPI_status"]==1){echo '     
      <input type="radio" id="IN" Name="'.$data["DPI_ID"].'" value="0" required >อยู่ในคลัง
      &nbsp;&nbsp;
      <input type="radio" id="WAIT" Name="'.$data["DPI_ID"].'" value="1" checked>รอรับคืน
      &nbsp;&nbsp;
      <input type="radio" id="OUT" Name="'.$data["DPI_ID"].'" value="2">รับคืนแล้ว
      &nbsp;&nbsp;';} ?>
    <?php if($data["DPI_status"]==2){echo '     
      <input type="radio" id="IN" Name="'.$data["DPI_ID"].'" value="0" required >อยู่ในคลัง
      &nbsp;&nbsp;
      <input type="radio" id="WAIT" Name="'.$data["DPI_ID"].'" value="1">รอรับคืน
      &nbsp;&nbsp;
      <input type="radio" id="OUT" Name="'.$data["DPI_ID"].'" value="2" checked>รับคืนแล้ว
      &nbsp;&nbsp;';} ?>
      <input type="submit" name="submit" value="บันทึก" style="width:100px;padding:5px">
    </form>
    </td>
    </tr>
</table>
<?php }?>
<?php include("./Footer.php");?>  