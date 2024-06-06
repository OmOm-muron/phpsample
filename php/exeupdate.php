<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("UPDATE diary SET title=:title, content=:content, upddate=:upddate WHERE id=:id");
        
        // フォームから入力されたデータを取得
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        // パラメータバインドしてUPDATE実行
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':upddate', date("Y/m/d H:i:s"));
        $stmt->execute();
    }
    // indexに返す
    header("Location: index.php");
?>
