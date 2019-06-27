<?php
    $find_user = file_get_contents('user.json');
    $data_user = json_decode($find_user,true);
    $user = $data_user[0]['role'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Home</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>
    <style>
        thead{
            background: #26a96a;
        }
        .table-responsive{
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .fixed_headers{
            position: 
        }
        #user{
            display: none;
        }
        .profile{
            box-shadow: 0px 0px 5px 3px gray;
            border: 1px solid white;
            margin-left:5px;
            margin-right:5px;
            margin-top: 20px;
            border-radius: 5px;
            padding: 5px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="card-content table-responsive">
            <div class="profile">
                <span for="">Name : <?php echo $data_user[0]['firstname']?></span>
                <span for=""> <?php echo $data_user[0]['lastname']?></span><br>
                <span for="">Email : <?php echo $data_user[0]['email']?></span>
            </div>
            <table class="fixed_headers">
                <a class="btn btn-danger pull-right" href="index.php">Log Out</a>
                <a class="btn btn-primary pull-right" href="add.php">Add</a>
                <thead>
                    <tr>
                        <th style='width:30px'>N</th>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Sex</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Group</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data = file_get_contents('members.json');
                        $data = json_decode($data);
                        $index = 0;
                        foreach ($data as $value) {
                            echo "<tr>
                                    <td>".$index."</td>
                                    <td>".$value->id."</td>
                                    <td>".$value->firstname."</td>
                                    <td>".$value->lastname."</td>
                                    <td>".$value->sex."</td>
                                    <td>".$value->phone."</td>
                                    <td>".$value->email."</td>
                                    <td>".$value->group."</td>".'
                                    <td style="width:155px">
                                        <a class="btn btn-info" href="view.php?index='.$index.'">View</a>
                                        <a class="btn btn-primary" href="edit.php?index='.$index.'">Edit</a>
                                        <a class="btn btn-danger" id="'.$user.'" href="delete.php?index='.$index.'">Delete</a>
                                    </td>
                                </tr>';
                            $index++;
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>