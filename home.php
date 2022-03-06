<?php 
require_once "controllerUserData.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    html,body{
        background: #151515;
        font-family: 'Poppins', sans-serif;
    }
    .Main{
        position: absolute;
        color: #868686;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    .button{
        color: #868686;
        background: linear-gradient(#333,#222);
        margin-top: 30px;
        border-radius: 5px!important;
        font-weight: 600;
        letter-spacing: 1px;
        cursor: pointer;
        border-radius: 0 5px 5px 0;
        border: 1px solid #444;
        outline: none;
        font-size: 19px;
        height: 50px;
        width: 150px;
    }
    .button:hover{
        color: #339933;
        border: 1px solid #339933;
        box-shadow: 0 0 5px rgba(0,255,0,.3),
                    0 0 10px rgba(0,255,0,.2),
                    0 0 15px rgba(0,255,0,.1),
                    0 2px 0 black;
    }
    </style>
</head>
<body>
    <div class="Main">
        <h1>Welcome <?php echo $fetch_info['username'] ?></h1>
        <form action="logout-user.php" method="POST" autocomplete="">
            <input type="submit" class="button" value="Logout">
        </form>
    </div>
</body>
</html>