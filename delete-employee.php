<?php include 'connection.php';?>
<?php 
 $de=$_REQUEST['eid'];
 $str="DELETE FROM employees where id=$de";
 if(mysqli_query($con,$str)){
     header('Location:employees.php');
 }
?>