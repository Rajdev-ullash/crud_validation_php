<?php include 'connection.php';
?>
  <!-- <link rel="stylesheet" href="style.css"> -->
<?php 
     $str='SELECT * FROM departments';
     $q=mysqli_query($con,$str);

?>
 
 
 <?php
 if(ISSET($_POST['submit'])){

  if($_POST['name'] == ""){
    $error_msg['name'] = "Name is required";

  }
  
   $name=$_POST['name'];

   if(!preg_match("/^[a-zA-Z]*$/",$name)){
    $error_msg['name'] = "Only letters are allowed";
   }

  if($_POST['email'] == ""){
    $error_msg['email'] = "Email is required";

  }
  
  $email=$_POST['email'];

  
  $phone=$_POST['phone'];

  if(empty($phone)){
    $error_msg['phone'] = "Phone number is required";
  }
  else if(!is_numeric($phone)){
    $error_msg['phone'] = "only number is required";
  }

  else if(strlen($phone) !=11){
    $error_msg['phone'] = "11 digit phone number is required";
  }
  
   $department=$_POST['department'];
   if(empty($department)){
    $error_msg['department'] = "Department is required";
  }
  //  $phone=$_POST['phone'];
   $address=$_POST['address'];
   if(empty($address)){
    $error_msg['address'] = "Address is required";
  }
   $gender=$_POST['gender'];
   
   if(isset($_POST['status']))
   {
    $status=1;
   }
   else{
     $status=0;
   }

   $select = mysqli_query($con, "SELECT * FROM employees WHERE email = '".$email."'");
   $select1 = mysqli_query($con, "SELECT * FROM employees");
   
   if(mysqli_num_rows($select)>0) {
    $error_msg['email'] = "Email is already use";
    // echo "Email is exist";
   }
   else if($row = mysqli_fetch_assoc($select1)){
     
    if($_POST['department'] != $row['Department_id']){
            $error_msg['department'] = "Department is invalid";
    }
    else{
            $str="INSERT INTO employees(name,email,phone,department_id,address,gender,active) values('".$name."','".$email."','".$phone."', $department,'".$address."','".$gender."',$status)";
            if(mysqli_query($con,$str)){
              header('Location:employees.php');
            }
           }

   }
    
 }
   
 
 ?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee section</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php include 'nav.php';?>
<br>
<div class="container">
  <div class="col-8 offset-md-2">
    <h2>Enter Employee info</h2>
      <form method="POST" action="">
        <div class="row">
          <div class="col-6">
                 <div class="form-group">
                  <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="">

                    <?php
                      if(isset($error_msg['name'])){
                        echo "<div class='error text-danger'>" .$error_msg['name']. "</div>";
                      }
                    ?>
          </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Email</label>
               <input type="email"  class="form-control" name="email" id="">
               <?php
                  if(isset($error_msg['email'])){
                        echo "<div class='error text-danger'>" .$error_msg['email']. "</div>";
                  }
               ?>
            </div> 
          </div>
         </div>
         
         <div class="row">
          <div class="col-6">
             
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" class="form-control" name="phone" id="">

              <?php
                  if(isset($error_msg['phone'])){
                        echo "<div class='error text-danger'>" .$error_msg['phone']. "</div>";
                  }
               ?>
            </div>
           </div>
           <div class="col-6">
           <div class="form-group">
                <label for="">Department</label>
                <select name="department" class="form-control" name="department" id="">
                  <option value="">Select Department</option>
                  <?php 
                   while($row=mysqli_fetch_assoc($q)){?>

                            <option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>


                  <?php }
                  
                  ?>
                  </select>
                  <?php
                      if(isset($error_msg['department'])){
                        echo "<div class='error text-danger'>" .$error_msg['department']. "</div>";
                      }
                    ?>
        </div>
                     
         </div>
         
         
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
              <label for="">Gender</label>  
              <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" checked>
                  <label class="form-check-label" for="exampleRadios1">Male</label>
              </div>

        <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
              <label class="form-check-label" for="exampleRadios2">
                Female
              </label>
        </div>

        <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="other">
              <label class="form-check-label" for="exampleRadios3">
                Other
              </label>
        </div>
           </div>
        </div>

            <div class="col-6">
              <div class="form-group purple-border">
                <label for="">Address</label>
                 <textarea class="form-control" name="address" id="" rows="3"></textarea>
                 <?php
                      if(isset($error_msg['address'])){
                        echo "<div class='error text-danger'>" .$error_msg['address']. "</div>";
                      }
                    ?>
              </div>
            </div>
          <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" name="status" value=1 class="form-check-input" id="" checked>
                    <label class="form-check-label" for="">Active</label>
                  </div>
                </div>
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