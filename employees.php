<?php include 'connection.php';

?>
  <!-- <link rel="stylesheet" href="style.css"> -->
<?php 

$str='SELECT employees.active,employees.address,employees.gender,employees.id as eil, employees.name,employees.email,employees.phone,departments.name as department FROM employees INNER JOIN departments ON employees.department_id=departments.id';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php include 'nav.php'; ?>
<br>
<div class="container">
  <div class="col-8 offset-md-2">
      <h2>Employees list</h2>
      
      <table class="table table-striped">
    <thead>
      <tr>
          <th>id</th>
           <th>Name</th>
          <th>Phone</th>
          <th>Department</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Active</th>
          <th>Actions</th>

          
      </tr>
    </thead>

    <tbody>
      <?php
        while($row=mysqli_fetch_assoc($q)){?>
              <tr>
                  <td><?php echo $row['eil']  ?></td>
                  <td><?php echo $row['name']  ?></td>
                  <td><?php echo $row['phone'] ?></td>
                  <td><?php echo $row['department'] ?></td>
                  <td><?php echo $row['address'] ?></td>
                  <td><?php echo $row['gender'] ?></td>
                  <td>
                    <?php 
                    if($row['active']==1){
                      echo '<span class="badge badge-success">Active</span>';

                    }
                    else{
                      echo '<span class="badge badge-danger">Inactive</span>';
                    }
                    ?>
                  </td>
                  <td>
                    <a href="edit-employee.php?eid=<?php echo $row['eil']?>">
                    <i title="Edit" class="fa fa-pencil" style=color:dark></i>
                  </a>
                  <a href="" data-toggle="modal" data-target="#myModal <?php echo $row['eil']?>">
                  <i title="Delete" class="fa fa-trash"></i>
                  </a>
                  <div class="modal" id="myModal <?php echo $row['eil'] ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Delete Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <div class="modal-body">
                                Are sure you want to delete? <b><?php echo $row['name']?></b>
                              </div>

                              <!-- Modal footer -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <a class="btn btn-secondary"href="delete-employee.php?eid=<?php echo $row['eil']?>">Yes</a>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                  
                  </td>

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