<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Diary</title>
</head>
<body>
    <h1>Update Diary</h1>
    
    <?php
        $pdo = new PDO("pgsql:host=localhost;dbname=practice", "postgres", "postgres");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        $stmt = $pdo->prepare("SELECT * FROM diary WHERE id = :id");
            
        // パラメータをバインド
        $id = $_GET['id'];
        $stmt->bindParam(':id', $id);
        
        // クエリ実行
        $stmt->execute();
        $diary = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // 日記の情報をフォームにセットする
        $title = $diary['title'];
        $content = $diary['content'];
    ?>
    
    <form action="exeupdate.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $title; ?>"><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"><?php echo $content; ?></textarea><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
