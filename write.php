<?php
//データ受け取り
$name = $_POST["name"];
$email = $_POST["email"];
$level = $_POST["level"];
$satisfaction = $_POST["satisfaction"];
$features = isset($_POST["features"])
    ? implode(" / ", $_POST["features"])
    : "なし";
$comment = $_POST["comment"];

// CSVに保存する配列
$data = [$name, $email, $level, $satisfaction, $features, $comment];

// 
$data = array_map(function ($value) {
    return mb_convert_encoding($value, "UTF-8", "UTF-8");
}, $data);

// ファイルパス (XAMPP用)
$filePath = __DIR__ . "/data/survey.csv";

// ファイルオープン (追記)
$file = fopen($filePath, "a");

//ヘッダー行を追加 (ファイルが空のとき)
if (filesize($filePath) === 0) {
    fputcsv($file, ["名前", "Email", "英語レベル", "アプリ満足度", "欲しい機能","コメント"]);
}

// データを書き込み
fputcsv($file, $data);
fclose($file);

// 表示ページへ
header("Location: read.php");
exit;