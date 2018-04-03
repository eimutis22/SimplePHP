<html>
    <head>
        <title>SimplePHP</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>

<?php 
    require("include.php");
?>

    <div id="wrap">
        <form action="index.php" method="POST">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="password" name="password" placeholder="Password"><br>

            <input type="submit" value="Submit">
        </form>


        <?php 
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            setcookie("username", $username, time()+3600, "/","", 0);



            
            $pass_hash = password_hash($password, PASSWORD_DEFAULT);
            echo "Username: ".$username."<br>Email: ".$email."<br>Hash: ".$pass_hash;
            
        ?>

    </div>


    </body>
</html>


