 <?php
 include 'config.php';
if(isset($_POST['login']))
{    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $dbConn->prepare("SELECT user_id FROM users WHERE (u_name=:email OR email=:email) AND password=:password");
            $query->bindParam("u_name", $email, PDO::PARAM_STR);
$enc_password = hash('sha256', $password);
$query->bindParam("password", $enc_password, PDO::PARAM_STR);
            var_dump($query);           
$query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);


    //redirectig to the display page. In our case, it is index.php
    header("Location: index.php");
            }
}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LogIn || CRUD</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Login Form CRUD</h2>

<form action="" method="post">

  <div class="container">
    <label for="mail"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <input type="submit" value="Login" id="btn" name="login" onclick="doValidate()">  
  </div>
</form>
<script src = "jquery.js"></script>
<script src = "ass.js"></script>
</body>
</html>
