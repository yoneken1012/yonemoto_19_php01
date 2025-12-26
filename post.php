<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>英語学習アンケート</title>
</head>
<body>
    <h2>英単語アプリ改善アンケート</h2>

    <form action="write.php" method="post">
        名前：<input type="text" name="name" required><br><br>
        Email：<input type="email" name="email" required><br><br>

        英語レベル：
        <select name="level">
            <option value="初心者">初心者</option>
            <option value="中級者">中級者</option>
            <option value="上級者">上級者</option>
        </select><br><br>

        アプリ満足度：
        <input type="radio" name="satisfaction" value="5">5
        <input type="radio" name="satisfaction" value="4">4
        <input type="radio" name="satisfaction" value="3">3
        <input type="radio" name="satisfaction" value="2">2
        <input type="radio" name="satisfaction" value="1" checked>1<br><br>

        欲しい機能：<br>
        <input type="checkbox" name="features[]" value="音声">音声<br>
        <input type="checkbox" name="features[]" value="例文">例文<br>
        <input type="checkbox" name="features[]" value="復習機能">復習機能<br>
        <input type="checkbox" name="features[]" value="その他">その他<br><br>

        コメント：<br>
        <textarea name="comment" rows="4" cols="40"></textarea><br><br>

        <input type="submit" value="送信">
    </form>

</body>
</html>