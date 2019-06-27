<?php
	//get the index from URL
	$index = $_GET['index'];
	//get json data
	$data = file_get_contents('members.json');
	$data_array = json_decode($data);
	//assign the data to selected index
	$row = $data_array[$index];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JSON_CRUD</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
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
		.s30{
			width:30px;
		}
	</style>
</head>
<body>
	<div class="content">
		<div class="container-fluid my-posi">
			<div class="gray">
				<div class="card container-fluid bg-white">
					<div style="
						text-align:center;
						box-shadow: 0px 1px 5px 3px gray;
						padding: 10px 20px;
						border-radius: 10px;
						margin-bottom: 10px;
					">
						<h4 style="margin:5px 0px 0px 0px">View User</h4>
						<small style="margin:0px 0px -10px 0px">This user is : <span style="color:blueviolet"><?php echo $row->role?></span></small>
					</div>	
					<div class="card-content">
						<table style="width:100%">
							<tr>
								<td for="">ID</td>
								<td class="s30">:</td><td><?php echo $row->id;?></td>
							</tr>
							<tr>
								<td for="">First Name</td>
								<td class="s30">:</td><td><?php echo $row->firstname;?></td>
							</tr>
							<tr>
								<td for="">Last Name</td>
								<td class="s30">:</td><td><?php echo $row->lastname;?></td>
							</tr>
							<tr>
								<td for="">Sex</td>
								<td class="s30">:</td><td><?php echo $row->sex;?></td>
							</tr>
							<tr>
								<td for="">Phone Number</td>
								<td class="s30">:</td><td><?php echo $row->phone;?></td>
							</tr>
							<tr>
								<td for="">Email</td>
								<td class="s30">:</td><td><?php echo $row->email;?></td>
							</tr>
							<tr>
								<td for="">Group</td>
								<td class="s30">:</td><td><?php echo $row->group;?></td>
							</tr>
							<tr>
								<td>
									<a type="button" class="btn btn-primary pull-left" href="home.php" style="margin-top:20px">Back</a>
								</td>
							</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>