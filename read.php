<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザー情報
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];

    // 質問と回答の処理
    $questions = array(
        "あなたの職種は？",
        "専門性は？",
        "職位は？",
    );

    // 回答結果を配列に保存
    $answers = array(
        'user_id' => $user_id,
        'name' => $name,
        'email' => $email,
        'responses' => array()
    );

    foreach ($questions as $i => $question) {
        $questionNumber = $i + 1;
        $answer = $_POST["answer{$questionNumber}"];
        $answers['responses'][] = array(
            'question' => $question,
            'answer' => $answer
        );
    }

    // data2.txtに書き込み
    $jsonData = json_encode($answers, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents('data/data2.txt', $jsonData . "\n", FILE_APPEND);

    // 表示用のテーブル作成
    $table = "<table>";
    $table .= "<tr><th>質問</th><th>回答</th></tr>";
    foreach ($answers['responses'] as $response) {
        $table .= "<tr><td>{$response['question']}</td><td>{$response['answer']}</td></tr>";
    }
    $table .= "</table>";
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>回答確認</title>
</head>

<body>
    <h1>回答確認</h1>
    <?php if (isset($table)) : ?>
        <h2>ユーザー情報</h2>
        <p>名前: <?php echo nl2br($name); ?></p>
        <p>メールアドレス: <?php echo nl2br($email); ?></p>

        <h2>回答</h2>
        <?php echo $table; ?>
    <?php else : ?>
        <p>回答はありません。</p>
    <?php endif; ?>
</body>

</html>
