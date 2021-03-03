<?php
    include_once 'connection.php'
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php
        $sql = "SELECT * FROM policies;";
        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo $row['customer_name'] . "<br>";
            }
        }
    ?>
</body>
</html>