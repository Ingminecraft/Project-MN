<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<form action="./process.php" method="post">
<br><br><br>
<table id=BoxGray align="center">
    <tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "black" >
        จัดการผู้ดูแลระบบ<br><br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="200px">ชื่อจริง</td>
        <td align="center" bgcolor=""><input type="text" name="FristName" size="25" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="200px">นามสกุล</td>
        <td align="center" bgcolor=""><input type="text" name="LastName" size="25" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="200px">ID <font color="red">(ไม่สามารถแก้ไขได้ภายหลัง)</font></td>
        <td align="center" bgcolor=""><input type="text" name="ID_Admin" size="25" maxlength="8" 
        pattern="([0-9]+)" title="ต้องเป็นตัวเลขเท่านั้น"
        required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="200px">เบอร์โทรศัพท์</td>
        <td align="center" bgcolor=""><input type="text" name="PHONE_Admin" size="25" maxlength="10" 
        pattern="(?=.*[0-9]).{10,}" title="กรุณากรอกเบอร์โทร"
        required></td>
    </tr>
    <tr>
        <td align="center" bgcolor="" colspan="2">
            <hr width="350px" color = "gray">
        </td>
    <tr>
        <td align="right" bgcolor="" width="200px">รหัสผ่าน</td>
        <td align="center" bgcolor=""><input type="password" id="password" name="PASS_Admin" size="25"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ตัวอักษรตัวเล็ก 1, ตัวอักษรตัวใหญ่ 1, และ ตัวอักษรพิเศษ 1 ตัว" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="200px">ยืนยันรหัสผ่าน</td>
        <td align="center" bgcolor=""><input type="password" id="con_password" name="CON_PASS_Admin" size="25"
        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ตัวอักษรตัวเล็ก 1, ตัวอักษรตัวใหญ่ 1, และ ตัวอักษรพิเศษ 1 ตัว" required></td></td> 
    </tr>
    <tr>
        <td colspan="2" align="Center"><br><br>
        <input type="submit" name="submit" value="ยืนยัน">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><a href="./ShowAdmin.php">
        <button class=btnCancel onclick="history.back()">ยกเลิก</button></a>
        </td>
    </tr>
</table>
</form>

<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("con_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<?php include("./Footer.php");?>    