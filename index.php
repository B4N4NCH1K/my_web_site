<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Софьин Н.Д.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwvykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/button.js"></script>
</head>
<body>
    <div class="Auto">
        <div class="subAuto">
            <div class="sub_opt">
            <?php
            if (!isset($_COOKIE['User'])) {
            ?>
                <h1>Залогинься</h1>
                <a href="/registration.php">Зарегистрируйтесь</a> или <a href="/login.php">войдите</a>!
            <?php
            } else {
                echo "<h1>Ваши бугурты</h1>";
                $link = mysqli_connect('127.0.0.1', 'root', '12345', 'tsar_bd');
                $sql = "SELECT * FROM posts";
                $res = mysqli_query($link, $sql);
                if (mysqli_num_rows($res) >  0) {
                while ($post = mysqli_fetch_array($res)) {
                    echo "<a href='/posts.php?id=" . $post["id"] . "'>" . $post['title'] . "</a>\n";
                }
               } else {
                    echo "Записей пока нет";
               }
               echo "<br><a href='/profile.php' class='btn btn-primary'>Вернуться обратно</a>";
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>
