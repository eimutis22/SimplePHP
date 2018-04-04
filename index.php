
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
        <h3>Register</h3>
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
            // echo "Username: ".$username."<br>Email: ".$email."<br>Hash: ".$pass_hash;

            echo "<hr>";



            InsertIntoDB($username, $email, $pass_hash);


            $sql = "SELECT ID FROM UserTbl WHERE Email = $email";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            function InsertIntoDB($u, $e, $p){

                if(isset($_REQUEST["username"])) {
                    // echo $username;
                    $db_servername = "localhost";
                    $db_username = "root";
                    $db_password = "root";
                    $db_dbname = "GuestDB";
                    
                    // Create connection
                    $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
                    // Check connection
                    if ($conn->connect_error) 
                        die("Connection failed: ".$conn->connect_error);
                    
                    
                    $sql = "INSERT INTO UserTbl (ID, Username, Email, Password)
                            VALUES (2, '$u', '$e', '$p')";
                    
                    if ($conn->query($sql) === TRUE)
                        echo $u." registered!";
                    else 
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    
                    
                    $conn->close();
                    unset($_POST['username']);
                }

            }

        ?>




    </div>

    </body>
</html>