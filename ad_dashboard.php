<?php 
session_start();
include('php/login.php');
include('php/read.php');

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="update.php">Update</a>
            <a class="nav-item nav-link" href="#">Logout</a>

            </div>
        </div>
        </nav>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
				
		</div>
        <div class="box">
            <?php if (mysqli_num_rows($result)) { ?>
                
            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">last</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">User Type</th>
                <th scope="col">Creation Date</th>
                <th scope="col">Updated at Date</th>
                <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i =0;
                while($rows = mysqli_fetch_assoc($result)){
                    $i ++;

                ?>
                <tr>
                <th scope="row"><?= $i?></th>
                <td><?=$rows['first_name']?></td>
                <td><?php echo $rows['last_name']; ?></td>
                <td><?=$rows['phone']?></td>
                <td><?php echo $rows['email']; ?></td>
                <td><?=$rows['user_type']?></td>
                <td><?php echo $rows['created_at']; ?></td>
                <td><?php echo $rows['updated_at']; ?></td>
                <td><a href="update.php?id=<?= $rows['id'] ?>" class= "btn btn-success" >Update</a></td>
                </tr>
                <?php }?>
                <tr>
                <?php }?>
            </tbody>

            </table>
            <?php ?>
        </div>
	</div>
</body>
</html>