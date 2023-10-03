<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buenas soy index admin</h1>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) ): ?>
        <?php echo 'HOLA' ?>
        <?php echo ($_POST['justword'])?>
    <?php else: ?>
        <?php var_dump($_GET) ?>
    <?php endif; ?>

    <form action="http://localhost/proyectos/Moises/Php/SparkMVC/index.php" method="post">
        <input type="text" name="justword">
        <input type="submit" value="enviar">
    </form>

    <h1><?= $name ?></h1>

    <?php foreach($colours as $color):?>
        <h2><?= $color ?></h2>
    <?php endforeach; ?>

    <form action="" method="post"></form>
</body>
</html>