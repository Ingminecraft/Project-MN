<!-- UC-03 -->
<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include('./connection/connection.php');?>

<form action="./AddStdProcess.php" method="post">
<br><br><br>
<table align="center">
    <tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "black">
        ลงทะเบียนเป็นนิสิตหอพัก<br><br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">รหัสนิสิต
        <scr id="CheckID"></scr></td>
        <td align="center" bgcolor=""><input type="text" name="DS_studentID" id="DS_studentID" size="25" maxlength="8" 
        pattern="([0-9]+)" title="ต้องเป็นตัวเลขเท่านั้น" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">ชื่อจริง<scr id=CheckFristName></scr></td>
        <td align="center" bgcolor=""><input type="text" name="DS_fname" id="FristName" size="25" maxlength="50" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">นามสกุล<scr id=CheckLastName></scr></td>
        <td align="center" bgcolor=""><input type="text" name="DS_lname" id="LastName" size="25" maxlength="50" required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">เบอร์โทรศัพท์<scr id="CheckPhone"></scr></td>
        <td align="center" bgcolor=""><input type="text" name="DS_phonenumber" id="DS_phonenumber" size="25" maxlength="10" 
        pattern="(?=.*[0-9]).{10,}" title="กรุณากรอกเบอร์โทร"
        required></td>
    </tr>
    <tr>
        <td align="center" bgcolor="" colspan="2">
            <hr width="350px" color = "gray">
        </td>
    <tr>
        <td align="right" bgcolor="" width="210px">รหัสผ่าน<scr id="AllCheckPass"></scr></td>
        <td align="center" bgcolor=""><input type="password" id="password" name="DS_password" size="25"
        pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ประกอบไปด้วย A-Z, a-z และ 0-9 " required></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">ยืนยันรหัสผ่าน<scr id="CheckPass"></scr></td>
        <td align="center" bgcolor=""><input type="password" id="con_password" name="CON_DS_password" size="25"
        pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ประกอบไปด้วย A-Z, a-z และ 0-9 " required></td></td> 
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px"></td>
        <td align="center" bgcolor=""><input type="checkbox" onclick="ShowPass()">แสดงรหัสผ่าน</td> 
    </tr>
    <tr>
        <td colspan="2" align="Center"><br>
        <scr id = FristNameLastCheck></scr>
        <scr id = LastNameLastCheck></scr>
        <scr id = IDLastCheck></scr>
        <scr id = PhoneLastCheck></scr>
        <scr id = UsernameLastCheck></scr>
        <scr id = PassLastCheck></scr>
        <scr id = ConPassLastCheck></scr>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><br>
        <input type="submit" name="submit" value="ยืนยัน">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center">
        <button class=btnCancel onclick="history.back()">ยกเลิก</button>
        </td>
    </tr>
</table>
</form>

<script>
  var Character = /[A-z]/g
  var LowCharacter = /[a-z]/g
  var HighCharacter = /[A-Z]/g
  var Numbers = /[0-9]/g
  var OnlyNumbers = /[^0-9]/g
//เช็ครหัสซ้ำ
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("con_password");
function CheckPassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
    document.getElementById("CheckPass").innerHTML = "<font color=red> *</font>";
    document.getElementById("ConPassLastCheck").innerHTML = "<font color=red> รหัสผ่านไม่ตรงกัน<br></font>";
  } else {
    confirm_password.setCustomValidity('');
    document.getElementById("CheckPass").innerHTML = "";
    document.getElementById("ConPassLastCheck").innerHTML = "";
  }
}
password.onchange = CheckPassword;
confirm_password.onkeyup = CheckPassword;
//เช็คเบอร์โทร
    var phone = document.getElementById("DS_phonenumber");
function CheckPhone(){ 
  if(phone.value.length < 10 || phone.value.match(OnlyNumbers)) {
    document.getElementById("CheckPhone").innerHTML = "<font color=red> *</font>";
    document.getElementById("PhoneLastCheck").innerHTML = "<font color=red> กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง<br></font>";
  } else {
    document.getElementById("CheckPhone").innerHTML = "";
    document.getElementById("PhoneLastCheck").innerHTML = "";
  } 
}
phone.onchange = CheckPhone;
phone.onkeyup = CheckPhone;

//เช็คไอดี
    var AdminID =  document.getElementById("DS_studentID");
function CheckID(){ 
  if(AdminID.value.match(OnlyNumbers)) {
    document.getElementById("CheckID").innerHTML = "<font color=red> *</font>";
    document.getElementById("IDLastCheck").innerHTML = "<font color=red> ไอดีต้องเป็นตัวเลขเท่านั้น<br></font>";
  } else {
    document.getElementById("CheckID").innerHTML = "";
    document.getElementById("IDLastCheck").innerHTML = "";
  }
}
AdminID.onchange = CheckID;
AdminID.onkeyup = CheckID;
//เช็คชื่อ
var Frist_Name  =  document.getElementById("FristName");
function CheckFrist_Name(){ 
  if(Frist_Name.value.length < 1) {
    document.getElementById("CheckFristName").innerHTML = "<font color=red> *</font>";
    document.getElementById("FristNameLastCheck").innerHTML = "<font color=red> กรุณากรอกชื่อจริง<br></font>";
  } else {
    document.getElementById("CheckFristName").innerHTML = "";
    document.getElementById("FristNameLastCheck").innerHTML = "";
  } 
}
Frist_Name.onchange = CheckFrist_Name;
Frist_Name.onkeyup = CheckFrist_Name;

//เช็คนามสกุล
var Last_Name  =  document.getElementById("LastName");
function CheckLast_Name(){ 
  if(Last_Name.value.length < 1) {
    document.getElementById("CheckLastName").innerHTML = "<font color=red> *</font>";
    document.getElementById("LastNameLastCheck").innerHTML = "<font color=red> กรุณากรอกนามสกุล<br></font>";
  } else {
    document.getElementById("CheckLastName").innerHTML = "";
    document.getElementById("LastNameLastCheck").innerHTML = "";
  } 
}
Last_Name.onchange = CheckLast_Name;
Last_Name.onkeyup = CheckLast_Name;

//เช็ครหัสผ่าน
var password = document.getElementById("password");
function AllCheckPass(){ 
  var a = 0;
  if(password.value.match(LowCharacter)) {
    a = a+1;
  } else {
    a = 0;
  }

  if(password.value.match(HighCharacter)) {
    a = a+1;
  } else {
    a = 0;
  }

  if(password.value.match(Numbers)) {
    a = a+1;
  } else {
    a = 0;
  }

  if(password.value.length >= 8) {
    a = a+1;
  } else {
    a = 0;
  }
  
  if(a == 4) {
    document.getElementById("AllCheckPass").innerHTML = "";
    document.getElementById("PassLastCheck").innerHTML = "";
  } else {
    document.getElementById("AllCheckPass").innerHTML = "<font color=red> *</font>";
    document.getElementById("PassLastCheck").innerHTML = "<font color=red> รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ประกอบไปด้วย A-Z, a-z และ 0-9 <br></font>";
  }
}
password.onchange = AllCheckPass;
password.onkeyup = AllCheckPass;

CheckFrist_Name();
CheckLast_Name();
CheckPhone();
CheckUsername();
AllCheckPass();

function ShowPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var y = document.getElementById("con_password");
  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }
}

</script>
<?php include("./Footer.php");?>    