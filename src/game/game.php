<?php
require_once __DIR__ . '/../classes/questions.php';
$questions = new Questions();
// $numberは問題番号で、スタート画面からは「1」を、解答画面で次からの問題を渡す
$number = $_POST['number'];
$cur_score = $_POST['cur_score'];
$items = $questions->getQuestion($number);
$answer = $items['answer'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/game.css?<?php echo date('YmdHis'); ?>"/>
    <title>ゲーム画面</title>
</head>
<body>
    <div class="question_number_area">
        <?php
        // 問題番号
        echo "<b>Q No.{$items['number']}</b><br>";
        ?>
    </div>
    <div class="sentence_area">
        <?php
        // 問題文
        echo $items['sentence'];
        ?>
    </div>

    <div class="code_area">
        <div class="code_num_area">
            <?php
            // 行番号を出力
            $str = str_replace(array("\r\n", "\r", "\n"), "\n", $items['body']);
            $code = explode("\n", $str);
            $i = 1;

            echo '<pre>';
            foreach ($code as $row) {
                echo "<code>{$i}</code><br>";
                $i++;
            }
            echo '</pre>';
            ?>
        </div>
        <?php
        // 問題コードの出力
        echo '<pre class="code_body_area">';
        foreach ($code as $row) {
            echo "<code class='code_row'>{$row}</code><br>";
        }
        echo '</pre>';
        ?>
    </div>
        <form action="../score/mark.php" method="post">
            <div class="answer_radio">
                <div class="first_row">
                    <div class="first_column">
                        <?php echo "<input type='radio' name='number' value='1' class='radio_num' required>{$items['choice_one']}";?>
                    </div>
                    <div class="second_column">
                        <?php echo "<input type='radio' name='number' value='2' class='radio_num' required>{$items['choice_two']}";?>
                    </div>
                </div>
                <div class="second_row">
                    <div class="first_column">
                        <?php echo "<input type='radio' name='number' value='3' class='radio_num' required>{$items['choice_three']}";?>
                    </div>
                    <div class="second_column">
                        <?php echo "<input type='radio' name='number' value='4' class='radio_num' required>{$items['choice_four']}";?>
                    </div>
                </div>
            </div>
            <input type="hidden" name="cur_score" value="<?= $cur_score?>">
            <input type="hidden" name="answer" value="<?= $answer?>">
            <input type="hidden" name="q_number" value="<?= $items['number']?>">
            <div class="foot_button_area">
                <input type="submit" class="answer_button" value="答える">
            </div>
        </form>
</body>
</html>