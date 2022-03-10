<?php require_once('./conn.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blog 部落格</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>文章管理</h1>
        <a href="./add.php">新增文章</a>
        <a href="./admin_category.php">管理分類</a>
        <ul>
            <?php
                $sql = "SELECT * FROM articles ORDER BY created_at DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>";
                        echo $row['title'];
                        echo "<a href='update.php?id=$row[id]'>編輯</a>";
                        echo " <a href='delete.php?id=$row[id]'>刪除</a>";
                        echo "</li>";
                    }
                } 
            ?>
        </ul>
    </body>
</html>
