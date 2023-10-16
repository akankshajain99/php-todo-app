<?php  

  /* Created by E-siksha @ www.e-siksha.in */
// Run the connection here   
  $dbc = mysqli_connect('localhost', 'root', '', 'todo');

  if(isset($_POST['submit'])){

  	$todo = $_POST['todo'];

   //insert data
   $sql = "insert into todos (todo) values ('$todo')";
   mysqli_query($dbc, $sql);
   $msg = "Today's todos created.";

   

  
  	
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

		li{
			font-size: 20px;
		}
</style>
</head>
<body>

	
	<div class="container-fluid">
		<div class="row">
				<div class="col-sm-6">
						<div class="card">
    				  <div class="card-body">
        				<h5 class="card-title">My Todo List</h5>
        				<form action="index.php" method="post">
					   				<div class="form-group">
					   					<label>Today's Todo</label>
					   					<center>
					   						<input type="text" name="todo" class="form-control">
					   					</center>	
					   				</div>
				   					<div class="form-group">
				   							<button class="btn btn-info" type="submit" name="submit">Done</button>
				   					</div>
				   		 			<?php if (isset($_POST['submit'])) {?>
				     	
				   		
				   					<div class="alert alert-success">

				   							<p><?=$msg;?></p>
				   			
				   					</div>

				   					<?php } ?>

		   					</form>
      				</div>
    				</div>
  				</div>
  				<div class="col-sm-6">
    				<div class="card">
      				<div class="card-body">
        				<h5 class="card-title">TODO's</h5>
        				<p class="card-text">My Todo's</p>

        				<ul class="list-group">
        				<?php 
        				//fetch data from table;
		   					$sql = "SELECT * from todos";
		   					$result = mysqli_query($dbc, $sql);

                             
                while ($row=mysqli_fetch_array($result)) {

                  $todo = $row['todo'];
                  $todo_id = $row['id'];
                  $status = $row['status'];

                ?>
                            
								
                  <li class="list-group-item">
                             		
                      <?=$todo?>
                             		  
											<?php if ($status==0) { ?>
                           &nbsp; 

                          <a href="edit.php?id=<?=$todo_id?>" class="btn btn-success">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
		                      </a>
		                      <a href="del.php?id=<?=$todo_id?>" class="btn btn-danger">
		                        <i class="fa fa-trash-o" aria-hidden="true"></i>
		                      </a>
		                      <a href="comp.php?id=<?=$todo_id?>" class="btn btn-info">
		                        <i class="fa fa-check" aria-hidden="true"></i>
		                      </a>	<?php } else{ ?>

		                       <a href="del.php?id=<?=$todo_id?>" class="btn btn-danger">
		                         <i class="fa fa-trash-o" aria-hidden="true"></i>
		                       </a>

		                       <a href="comp.php?id=<?=$todo_id?>" class="btn btn-success">
		                          <i class="fa fa-check" aria-hidden="true" ></i>
		                       </a>

		                    <?php } ?>
										 </li>
									

                  <?php } ?>
                  </ul>
    
      				</div>
    				</div>
  				</div>
			</div>
	</div>	

	

</body>
</html>		   	   
