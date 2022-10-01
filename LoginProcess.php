<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                include('./connection/connection.php');
				//รับค่า user & password
                  $Username = $_POST['username'];
                  $Password = $_POST['password'];
				//query 
                  $sql="SELECT * FROM admin Where AD_username='".$Username."' and AD_password='".$Password."' ";
                  $sqlM="SELECT * FROM dormstudent Where DS_studentID='".$Username."' and DS_password='".$Password."' ";

                  $result = mysqli_query($conn,$sql);
                  $resultM = mysqli_query($conn,$sqlM);

                  if(mysqli_num_rows($result)==1){
 
                      $row = mysqli_fetch_array($result);
 
                      $_SESSION["UserID"] = $row["AD_employeeID"];
                      $_SESSION["User"] = $row["AD_fname"]." ".$row["AD_lname"];
                      $_SESSION["level"] = "A";
 
                     Header("Location: Home.php");
 
                  }elseif(mysqli_num_rows($resultM)==1){
                      
                    $row = mysqli_fetch_array($resultM);
                      if($row["DS_right"]==1){
                    $_SESSION["error"] = ":ชื่อผู้ใช้งานถูกระงับการใช้งาน กรุณาติดต่อเจ้าหน้าที่";
                      Header("Location: Login.php");
                      }else{
                    $_SESSION["UserID"] = $row["DS_studentID"];
                    $_SESSION["User"] = $row["DS_fname"]." ".$row["DS_lname"];
                    $_SESSION["level"] = "M";
                      Header("Location: Home.php");
                      }
                  }else{
                    $_SESSION["error"] = ":ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้องกรุณากรอกใหม่อีกครั้ง";
                    Header("Location: Login.php");
                  }
 
        }else{
 
 
             Header("Location: Login.php"); //user & password incorrect back to login again
 
        }
?>