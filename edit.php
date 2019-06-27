<?php
	//get the index from URL
	$index = $_GET['index'];
	//get json data
	$data = file_get_contents('members.json');
	$data_array = json_decode($data);
	//assign the data to selected index
	$row = $data_array[$index];
	
	$find_user = file_get_contents('user.json');
	$data_user = json_decode($find_user,true);
	$user = $data_user[0]['user_role'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JSON_CRUD</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
	<style>
		.my-posi{
			position: absolute;
			top:50%;
			left: 50%;
			transform: translate(-50%,-50%);
			width: 600px;
		}
		.gray{
			box-shadow: 0px 1px 5px 3px gray;
			padding: 10px 20px;
			border-radius: 10px;
		}
		select{
			width: 100%;
			border:none;
			border-bottom: 1px solid gray;
			background: white;
			color:gray;
		}
		#user{
            display: none;
        }
		select{
			outline: none;
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="container-fluid my-posi">
			<div class="gray">
				<div class="card container-fluid bg-white">
					<h4 style="
						text-align:center;
						box-shadow: 0px 1px 5px 3px gray;
						padding: 10px 20px;
						border-radius: 10px;"
					>Edit Student</h4>
					<div class="card-content">
						<form method="POST" class="row">
							<div class="filds">
								<input type="text" placeholder="id" name="id" value="<?php echo $row->id;?>">
								<label for="">ID</label>
							</div>
							<div class="filds">
								<input type="text" placeholder="First name" name="fname" value="<?php echo $row->firstname;?>">
								<label for="">First Name</label>
							</div>
							<div class="filds">
								<input type="text" placeholder="Last name" name="lname" value="<?php echo $row->lastname;?>">
								<label for="">Last Name</label>
							</div>
							<div class="filds" id="<?php echo $user?>">
								<select name="role">
									<option value="admin">Admin</option>
									<option value="user" selected>User</option>
								</select>
							</div>
							<div id="<?php echo $user?>">
								<div class="filds">
									<input type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $row->pass;?>">
									<label for="">Password</label>
								</div>
								<div class="filds">
									<input type="password" placeholder="Re password" id="repass">
									<label for="">Repassword</label>
								</div>
							</div>
							<div class="filds">
								<select name="sex" id="">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="filds">
								<input type="text" placeholder="Phone Number" name="phone" value="<?php echo $row->phone;?>">
								<label for="">Phone Number</label>
							</div>
							<div class="filds">
								<input type="email" placeholder="Email" name="email" value="<?php echo $row->email;?>">
								<label for="">Email</label>
							</div>
							<div class="filds">
								<input type="text" name="group" placeholder="group" value="<?php echo $row->group;?>">
								<label for="">Group</label>
							</div>
								<input type="submit" class="btn btn-success pull-right" name="save" value="Update"/>
								<a type="button" class="btn btn-primary pull-left" href="home.php" style="margin-top:20px">Cancel</a>
								<!-- <div class="clearfix"></div> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <script>
		document.getElementById('admin').style.display="block";
	</script> -->
<?php
	if(isset($_POST['save'])){
		$input = array(
			'id' => $_POST['id'],
			'firstname' => $_POST['fname'],
			'lastname' => $_POST['lname'],
			'pass' => $_POST['pass'],
			'role' => $_POST['role'],
			'sex' => $_POST['sex'],
			'phone' => $_POST['phone'],
			'email' => $_POST['email'],
			'group' => $_POST['group']
		);
		$data_array[$index] = $input;
		$data = json_encode($data_array, JSON_PRETTY_PRINT);
		file_put_contents('members.json', $data);
		header('location: home.php');
	}
?>
</body>
</html>