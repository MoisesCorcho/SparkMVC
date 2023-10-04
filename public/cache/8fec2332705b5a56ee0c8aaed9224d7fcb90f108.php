<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hi! I'm blade template and im working well. To prove that, just look, I'm gonna output a variable with my syntax</h1>
    <h2><?php echo e($test); ?></h2>
    <ul>
        <?php $__currentLoopData = $colours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($color); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html><?php /**PATH D:\MoisesHdd\XAMPP\htdocs\proyectos\Moises\Php\sparkMVC\resources\views/Home/index.blade.php ENDPATH**/ ?>