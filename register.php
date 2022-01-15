<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="login" />
        <input type="password" name="password" />
        <input type="submit" />
    </form>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "logowanko";

    if(isset($_SESSION["logged"])){
        echo "<script> location.href = 'index.php'</script>";
    }


    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn) {
        if (!empty($_POST["login"]) && !empty($_POST["password"])) {
            $login = $_POST["login"];
            $pass = hash("sha512",$_POST["password"]);
            $query = "INSERT INTO users VALUES ('','$login', '$pass');";
            $result = mysqli_query($conn, $query);
           
           
            if ($result) {
                echo "<script> location.href = 'login.php'</script>";
              }

            mysqli_close($conn);
        }
    }

    ?>
</body>

</html>