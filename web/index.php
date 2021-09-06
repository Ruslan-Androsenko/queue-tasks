<?php
/**
 * https://ruseller.com/lessons.php?rub=37&id=2171
 */
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/styles.css" />

    <script src="/js/jquery.js"></script>
    <script src="/js/script.js"></script>

    <title>I want Pizza</title>
</head>
<body>
    <div class="content-wrapper">
        <h1>I want Pizza</h1>

        <div class="form-content">
            <form id="order_form" method="post">
                <input type="hidden" name="isAjax" value="true">

                <div class="input-form">
                    <label>Your Name:</label>
                    <input type="text" name="theName" placeholder="Write your name" required />
                </div>

                <div class="button-form">
                    <button type="submit">Awesome</button>
                </div>
            </form>

            <div class="response-wrapper">
                <div class="response-message"></div>
            </div>
        </div>
    </div>
</body>
</html>
