<html>
<title>Tuck Shop</title>
</head>
<body>

<form action="basket.php" method="POST">

	<select name = "item">
		<?php
			include_once('connection.php');
			$stmt = $conn->prepare("SELECT * FROM Tbltuck  WHERE Quantity>0 ORDER BY Name ASC");
			$stmt->execute();

			while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
			{
				echo('<option value='.$row["TuckID"].'>'.$row["Name"].'</option>');
			}
		?>
	</select>

    Quantity:<input type="int" name="quantity"><br>
	
	<input type="submit" value="Add to Basket">

</form>

</body>
</hmtl>