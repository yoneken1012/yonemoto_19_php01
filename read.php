<?php
// リセット処理
$filePath = __DIR__ . "/data/survey.csv";

if (isset($_POST["reset"])) {
    // CSVを空にする
    file_put_contents(
        $filePath,
        "名前,Email,英語レベル,アプリ満足度,欲しい機能,コメント\n"
    );
    // 自分自身にリダイレクト (二重送信防止)
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アンケート結果</title>
</head>
<body>
    <h2>アンケート集計結果</h2>

    <table border="1">
        <tr>
            <th>名前</th>
            <th>Email</th>
            <th>英語レベル</th>
            <th>アプリ満足度</th>
            <th>欲しい機能</th>
            <th>コメント</th>
        </tr>

        <?php
        $filePath = __DIR__ . "/data/survey.csv";

        if (file_exists($filePath)) {
            $file = fopen($filePath, "r");

            // 1行目(ヘッダー)を読み飛ばす
            fgetcsv($file);

            while ($row = fgetcsv($file)) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell, ENT_QUOTES, "UTF-8") . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        }
        ?>
    </table>

    <br>
    <a href="post.php">入力画面へ戻る</a>

    <form method="post" onsubmit="return confirm('アンケート結果を全て削除します。よろしいですか？');">
       <input type="submit" name="reset" value="アンケート結果をリセット">
    </form>

</body>
</html>