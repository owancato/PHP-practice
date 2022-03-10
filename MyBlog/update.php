<?php
    require_once('./conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Blog 部落格</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>編輯文章</h1>
        <form method='POST' action='./handle_update.php'>
            <div>標題：<input name='title' value="<?php echo $row['title'] ?>"> </div>
            <div>內容：<textarea name='content' ><?php echo $row['content'] ?></textarea></div>
            <input type='hidden' name="id" value="<?php echo $row['id']; ?> " >
            <div>
                分類：<select name="category_id">
                    <?php
                        $sql_category = "SELECT * FROM categories ORDER BY created_at DESC";
                        $result_category = $conn->query($sql_category);
                        while ($row_category = $result_category->fetch_assoc()){
                            $id = $row_category['id'];
                            $name = $row_category['name'];
                            $selected = $row['category_id'] === $id ? "selected" : "";
                            echo "<option value=$id $selected>$name</option>";
                        }
                    ?>
                </select>
            </div>
            <input type='submit'>
    </body>
</html>
