<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
	<title>Home</title>
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
		span{
			text-align: right;
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
					>Add Student</h4>
					<div class="card-content">
						<form method="POST" class="row">
							<div class="filds">
								<input type="text" placeholder="id" name="id">
								<label for="">ID</label>
								<span id="iderror" style="display:none;color:red; margin-bottom:-10px;">your fild id error!</span>
							</div>
							<div class="filds">
								<input type="text" placeholder="First name" name="fname">
								<label for="">First Name</label>
								<span id="ferror" style="display:none;color:red; margin-bottom:-10px;">your fild name error!</span>
							</div>
							<div class="filds">
								<input type="text" placeholder="Last name" name="lname">
								<label for="">Last Name</label>
								<span id="lerror" style="display:none;color:red; margin-bottom:-10px;">your fild name error!</span>
							</div>
							<div class="filds">
								<input type="password" placeholder="Password" name="pass" id="pass">
								<label for="">Password</label>
								<span id="passerror" style="display:none;color:red; margin-bottom:-10px;">your fild name error!</span>
							</div>
							<div class="filds">
								<input type="password" placeholder="Re password" id="repass">
								<label for="">Repassword</label>
								<span id="repasserror" style="display:none;color:red; margin-bottom:-10px;">Password not match!</span>
							</div>
							<div class="filds">
								<select name="sex" id="">
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="filds">
								<input type="text" placeholder="Phone Number" name="phone">
								<label for="">Phone Number</label>
								<span id="perror" style="display:none;color:red; margin-bottom:-10px;">your fild phone number error!</span>
							</div>
							<div class="filds">
								<input type="email" placeholder="Email" name="email">
								<label for="">Email</label>
								<span id="eerror" style="display:none;color:red; margin-bottom:-10px;">your fild email error!</span>
							</div>
							<div class="filds">
								<select name="group" id="">
									<option value="GIC-I1">GIC-I1</option>
									<option value="GIC-I2">GIC-I2</option>
									<option value="GIC-I3" selected>GIC-I3</option>
									<option value="GIC-I4">GIC-I4</option>
									<option value="GIC-I5">GIC-I5</option>
								</select>
							</div>
								<span id="iderror" style="display:none;color:red">Account have already!</span>
								<span id="true" style="display:none;color:blue">Account add success!</span>
								<input type="submit" class="btn btn-success pull-right" id="save" name="save" value="Add Student"/>
								<a style="margin-top:20px" type="button" class="btn btn-primary pull-left" href="home.php">Back</a>
								<!-- <div class="clearfix"></div> -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	if(isset($_POST['save'])){
		$data = file_get_contents('members.json');
		$data_test = json_decode($data,true);
		$input = array(
			'id' => $_POST['id'],
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'pass' => $_POST['pass'],
			'sex' => $_POST['sex'],
			'phone' => $_POST['phone'],
			'email' => $_POST['email'],
			'group' => $_POST['group']
		);
		$pass = "<script>document.getElementById('pass').value</script>";
		$repass = "<script>document.getElementById('repass').value</script>";
		if(empty($_POST['id'])){
			echo "<script>document.getElementById('iderror').style.display='block';</script>";
		}
		if(empty($_POST['fname'])){
			echo "<script>document.getElementById('ferror').style.display='block';</script>";
		}
		if(empty($_POST['lname'])){
			echo "<script>document.getElementById('lerror').style.display='block';</script>";
		}
		if(empty($_POST['phone'])){
			echo "<script>document.getElementById('perror').style.display='block';</script>";
		}
		if(empty($_POST['email'])){
			echo "<script>document.getElementById('eerror').style.display='block';</script>";
		}
		if($repass!=$pass){
			echo "<script>document.getElementById('repasserror').style.display='block';</script>";
		}else{
			foreach ($data_test as $key) {
				if($key['id']==$_POST['id']){
					echo "<script>document.getElementById('iderror').style.display='block';</script>";
					// break;
				}else{
					$data_test[] = $input;
					$data_to = json_encode($data_test,JSON_PRETTY_PRINT);
					file_put_contents('members.json', $data_to);
					header('location: home.php');
					// break;
				}
			}
		}
	}
?>
</body>
</html>