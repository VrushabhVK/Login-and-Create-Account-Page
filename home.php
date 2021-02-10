<?php require_once "controllerUserData.php"; ?>
<?php 
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
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">E-Voting System</a>
    <button type="button" class="btn btn-light">
      <a href="login-user.php">Logout</a>
      </button>
<center>
<ul>
<li><a class="active" href="home.php">Home</a></li>
<li><a href="Election.php">Election</a></li>
<li><a href="result.php">Result</a></li>
<li><a href="Nomination.php">Nomination</a></li>
</ul>
</nav>
</center>
    <!-- <h2>Welcome <?php echo $fetch_info['name'] ?></h2> -->
</body>
</html>