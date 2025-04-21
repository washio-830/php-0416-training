<!-- views/errors/update_error.php -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ERROR</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h2>ERROR</h2>
    <?php foreach ($errors as $error): ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endforeach; ?>
    <a href="/php-0416-training/views/edit.php"><button>戻る</button></a>
</body>

</html>