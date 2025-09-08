<?php
// スコアを表示する画面
// DBにスコアを保存するための、あたらしいテーブルを作成する
$result_score = $_POST['result_score'];
$questions_all = 10;


// ニックネームを入力させて保存する
// 保存したら、スコアリストのページに遷移させる
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/score.css?<?php echo date('YmdHis'); ?>"/>
    <title>気になるスコア</title>
</head>
<body>
    <div class='result_score'>
        <h1>score:<?= $result_score?>/<?= $questions_all?></h1>
    </div>
    <div class="score_add_area">
        <form action="addScore.php" method="post">
            <div class="text_area"><b>ニックネームを入力</b></div>
            <div class="text_input_area">
                <input type="text" name="input_name" class="input_text" required>
            </div>
            <input type="hidden" name="result_score" value="<?= $result_score?>">
            <div class="save_button_area">
                <input type="submit" name="list_button" value="スコアを保存" class="save_button">
            </div>
        </form>
        <div class="through_button_area">
            <input type="button" onclick="location.href='../start/menu.php'" value="保存せず終了" class="through_button">
        </div>
    </div>
</body>
</html>
