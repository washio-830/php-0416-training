<h1>ToDo新規作成</h1>

<form id="createForm" action="/php-0416-training/controllers/CreateController.php" method="POST">
    <label>
        タイトル（<span id="titleLength">0</span>/<?= htmlspecialchars($maxTitleLength, ENT_QUOTES, 'UTF-8') ?>文字）：
    </label><br>
    <input type="text" name="title" id="titleInput" required><br><br>

    <label>
        内容（<span id="contentLength">0</span>/<?= htmlspecialchars($maxContentLength, ENT_QUOTES, 'UTF-8') ?>文字）：
    </label><br>
    <textarea name="content" id="contentInput" rows="4" cols="40" required></textarea><br><br>

    <input type="submit" id="submitBtn" value="作成">
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

    // 初期表示時チェック
    document.addEventListener('DOMContentLoaded', () => {
        updateLengthDisplay(titleInput, titleLength, maxTitle);
        updateLengthDisplay(contentInput, contentLength, maxContent);
    });

    titleInput.addEventListener('input', () => {
        updateLengthDisplay(titleInput, titleLength, maxTitle);
    });

    contentInput.addEventListener('input', () => {
        updateLengthDisplay(contentInput, contentLength, maxContent);
    });
</script>
