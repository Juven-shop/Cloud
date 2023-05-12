<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" href="../hihiweb/images/bmw-icon-png-24.jpg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
     integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="icon" href="../img/bmw-icon-png-24.jpg">
</head>
<style>
    body{
      background-image: url('../img/ảnh-nền-máy-tính-cực-ấn-tượng-1536x864.jpg');
      background-size: cover;
      background-position-y: -100px;
        color: aquamarine;
        Width: 1000px;
        margin: auto;
        padding: 100px;
    }

</style>
<body>
<?php
//include_once 'header.php';
include_once 'connectproduct.php';
if(isset($_POST['btnRegister'])){
$dblink = $c->connectToPDO();
$fullname = $_POST['txtFullname'];
$email = $_POST['txtEmail'];
$usrName = $_POST['txtUsername'];
$phone = $_POST['txtPhone'];
$address = $_POST['txtaddress'];
$password = $_POST['txtPass1'];
$confirmpass = $_POST['txtPass2'];
$dateBirth = date ('Y-m-d',strtotime($_POST['txtBirth']));

$sql= "INSERT INTO `tbl_users`( `email`, `usrName`, `fullname`, `phone`, `address`, `password`, `confirmpass`, `role`, `birthday`) VALUES (?,?,?,?,?,?,?,?,?)";// co gai tien "select * from hihipro002 where pName like ? and Price > ?";
//"select * from hihipro002 where pName like CONCAT('%',:Namep,'%')";(**) // where $_GET['id']; 

$re = $dblink->prepare($sql);
//$re->bindParam(":Namep",$pName,
//PDO::PARAM_STR);
$stmt = $re->execute(array("$email","$usrName","$fullname","$phone","$address","$password","$confirmpass","User","$dateBirth"));// $re->execute(array("%$pName", gia tien(?2))); // $re->execute();(**)
if(isset($_POST['btnRegister'])){
    if (isset($_POST['txtUsername']) && strlen($_POST['txtUsername']) >= 12)
    {
        echo "Username must be less than 12 "; 
        echo "<br>";
    }
  }
 
  if(isset($_POST['btnRegister'])){
      if (isset($_POST['txtPass1']) && strlen($_POST['txtPass1']) < 5) 
      {
          echo "Password must be than 5";
          echo "<br>";
     }
 }
  if(isset($_POST['btnRegister'])){
      if ($_POST['txtPass1'] != $_POST['txtPass2'])
      {
          echo "Confirm password is not true";
          echo "<br>";
      }
 }
 if(isset($_POST['btnRegister'])){
  if (isset($_POST['txtPhone']) && strlen($_POST['txtPhone']) > 10 ) 
     {
         echo "Phone number must be less than 11 ";
         echo "<br>";
     }
  }
if($stmt){
      echo "Congrats";
}else{
      echo "Failed";
}
}
?>

<div class="container">
    <h2><Center>Member Registration</Center></h2>
    <br>
             <form id="form1" name="form1" method="post" action="" class="form-horizontal needs-validation" role="form">
                <div class="row pb-3">
                        
                        <label for="txtTen" class="col-sm-2 control-label">Username(*):  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value="" required/>                
                        </div>
                  </div>                
                   <div class="row pb-3">   
                        <label for="" class="col-sm-2 control-label">Password(*):  </label>
                        <div class="col-sm-10">
                              <input type="password" name="txtPass1" id="txtPass1" class="form-control" placeholder="Password" required/>
                        </div>
                   </div>     
                   
                   <div class="row pb-3"> 
                        <label for="" class="col-sm-2 control-label">Confirm Password(*):  </label>
                        <div class="col-sm-10">
                              <input type="password" name="txtPass2" id="txtPass2" class="form-control" placeholder="Confirm your Password" required/>
                        </div>
                   </div>     
                   
                   <div class="row pb-3">                               
                        <label for="lblFullName" class="col-sm-2 control-label">Full name(*):  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtFullname" id="txtFullname" value="" class="form-control" placeholder="Enter FullName"required/>
                        </div>
                   </div> 
                   
                   <div class="row pb-3">      
                        <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email" required/>
                        </div>
                   </div>
                   <div class="row pb-3">      
                        <label for="lblEmail" class="col-sm-2 control-label">Phone:  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtPhone" id="txtPhone" value="" class="form-control" placeholder="Phone" required/>
                        </div>
                   </div>  
                   <div class="row pb-3">
                       <label class="col-sm-2 col-form-label" for="address">Address</label>
                       <div class="col-sm-10">
                           <input type="text" name="txtaddress"
                           id="txtaddress" class="form-control"placeholder="Address" required/>
                       </div>
                  </div>                     
                    <div class="row pb-3"> 
                        <label for="lblNgaySinh" class="col-sm-2 control-label">Date of Birth(*):  </label>
                        <div class="col-sm-10">
                            <input type="date" id="txtBirth" name="txtBirth" class="form-control">
                           
                       </div>
                  </div>	
                  <br>
                <div class="row pb-3">
                    <div class="d-grid col-2 mx-auto">
                          <input type="submit"  class="btn btn-primary" name="btnRegister" id="btnRegister" value="Register"/>
                              
                    </div>
                 </div>
                 <div class="form-Back" style="justify-content: space-between; display:flex" >
                      <a href="login.php" class="nav-link">Back to Login</a>
                 </div>
            </form>
</div>

</body>
<?php
//include_once 'footer.php';
?>