<!DOCTYPE html>
<html>
<head>
    
    <title>Add Users</title>
    
</head>
<body>
       
    <form action="addusers.php" method = "post">
        Username:<input type="text" name="username"><br>
        First name:<input type="text" name="forename"><br>
        Last name:<input type="text" name="surname"><br>
        Password:<input type="password" name="password"><br>
        Balance:<input type="DEC" name="balance"><br>
        Year:<input type="text" name="year"><br>
        Role:<br>   
        <input type="radio" name="role" value="Pupil" checked> Pupil<br>
        <input type="radio" name="role" value="Admin"> Admin<br>
        <input type="submit" value="Add User">
        <br>
      </form>      

</body>
</html>

<?php
include_once('connection.php');

$stmt = $conn->prepare("SELECT * FROM TblUser");
$stmt->execute();
echo("<br>"."<br>");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{echo($row["Forename"].' '.$row["Surname"].' - £'.$row["Balance"]."<br>");}
?>

