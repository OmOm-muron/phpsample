<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("INSERT INTO diary (title, content, upddate) VALUES (:title, :content, :upddate)");
        
        // フォームから入力されたデータを取得
        $title = $_POST['title'];
        $content = $_POST['content'];
        // パラメータバインドしてINSERT実行
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':upddate', date("Y/m/d H:i:s"));
        $stmt->execute();
    }
    // indexに返す
    header("Location: index.php");
?>
