<?php include 'connection.php';

?>
  <link rel="stylesheet" href="style.css">
<?php 

$str='SELECT * FROM departments';
$q=mysqli_query($con,$str);
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
<?php include 'nav.php'; ?>
<br>
<div class="container">
  <div class="col-8 offset-md-2">
      <h2>Departments table</h2>
      
      <table class="table table-striped">
    <thead>
      <tr>
          <th>Name</th>
           <th>Email</th>
          <th>Code</th>
          <th>Contact</th>
      </tr>
    </thead>

    <tbody>
      <?php
        while($row=mysqli_fetch_assoc($q)){?>
              <tr>
                  <td><?php echo $row['Name']  ?></td>
                  <td><?php echo $row['Email'] ?></td>
                  <td><?php echo $row['Code'] ?></td>
                  <td><?php echo $row['Contact_No'] ?></td>

              </tr>
            
       <?php }
      ?>
      
    </tbody>
  </table>

</div>
</div>
    
     
        

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  
</body>
</html>