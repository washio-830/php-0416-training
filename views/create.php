<h1>ToDo新規作成</h1>
<form action="/php-0416-training/controllers/CreateController.php" method="POST">
    <label>タイトル：</label><br>
    <input type="text" name="title" required><br><br>

    <label>内容：</label><br>
    <textarea name="content" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" value="作成">

    <?php
    $title = $_POST['title'];
    $content = $_POST['content'];
    $create_time = $_POST[date("Y/m/d H:i:s")];
    $update_time = $_POST[date("Y/m/d H:i:s")];
    $sql = 'INSERT INTO Todo(title,content,create_time,update_time) VALUES(?,?)';
    $stmt = $ddh->prepare($sql);
    $data[] = $staff_name;
    $data[] = $staff_pass;
    $stmt->execute($data);
    ?>

</form>