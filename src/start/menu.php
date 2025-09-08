<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/startmenu.css?<?php echo date('YmdHis'); ?>"/>
    <title>タイトル画面</title>
</head>
<body>
    <div class="title_text">
        <h1>Error is Our Friend</h1>
    </div>
    <div class="start_button_area">
        <form action="../game/game.php" method="post">
            <div class="level_radio">
                <input type="radio" name="level" value="basic" class="level" checked>basic
                <input type="radio" name="level" value="normal" class="level">normal
            </div>
            <input type="hidden" name="number" value="1">
            <input type="hidden" name="cur_score" value="0">
            <input type="submit" class="start_button" value="はじめる">
        </form>
    </div>
    <div class="score_button_area">
        <form action="../score/list.php" method="post">
            <input type="submit" class="score_button" value="スコアをみる">
        </form>
    </div>
</body>
</html>