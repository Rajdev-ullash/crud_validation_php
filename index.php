<?php include 'connection.php';
 
?>
  <!-- <link rel="stylesheet" href="style.css"> -->
 <?php
   
 if(ISSET($_POST['submit'])){
   $name=$_POST['name'];
   $is_exists=checkDuplicate($name);
   if($is_exists==1)
   {
       echo 'already exists';
   }
   else{

    $email=$_POST['email'];
   $code=$_POST['code'];
   $contact=$_POST['contact'];
   $str="INSERT INTO departments(name,email,code,contact_no) values('".$name."','".$email."','".$code."','".$contact."')";
   if(mysqli_query($con,$str)){
     echo 'successfully inserted';
   }
   
   }
 }
 ?>
 <?php
  function checkDuplicate($name){
    
    $str="SELECT COUNT(*) as total FROM departments where name='".$name."'";

    $username = "root";
     $password = "";
    $hostname = "localhost"; 

    $db = "crud";

   $con = mysqli_connect($hostname, $username, $password, $db);

     
    $q=mysqli_query($con,$str);
    $row=mysqli_fetch_assoc($q);
  $total=$row['total'];
    if($total>0){

      return 1;
    }
     
  }
 
 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Department</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php include 'nav.php';?>
<br>
<div class="container">
  <div class="col-8 offset-md-2">
    <h2>Enter Department info</h2>
      <form method="POST" action="">
        <div class="row">
          <div class="col-6">
                 <div class="form-group">
                  <label for="">Name</label>
                    <input type="text" required class="form-control" name="name" id="">
          </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Email</label>
               <input type="email" required class="form-control" name="email" id="">
            </div> 
          </div>
         </div>

         <div class="row">
          <div class="col-6">
             
            <div class="form-group">
              <label for="">Code</label>
              <input type="text" class="form-control" name="code" id="">
            </div>
           </div>
           <div class="col-6">
           <div class="form-group">
        <label for="">Contact No</label>
     <input type="text" class="form-control" name="contact" id="">
        </div>
                     
           </div>
         </div>
    

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="Add">
      </div>



       </form>
  </div>
  

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  
</body>
</html>