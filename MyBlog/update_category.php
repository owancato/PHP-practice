<?php
    require_once('./conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories where id=$id";
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
        <h1>編輯分類</h1>
        <form method='POST' action='./handle_update_category.php'>
            名稱：<input name='name' value="<?php echo $row['name'] ?>" >
            <input type='hidden' name="id" value="<?php echo $row['id']; ?> " >
            <input type='submit' value="更改">
        </form>
    </body>
</html>
