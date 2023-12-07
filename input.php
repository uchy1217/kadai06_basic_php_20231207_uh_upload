<html>

<head>
    <meta charset="utf-8">
    <title>職種アンケート</title>
</head>

<body>
    <form action="write.php" method="post">
        お名前: <input type="text" name="name">
        E-mail: <input type="text" name="email">
        <input type="text" name="user_id" value="<?php echo isset($_GET['user_id']) ? $_GET['user_id'] : uniqid(); ?>">
        <!-- user_idがURLに入っていないときだけユーザーIDが固有に生成される -->
        <input type="submit" value="送信">
    </form>
</body>

</html>