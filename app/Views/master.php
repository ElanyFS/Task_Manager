<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/bed932eb60.js" crossorigin="anonymous"></script>

    <title><?= $this->e($title) ?></title>
</head>

<body>
    <?php require "includes/header.php"; ?>
    <main>
        <?= $this->section('content') ?>
    </main>

    <?php require "includes/footer.php"; ?>

</body>

</html>