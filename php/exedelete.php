<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo->prepare("DELETE FROM diary WHERE id=:id");
        
        // フォームから入力されたデータを取得
        $id = $_POST['id'];
        // パラメータバインドしてUPDATE実行
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    // indexに返す
    header("Location: index.php");
?>
