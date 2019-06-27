
<!doctype html>
<html lang="en">
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
	</style>
</head>
<body>
	<form action="" method="POST">
		<div class="content">
			<div class="container-fluid my-posi">
				<div class="gray">
					<div class="card container-fluid bg-white">
						<h4 style="
							text-align:center;
							box-shadow: 0px 1px 5px 3px gray;
							padding: 10px 20px;
							border-radius: 10px;"
						>LogIn</h4>
						<div class="card-content">
							<form method="POST" class="row">
								<div class="filds">
									<input type="text" placeholder="id" name="id">
									<label for="">ID</label>
									<span id="iderror" style="display:none;color:red">Unknow this ID!</span>
								</div>
								<div class="filds">
									<input type="password" placeholder="Password" name="pass" id="pass">
									<label for="">Password</label>
									<span id="passerror" style="display:none;color:red">Your password is not match!</span>
								</div>
								<input type="submit" class="btn btn-success pull-right" name="login" value="SigIn"/>
								<p style="color:red;display:none" id="logerror">Do you have account? <a href="signup.php" style="color:blue">Sign Up</a></p>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		<?php
			if(isset($_POST['login'])){
				$data = file_get_contents('members.json');
				$data_test = json_decode($data,true);
				$test_user = file_get_contents('user.json');
				$user_test = json_decode($test_user,true);
				for ($i=0; $i < count($data_test); $i++){
					if($data_test[$i]['id']==$_POST['id']&&$data_test[$i]['role']=='admin'){
						$user = 'admin';
						if ($data_test[$i]['pass']==$_POST['pass']) {
							$fname = $data_test[$i]['firstname'];
							$lname = $data_test[$i]['lastname'];
							$email = $data_test[$i]['email'];
							$test_data_user = array(
								'id' => $_POST['id'],
								'firstname' => $fname,
								'lastname' => $lname,
								'email' => $email,
								'role' => $user
							);
							$to_json = json_encode($test_data_user);
							$first = str_replace('{','[{',$to_json);
								$last = str_replace('}','}]',$first);
								file_put_contents('user.json', $last);
							header('location: home.php');
						}else{
							echo '<script>
								document.getElementById("passerror").style.display="block";
							</script>';
						}
					}else{
						$user = 'user';
						if ($data_test[$i]['pass']==$_POST['pass']&&$data_test[$i]['id']==$_POST['id']) {
							$test_data_user = array(
								'id' => $_POST['id'],
								'firstname' => $data_test[$i]['firstname'],
								'lastname' => $data_test[$i]['lastname'],
								'email' => $data_test[$i]['email'],
								'role' => $user
							);
							$to_json = json_encode($test_data_user);
							$first = str_replace('{','[{',$to_json);
							$last = str_replace('}','}]',$first);
							file_put_contents('user.json', $last);
							header('location: home.php');
						}else{
							echo '<script>
								document.getElementById("passerror").style.display="block";
								document.getElementById("logerror").style.display="block";
							</script>';
						}
					}
				}
			}
		?>
    </body>
</html>