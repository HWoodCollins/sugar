<!DOCTYPE html>
<html>
<title>Tuck</title>
    
</head>
<body>
    <h1>Order history</h1>
    
       
    <?php
    include_once('connection.php');
    session_start();
        $stmt = $conn->prepare("SELECT * FROM tblorders WHERE UserID=:userid ORDER by dateoforder DESC");
        $stmt->bindParam(':userid', $_SESSION["loggedinID"]);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {echo'<form action="examineorder.php" method="post">';
                
                $date = date("d/m/Y", strtotime($row["Dateoforder"]));
                $time = date("H:i:s", strtotime($row["Dateoforder"]));
                echo("Order number ".$row["OrderID"].' on '.$date." at ".$time." ");
                echo("<input type='submit' value='View Order'><input type='hidden' name='OrderId' value=".$row['OrderID']."><br></form>");
                
            }
        }else{
            echo("none<br>");
        }
    
    ?>
    </table>
    <br>
    <a href="menu.php">Back to menu</a>
</body>
</html>