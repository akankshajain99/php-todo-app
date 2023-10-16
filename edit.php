<?php 

 /* Created by E-siksha @ www.e-siksha.in */
// Run the connection here

 $dbc = mysqli_connect('localhost', 'root', '', 'todo');


$todo_id = '';
if(isset($_GET['id'])){
	$todo_id = $_GET['id'];


//fetch data from table;

$sql = "select * from todos where id = $todo_id";
$result = mysqli_query($dbc, $sql);

$row = mysqli_fetch_array($result);

$todo = $row['todo'];

}elseif (isset($_POST['submit'])) {

	$todo = $_POST['todo'];
	$id = $_POST['id'];
	
	$query = "update todos set todo = '$todo' where id = $id";
	mysqli_query($dbc, $query);
     
	echo '<script>alert("Your Todo is Updated!!")</script>';
	echo("<script>location.href = 'index.php';</script>");

}


?>

<!DOCTYPE>
<html>
<head>
	<title>TODOS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
		.card{

			margin:  20px;
		}

</style>
</head>
<body>

	
<div class="container-fluid">
		
	
	<div class="card">
  		<h5 class="card-header">Edit Todo</h5>
	  		<div class="card-body">
	    		<form action="edit.php" method="post">
					<div class="form-group">
				
		        		<input type="text" name="todo" value="<?=$todo?>" class="form-control">
		        		<input type="hidden" name="id" value="<?=$todo_id?>">
					</div>
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-success">Save Changes</button>
		    		</div>
				</form>
	  		</div>
	</div>
</div>
    
</body>
</html>	
	
