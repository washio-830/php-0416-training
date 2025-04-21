<h1>ToDo新規作成</h1>
<form action="/php-0416-training/controllers/Createcontroller.php" method="POST">
    <label>タイトル：</label><br>
    <input type="text" name="title" required><br><br>

    <label>内容：</label><br>
    <textarea name="content" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" value="作成">

</form>