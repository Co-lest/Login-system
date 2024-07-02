<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $namePerson = $_POST["namePerson"];
        $userName = $_POST["userName"];
        $pass = $_POST["pass"];
        $passConfirm = $_POST["passConfirm"];

        try{
            if (empty($namePerson) || empty($userName) || empty($passConfirm) || empty($pass)) {
                throw new Exception("You did not fill out all the expected fields!");
                header("Location: ../manager.html");
            }
        } catch (Exception $t) {
            echo $t->getMessage();
            header("Location: ../index.html");
            die();
        }

        try {
            require_once "connect.inc.php";

            $query = "INSERT INTO `login_table` (`name`, `user_name`, `password_`) VALUES
            (?, ?, ?);";

            $stmt = $pdo->prepare($query);
            $stmt->execute([$namePerson, $userName, $pass]);

            $pdo = null;
            $stmt = null;

            header("Location: ../index.html");
            die();

        } catch (PDOException $th) {
            header("Location ../index.html");
            die("Query failed: {$th->getMessage()}");
        }
    } else {
        header("Location: ../index.html");
    }
