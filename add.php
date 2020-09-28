<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
        
    // checking empty fields
    if(empty($name) || empty($email) || empty($password)) {
                
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($password)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database        
        $sql = "INSERT INTO users(name, email , password) VALUES(:name, :email, :password)";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':name', $name);
        $query->bindparam(':email', $email);
        $query->bindparam(':password', $password);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':name' => $name, ':email' => $email, ':password' => $password));
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>