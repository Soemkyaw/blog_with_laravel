<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php foreach ($blogs as $blog) : ?>
        <h1><a href="blogs/<?= $blog->slug?>"><?= $blog->title ?></a></h1>
        <p><?= $blog->show ?></p>
    <?php endforeach ?>
</body>
</html>
