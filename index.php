<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/controllers/TodoController.php';
$todoCount = count($todos);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ToDo一覧</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .error {
            color: red;
            margin: 1em 0;
        }
    </style>
</head>

<body>