<?php
// DBサーバへの接続
class Db {
    protected $pdo;

    // コンストラクタ
    public function __construct(){
        $dsn = 'mysql:dbname=jar01_db;host=mysql;charset=utf8';
        $user = 'root';
        $password = 'root';

        try {
            $this->pdo = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            // 接続できなかった際のエラーメッセージ
            exit("データベースに接続できませんでした: {$e->getMessage()}");
        }
    }

    // SELECT文実行用
    protected function query(string $sql, array $array_params): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array_params);
        
        return $stmt;
    }

    // INSERT, UPDATE, DELETE文実行用
    protected function exec(string $sql, array $array_params): PDOStatement
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($array_params);

        return $stmt;
    }
}

?>