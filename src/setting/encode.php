<?php
function e(string $str, string $charset = 'UTF-8'): string {
    /* 
    XSS対策のため、HTMLエスケープを行う
    $string        : 対象文字列、
    $flags         : 設定値(複数項目は「|」を用いる)、
    $encoding      : 文字エンコーディング
    $double_encode : HTMLエンティティ($xx;)を二重エスケープするか
    */
    return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset, false);
}

?>