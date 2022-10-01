<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionMemberCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
    $date = date("Y-m-d");
    $Threeday = date('Y-m-d',strtotime($date . "+3 days"));
?>
<br>

<table id=BoxGray style="Width: 700px;;padding:50px" align=center></td></tr>
<form action="./ReqProcess.php" method="post" enctype="multipart/form-data">
<tr><td colspan="2" align=center><font size ="+20" color = "black">แจ้งความประสงค์รับของคืน</font><br><br>
  <tr>
    <td align=right><font size=5>วันที่รับของ&nbsp;&nbsp;</font><br></td>
    <td><input type="date" name="date" min="<?php echo $Threeday?>" required><br></td>
  </tr>
  <tr>
    <td align=right><font size=5>ช่วงเวลา&nbsp;&nbsp;</font></td>
    <td style=padding:10px><font size=4>

      <input type="radio" id="Moring" Name="Time" value="08:00:00" required>เช้า
      &nbsp;&nbsp;
      <input type="radio" id="Noon" Name="Time" value="12:00:00">กลางวัน
      &nbsp;&nbsp;
      <input type="radio" id="Evening" Name="Time" value="16:00:00">เย็น
      &nbsp;&nbsp;

      </font>
    </td>
  </tr>
  <tr>
    <td align=center colspan="2"><br>
      <input type="submit" name="submit" value="ยืนยัน">
      </form>
      <a href="./Withdraw.php"><button class=btnCancel>ยกเลิก</button></a>
    </td>
  </tr>
 


</table>

<?php include("./Footer.php");?>