<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['user_id'];
    
    $name=$_POST['name'];
    $email=$_POST['email'];    
    
    // checking empty fields
    if(empty($name) || empty($email)) {    
            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $sql = "UPDATE users SET name=:name, email=:email WHERE user_id=:id";
        $query = $dbConn->prepare($sql);
                
        $query->bindparam(':id', $id);
        $query->bindparam(':name', $name);
        $query->bindparam(':email', $email);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$sql = "SELECT * FROM users WHERE user_id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
 
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    $id = $row['user_id'];
    $name = $row['name'];
    $email = $row['email'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="user_id" value=<?php echo $id; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
