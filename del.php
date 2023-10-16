<?php 

/* Created by E-siksha @ www.e-siksha.in */
// Run the connection here

 $dbc = mysqli_connect('localhost', 'root', '', 'todo');

$todo_id = $_GET['id'];

$sql = "delete from todos where id = $todo_id";
mysqli_query($dbc, $sql);

echo '<script>alert("Todo is Deleted.")</script>';
echo("<script>location.href = 'index.php';</script>");

?>
				   
