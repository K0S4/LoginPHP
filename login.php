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
            $query = "SELECT * FROM users;";
            $result = mysqli_query($conn, $query);
            $userExist = false;

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                   if($row["login"] == $login && $row["pass"] == $pass){

                    echo "Logged";
                    $_SESSION["logged"] = $login;
                    $userExist = true;
                    unset($_POST);
                    echo "<script> location.href = 'index.php'</script>";
                   }

                }
                if(!$userExist){
                    echo "Niepoprawny login lob hasło";
                }

            } else {
                echo "Nie istnieje taki urzytkownik";
            }


            mysqli_close($conn);
        }
    }

    ?>
</body>

</html>