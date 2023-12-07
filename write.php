<?php

$name = $_POST['name'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];

$data = $name.$email.$user_id."\n";

file_put_contents('data/data.txt',$data,FILE_APPEND);

// input.phpのURLを生成
$inputURL = "input.php?user_id={$user_id}";

?>


<html>

<head>
    <meta charset="utf-8">
    <title>File書き込み</title>
</head>

<body>
    <h1>アンケートフォーム</h1>
    <form action="read.php" method="post">
        <h2>ユーザー情報</h2>
        名前: <?php echo nl2br($name); ?><br>
        メールアドレス: <?php echo nl2br($email); ?><br>

        <h2>質問</h2>
        <?php
         $questions = array(
         "あなたの職種は？",
        "専門性は？",
        "職位は？"
        );

        for ($i = 0; $i < count($questions); $i++) {
        $questionNumber = $i + 1;
        echo "<h3>質問{$questionNumber}:{$questions[$i]}</h3>";
        echo "<textarea name=\"answer{$questionNumber}\" rows=\"5\" cols=\"40\"></textarea><br>";
        }
        ?>

        <input type="submit" value="送信">
    </form>

    <h2>友達を招待</h2>
    <p>友達を招待するURL: <a href="<?php echo $inputURL; ?>"><?php echo $inputURL; ?></a></p>

    <ul>
        <li><a href="read.php">確認する</a></li>
        <li><a href="input.php">戻る</a></li>
    </ul>

</body>


</html>
