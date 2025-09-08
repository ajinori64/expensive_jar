<?php
if (!$_POST) {
    // maigo.phpにリダイレクト
    header("Location: ../setting/maigo.php");
} else {
    require_once "../classes/scoreList.php";
    $scoreList = new scoreList();

    $input_name = $_POST['input_name'];
    $result_score = $_POST['result_score'];

    $scoreList->addScore($result_score, $input_name);

    header("Location: list.php");
}