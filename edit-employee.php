<?php include 'connection.php';
?>
  <link rel="stylesheet" href="style.css">
  <?php 
  $rec=$_REQUEST['eid'];
  $s1="SELECT * FROM employees where id=$rec";
  $m=mysqli_query($con,$s1);
  $emp=mysqli_fetch_array($m);
  
  ?>
<?php 
     $str='SELECT * FROM departments';
     $q=mysqli_query($con,$str);

?>
 
 
 <?php
 if(ISSET($_POST['submit'])){
  
   $name=$_POST['name'];
    $email=$_POST['email'];
   $department=$_POST['department'];
   $phone=$_POST['phone'];
   $address=$_POST['address'];
   $gender=$_POST['gender'];
   
   if(isset($_POST['status']))
   {
    $status=1;
   }
   else{
     $status=0;
   }
      $str="UPDATE employees SET name='$name',email='$email',department_id=$department,
      phone='$phone',address='$address',gender='$gender',active=$status where id=$rec";
      echo $str;
      if(mysqli_query($con,$str)){
        header('Location:employees.php');
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
    <h2>Edit Employee info</h2>
      <form method="POST" action="">
        <div class="row">
          <div class="col-6">
                 <div class="form-group">
                  <label for="">Name</label>
                    <input type="text" required class="form-control" name="name" value="<?php echo $emp['Name'] ?>"id="">
          </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Email</label>
               <input type="email" required class="form-control" name="email" value="<?php echo $emp['Email'] ?>"id="">
            </div> 
          </div>
         </div>
         
         <div class="row">
          <div class="col-6">
             
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" class="form-control" name="phone" value="<?php echo $emp['Phone'] ?>" id="">
            </div>
           </div>
           <div class="col-6">
           <div class="form-group">
                <label for="">Department</label>
                <select name="department" class="form-control" name="department" id="">
                  <option value="">Select Department</option>
                  <?php 
                   while($row=mysqli_fetch_assoc($q)){
                    if($row['id']==$emp['Department_id']){?>
                      <option selected value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>      

                   <?php }
                    else{?>
                      <option value="<?php echo $row['id']; ?>"><?php echo $row['Name']; ?></option>
                   <?php }

                }?>
                  
                 
                  </select>
        </div>
                     
         </div>
         
         
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
              <label for="">Gender</label>  
              <div class="form-check">
                <input class="form-check-input" type="radio" <?php echo( $emp['Gender']=='Male')? 'checked':''?> name="gender" id="" value="Male" checked>
                  <label class="form-check-label" for="exampleRadios1">Male</label>
              </div>

        <div class="form-check">
              <input class="form-check-input" type="radio"<?php echo( $emp['Gender']=='Female')? 'checked':''?>  name="gender" id="" value="Female">
              <label class="form-check-label" for="exampleRadios2">
                Female
              </label>
        </div>

        <div class="form-check">
              <input class="form-check-input" type="radio" <?php echo( $emp['Gender']=='Other')? 'checked':''?>  name="gender" id="" value="other">
              <label class="form-check-label" for="exampleRadios3">
                Other
              </label>
        </div>
           </div>
        </div>

            <div class="col-6">
              <div class="form-group purple-border">
                <label for="">Address</label>
                 <textarea class="form-control" name="address" id="" rows="3"><?php echo $emp['Address'] ?></textarea>
              </div>
            </div>
          <div class="row">
            <div class="col-6">
                <div class="form-group">
                  <div class="form-check">
                    <input type="checkbox" name="status" <?php echo( $emp['Active']==1)? 'checked':''?>  class="form-check-input" id="" checked>
                    <label class="form-check-label" for="">Active</label>
                  </div>
                </div>
            </div>
          </div>
      </div>
    
      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-danger" value="Update">
      </div>

       </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  
</body>
</html>