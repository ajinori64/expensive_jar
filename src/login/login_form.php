<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログインページ</title>
    </head>
    <body>
        <h3>ログイン画面</h3>
        <div class="login_form">
            <form action="login_func.php" method="POST">
                <div class="login_name">
                    ユーザー名：<input type="text" name="user_name">
                </div>
                <div class="login_pass">
                    パスワード：<input type="password" name="user_pass">
                </div>
                <div class="login_button">
                    <input type="submit" value="ログイン">
                </div>
            </form>
        </div>
    </body>
</html>