<?php
require_once __DIR__ . '/db.php';
class scoreList extends Db {

    // テーブルの中身を取り出す
    public function getScore(): array
    {
        $sql = "SELECT * from score_list";
        $stmt = $this->query($sql, []);
        $result = $stmt->fetchAll();

        return $result;
    }

    // テーブルにデータを追加する
    public function addScore(int $score, string $name): void
    {
        $sql = "INSERT INTO score_list (score, name) VALUES (?, ?)";
        $this->exec($sql, [$score, $name]);
    }
}