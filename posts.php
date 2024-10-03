<?php
$link = mysqli_connect('127.0.0.1', 'root', '12345', 'tsar_bd');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
$image_path = $rows['image_path']; 
?>

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
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <p><?php echo $main_text; ?></p>

        <?php
        if (!empty($image_path)) {
            echo "<img src='$image_path' alt='Картинка поста' style='max-width: 100%;'>";
        }
        ?>
    </div>
</body>
</html>
