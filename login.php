<?php
include("header.php");
// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Проверяем, что параметр "userID" был передан в запросе
    if (isset($_POST["userID"])) {
        // Получаем значение параметра "userID" и экранируем его
        $userID = htmlspecialchars($_POST["userID"], ENT_QUOTES | ENT_HTML5);
        // Проверяем, что значение параметра является допустимым
        if (ctype_alnum($userID)) {
            // Устанавливаем куки с именем "userID" и значением, равным введенному пользователем значению
            setcookie("userID", $userID, time() + 86400, "/", "", false, true);
            // Перенаправляем пользователя на главную страницу сайта
            header("Location: index.php");
            exit();
        } else {
            // Выводим сообщение об ошибке, если значение параметра "userID" недопустимо
            echo "Значение User ID содержит недопустимые символы";
        }
    } else {
        // Выводим сообщение об ошибке, если параметр "userID" не был передан в запросеQ
        echo "Введите значение User ID";
    }
}
include("footer.php");
?>
