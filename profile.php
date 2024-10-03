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
    <div class="top_vanger">
        <div class="opt">
            <div class="logo"></div>
            <div class="opt1">
                <h1>Welcome to our site, shizoid</h1>
            </div>
        </div>
        <div class="opt">
            <div class="opt2">
                <h2>Господа, мне нравится война.</h2>
                <h2>Господа, мне нравится война.</h2>
                <h2>Господа, я люблю войну!</h2>
                <p>Люблю геноцид, люблю блицкриг, люблю наступление, люблю оборону, люблю осады, 
                люблю прорывы, люблю отступления, люблю зачистки, люблю поражения. На полях, на улицах, 
                в окопах, на равнинах, в тундре, в пустыне, на море, в небе, 
                в грязи, в болоте. Я искренне люблю все виды войны, которые 
                можно устроить на этой планете!</p>
                <p>Люблю оглушительный грохот артиллерии, разрывающей построения противника на части. 
                Когда вражеские тела взлетают в воздух, а потом мелкими кусочками сыплются на землю – 
                моё сердце поёт! Люблю, когда наш «Тигр» с его 88-ми миллиметровым орудием... сходится 
                с вражеским танком! До чего же приятное чувство, когда они выпрыгивают из танка, 
                чтобы погибнуть под огнём!</p>
                <p>Люблю, когда пехота бросается на вражеские ряды в штыковую атаку. Меня трогает вид 
                новобранцев, испуганно тыкающих штыками снова и снова в тело давно мёртвого врага. 
                А вид повешенного на столбе дезертира вызывает странное возбуждение. 
                И до чего же восхитительно визжат вражеские пленные, в унисон с визгом пулемёта, 
                которым я их выкашиваю.</p>
            </div>
            <div class="opt_all">
                <div class="opt5">Софьин Н.Д.</div>
                <div class="major"></div>
                <div class="bebs"></div>
                <div class="opt3">
                    <input placeholder="Вопросы?" type="text" style="width: 100%;"></input>
                </div>
            </div>
        </div>
        <div id="button-2"></div>
        <div id="image-new">
        <img id="umagik" src="css/image/duck.png" alt="HoHO" style="display:none;">
        </div>
    </div>
        <div class="posts">
        <div class="opt-post">
            <div class="opt-6">
                <h1 class="hello">
                    Приветствую, <?php echo $_COOKIE['User']; ?>
                </h1>
            </div>
            <div class="opt-6">
                <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                    <input type="text" class="form" type="text" name="title" placeholder="Шапка поста">
                    <textarea name="text" cols="30" rows="10" placeholder="Оформление пасты/бугурта"></textarea>
                    <input type="file" name="file" /><br>
                    <button type="submit" class="btn_red" name="submit">Сохранить пост!</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
require_once('bd.php');
$link = mysqli_connect('127.0.0.1', 'root', '12345', 'tsar_bd');

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($link, $_POST['title']);
    $main_text = mysqli_real_escape_string($link, $_POST['text']);

    if (!$title || !$main_text) {
        die ("Заполните все поля");
    }

    $file_path = null; 
   
    if (!empty($_FILES["file"]["name"]) && (
        $_FILES["file"]["type"] == "image/gif" ||
        $_FILES["file"]["type"] == "image/jpeg" ||
        $_FILES["file"]["type"] == "image/jpg" ||
        $_FILES["file"]["type"] == "image/pjpeg" ||
        $_FILES["file"]["type"] == "image/x-png" ||
        $_FILES["file"]["type"] == "image/png") &&
        $_FILES["file"]["size"] < 102400) {

        $upload_dir = "upload/";
        $file_name = basename($_FILES["file"]["name"]);
        $file_path = $upload_dir . $file_name;

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $file_path)) {
            die("Ошибка загрузки файла!");
        }
    }

    $sql = "INSERT INTO posts (title, main_text, image_path) VALUES ('$title', '$main_text', '$file_path')";
    if (mysqli_query($link, $sql)) {
        echo "Пост и файл успешно загружены!";
    } else {
        echo "Ошибка при сохранении данных в базе: " . mysqli_error($link);
    }
}
?>
