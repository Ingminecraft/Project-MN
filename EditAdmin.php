<?php include("./Header.php");?>
<?php include("./Menu.php");?>
<?php include("./SessionCheck.php");?>
<?php include('./connection/connection.php');?>
<?php 
$AD_employeeID = $_GET['AD_employeeID'];
$sql = "SELECT * FROM admin WHERE AD_employeeID=$AD_employeeID";
$query = mysqli_query($conn,$sql);
// แยกข้อมูลเป็น ROW
$row = mysqli_fetch_array($query);
//print_r($row);
?>
<br><br><br>
<table id=BoxGray align="center">
<form action="./processEdit.php" method="post">
<tr>
        <td align="center" colspan="2">
        <font size ="+20" color = "black" >
        แก้ไขผู้ดูแลระบบ<br><br>
        </font>
        </td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">ชื่อจริง<scr id=CheckFristName></scr></td>
        <td align="center" bgcolor=""><input type="text" name="AD_fname" id="FristName" size="25" maxlength="50" required
        value=<?php echo $row["AD_fname"];?>></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">นามสกุล<scr id=CheckLastName></scr></td>
        <td align="center" bgcolor=""><input type="text" name="AD_lname" id="LastName" size="25" maxlength="50" required
        value=<?php echo $row["AD_lname"];?>></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">ID <font color="red">(ไม่สามารถแก้ไข)</font>
        <scr id="CheckID"></scr></td>
        <td align="center" bgcolor=""><input type="text" name="AD_employeeID" id="AD_employeeID" size="25" maxlength="8" 
        pattern="([0-9]+)" title="ต้องเป็นตัวเลขเท่านั้น"
        placeholder="ระบบจะสร้าง ID อัตโนมัตติ" readonly
        value=<?php echo $row["AD_employeeID"];?>></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">เบอร์โทรศัพท์<scr id="CheckPhone"></scr></td>
        <td align="center" bgcolor=""><input type="text" name="AD_phonenumber" id="AD_phonenumber" size="25" maxlength="10" 
        pattern="(?=.*[0-9]).{10,}" title="กรุณากรอกเบอร์โทร" required
        value=<?php echo $row["AD_phonenumber"];?>></td>
    </tr>
    <tr>
        <td align="center" bgcolor="" colspan="2">
            <hr width="350px" color = "gray">
        </td>
      <tr>
        <td align="right" bgcolor="" width="210px">ชื่อผู้ใช้งาน<scr id="CheckUsername"></scr></td>
        <td align="center" bgcolor=""><input type="text" id="Username" name="AD_username" size="25" maxlength="20"
        title="กรุณากรอกชื่อผู้ใช้งาน" required
        value=<?php echo $row["AD_username"];?>></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">รหัสผ่าน<scr id="AllCheckPass"></scr></td>
        <td align="center" bgcolor=""><input type="password" id="password" name="AD_password" size="25"
        pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ประกอบไปด้วย A-Z, a-z และ 0-9 " required
        value=<?php echo $row["AD_password"];?>></td>
    </tr>
    <tr>
        <td align="right" bgcolor="" width="210px">ยืนยันรหัสผ่าน<scr id="CheckPass"></scr></td>
        <td align="center" bgcolor=""><input type="password" id="con_password" name="CON_AD_password" size="25"
        pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="รหัสต้องมีตัวอักษรอย่างน้อย 8 ตัว ประกอบไปด้วย A-Z, a-z และ 0-9 " required
        value=<?php echo $row["AD_password"];?>></td></td> 
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
        <!-- ถ้ามี Session ส่งมา ให้แสดงค่าที่ส่งมา -->
        <?php if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
                // เมื่อส่งค่ามาแสดงแล้วให้ลบทิ้ง
                unset($_SESSION['error']);
            }?>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="Center"><br>
        <input type="submit" name="submit" value="ยืนยัน">
        </td>
    </tr>
</form>
    <tr>
        <td colspan="2" align="Center"><a href="./ShowAdmin.php">
        <button class=btnCancel onclick="history.back()">ยกเลิก</button></a>
        </td>
    </tr>
</table>

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
    var phone = document.getElementById("AD_phonenumber");
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
    var AdminID =  document.getElementById("AD_employeeID");
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
//Username
var User_name  =  document.getElementById("Username");
function CheckUsername(){ 
  if(User_name.value.length < 1) {
    document.getElementById("CheckUsername").innerHTML = "<font color=red> *</font>";
    document.getElementById("UsernameLastCheck").innerHTML = "<font color=red> กรุณากรอกชื่อผู้ใช้<br></font>";
  } else {
    document.getElementById("CheckUsername").innerHTML = "";
    document.getElementById("UsernameLastCheck").innerHTML = "";
  } 
}
User_name.onchange = CheckUsername;
User_name.onkeyup = CheckUsername;
//เช็ครหัสผ่าน
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