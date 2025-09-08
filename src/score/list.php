<?php
require_once "../classes/scoreList.php";
require_once "../setting/encode.php";

$scoreList = new scoreList();
// スコア一覧を取得して表示する
$list = $scoreList->getScore();
$questions_all = 10;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/list.css?<?php echo date('YmdHis'); ?>"/>
    <title>スコア表</title>
</head>
<body>
    <div class="title_text">
        <h1>最新スコア</h1>
    </div>
    <div class="score_list_area">
<?php
        // score_listから、最新の5件のデータを取得する
        $list_count = count($list);
        $j = 0;
        for ($i = ($list_count-1); $i >= ($list_count-5); $i--) {
            $cur_list[$j] = $list[$i];
            $j++;
        }

        // 最新のスコアを表示する
        foreach ($cur_list as $items) {
            echo "<div class='score_block_area'>";
            
            echo "得点の記録: {$items['score']}/{$questions_all}<br>";
            // エスケープ処理を行いただの文字列として表示
            echo "ニックネーム: " . e($items['name']) . "<br>";
            echo "登録した時刻: {$items['score_at']}<br>";
        
            echo "</div>";
        } 
?>
    </div>
    
    <div class="menu_button_area">
        <input type="button" onclick="location.href='../start/menu.php'" value="もどる" class="title_button">
    </div>

</body>
</html>