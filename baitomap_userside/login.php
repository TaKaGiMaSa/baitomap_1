<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>アカウント作成</title>
    <link href="https://unpkg.com/sanitize.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">
        <form action="login_session.php" method="POST">
            <h1>ログイン</h1>
            <p>次のフォームに必要事項をご記入ください。</p>
            <br>
 
            <div class="control">
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="username">
            </div>
 
            <div class="control">
                <label for="password">パスワード<span class="required">必須</span></label>
                <input id="password" type="password" name="password">
                <?php if (!empty($error["password"]) && $error['password'] === 'blank'): ?>
                    <p class="error">＊パスワードを入力してください</p>
                <?php endif ?>
            </div>
 
            <div class="control">
                <button type="submit" class="btn">ログイン</button>
            </div>
            <a href="signup.php">新規登録はこちら</a>
        </form>
    </div>
</body>
</html>
