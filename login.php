<?php
include("header.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["userID"])) {
        $userID = htmlspecialchars($_POST["userID"], ENT_QUOTES | ENT_HTML5);
        if (ctype_alnum($userID)) {
            setcookie("userID", $userID, time() + 86400, "/", "", false, true);
            header("Location: index.php");
            exit();
        } else {
            echo "Значение User ID содержит недопустимые символы";
        }
    } else {
        echo "Введите значение User ID";
    }
}
include("footer.php");
?>
