<?php
require_once __DIR__ . '/../classes/questions.php';
$questions = new Questions();

// 正常なアクセスかどうかチェック
if (!$_POST) {
    // 正常ではない

    // maigo.phpにリダイレクト
    header("Location: ../setting/maigo.php");
} else {
    // 正常である

    // 受信した各データを取りだす
    $q_number = $_POST['q_number'];
    $number = $_POST['number'];
    $answer = $_POST['answer'];
    $cur_score = $_POST['cur_score'];

    // 問題数
    $questions_all = 10;
    // 次の問題番号
    $next_q_number = $q_number + 1;

    // 不正解用のヒントを取り出す
    $items = $questions->getQuestion($q_number);
    $hint = $items['hint'];

    // 問題の解答解説を取り出す
    $ans_comment = explode("\n", $items['ans_comment']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mark.css?<?php echo date('YmdHis'); ?>"/>
    <title>解答と解説</title>
</head>    
<body>
    <div class="sentence_area">
<?php
    if ( $answer == $number ) {
        // 正解の場合
        $cur_score++;
?>
        <div class="result_initial_success">
            <h1>正解!!</h1>
        </div>
        <div class="answer_point_area">
<?php
            // 改行ごとに、Point{$i}と表示する
            $i = 1;
            foreach ($ans_comment as $row) {
                echo "<div class='answer_point_row'>Point{$i}: {$row}</div><hr>";
                $i++;
            }
?>
        </div>    
<?php
    }
    else {
        // 不正解の場合
?>
        <div class="result_initial_fail">
            <h1>不正解...</h1>
        </div>
        <div class="hint_area">
<?php
            // ヒントを表示する
            echo "ヒント: $hint";
    }
?>
        </div>
    </div>
  
    <div class="button_area">
<?php
    // 用意した問題数の範囲内である
    // ※ 現在は10問くらいにする予定で、できればランダムに問題を表示したい
    if ($items['number'] < $questions_all) {
?>
        <form action="../game/game.php" method="post">
            <input type="hidden" name="number" value="<?= $next_q_number?>">
            <input type="hidden" name="cur_score" value="<?= $cur_score?>">
            <input type="submit" class="next_button" value="次の問題へ">
        </form>
<?php
    } else {
        // 用意した問題数に到達した
?>
        <form action="score.php" method="post">
            <input type="hidden" name="result_score" value="<?= $cur_score?>">
            <input type="submit" class="score_button" value="スコアを表示">
        </form>
    </div>
<?php
    }
?>
    
<?php    
}
?>
</body>
</html>