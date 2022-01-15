<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <button onclick="deleteSession()">Log out</button>

    <?php

    echo $_SESSION["logged"];

    if(!isset($_SESSION["logged"])){
        echo "<script> location.href = 'login.php'</script>";
        
    }
    ?>

    <script>
        function deleteSession(){
            location.href = 'logout.php'
        }
    </script>
</body>

</html>