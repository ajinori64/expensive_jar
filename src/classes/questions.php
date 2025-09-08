<?php
require_once __DIR__ . '/db.php';
class Questions extends Db {
    public function getQuestion(int $number): array
    {
        $sql = "SELECT * from questions WHERE number = ?";
        $stmt = $this->query($sql, [$number]);
        $result = $stmt->fetch();

        return $result;
    }
}