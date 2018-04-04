
<form action="comments.php" method="GET">
    <input type="text" name="comment" placeholder="Comment..">
    <input type="submit" value="Submit Comment">
</form>


<?php
    if(isset($_GET["comment"])) {

        $db_servername = "localhost";
        $db_username = "root";
        $db_password = "root";
        $db_dbname = "GuestDB";

        $conn = new mysqli($db_servername, $db_username, $db_password, $db_dbname);
        // Check connection
        if ($conn->connect_error) 
            die("Connection failed: ".$conn->connect_error);

        $comment = $_REQUEST['comment'];
        $commentID = rand(2,99999);

        $sql = "INSERT INTO CommentTbl (ID, Comment)
                VALUES ($commentID, '$comment')";

        if ($conn->query($sql) === TRUE)
            echo $comment." added!";
        else 
            echo "Error: " . $sql . "<br>" . $conn->error;


        $conn->close();

        unset($_GET['comment']);

    }


?>