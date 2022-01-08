<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <h2>Login</h2>
    <p><?= md5('password123') ?></p>
        <form method="POST" action="index.php?action=signIn">
        <input type="text" name="login" value="login"/>
        <input type="text" name="password" value="password"/>
        <input type="submit" value="Login"/>
    </form>
</body>
</html>