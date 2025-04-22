<h1>ToDo編集</h1>

<form id="editForm" action="/php-0416-training/controllers/UpdateController.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($todo->id) ?>">

    <label>
        タイトル（<span id="titleLength"><?= mb_strlen($todo->title) ?></span>/<?= $maxTitleLength ?>文字）：
    </label><br>
    <input type="text" name="title" id="titleInput"
        value="<?= htmlspecialchars($todo->title, ENT_QUOTES, 'UTF-8') ?>" required><br><br>

    <label>
        内容（<span id="contentLength"><?= mb_strlen($todo->content) ?></span>/<?= $maxContentLength ?>文字）：
    </label><br>
    <textarea name="content" id="contentInput" rows="4" cols="40" required><?= htmlspecialchars($todo->content, ENT_QUOTES, 'UTF-8') ?></textarea><br><br>

    <input type="submit" id="submitBtn" value="更新">
</form>

<style>
    .over-limit {
        color: red;
        font-weight: bold;
    }
</style>

<script>
    const titleInput = document.getElementById('titleInput');
    const contentInput = document.getElementById('contentInput');
    const titleLength = document.getElementById('titleLength');
    const contentLength = document.getElementById('contentLength');
    const submitBtn = document.getElementById('submitBtn');

    const maxTitle = <?= $maxTitleLength ?>;
    const maxContent = <?= $maxContentLength ?>;

    function updateLengthDisplay(input, display, max) {
        const len = input.value.length;
        display.textContent = len;
        if (len > max) {
            display.classList.add('over-limit');
        } else {
            display.classList.remove('over-limit');
        }
        checkFormValidity();
    }

    function checkFormValidity() {
        const isTitleValid = titleInput.value.length <= maxTitle;
        const isContentValid = contentInput.value.length <= maxContent;
        submitBtn.disabled = !(isTitleValid && isContentValid);
    }


    updateLengthDisplay(titleInput, titleLength, maxTitle);
    updateLengthDisplay(contentInput, contentLength, maxContent);

    titleInput.addEventListener('input', () => {
        updateLengthDisplay(titleInput, titleLength, maxTitle);
    });

    contentInput.addEventListener('input', () => {
        updateLengthDisplay(contentInput, contentLength, maxContent);
    });
</script>
