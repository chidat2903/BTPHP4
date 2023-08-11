<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Show.css">
</head>
<?php
    session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $phone_name = $_POST['phone_name'];
            $phone_price = $_POST['phone_price'];
            $phone_img = $_POST['phone_img'];
            $phone_evo = $_POST['phone_evo'];
            

            $new_phone = array(
                'name' => $phone_name,
                'price' => $phone_price,
                'img' => $phone_img,
                'evo' => $phone_evo,
            );

            if (!isset($_SESSION['phone_list'])) {
                $_SESSION['phone_list'] = array();
            }

            if($phone_name != "" && $phone_price != "" && $phone_img !="" && $phone_evo != "") {
                $_SESSION['phone_list'][] = $new_phone;
                header('Location: Show.php');
                exit();
            }else {
                echo "<script>alert('Vui lòng nhập thông tin đầy đủ');</script>";
            }
        }
?>
<body>
    <form method="post" action="Push.php">
    <input class="input" type="text" name="phone_name" placeholder="Tên điện thoại" ><br>
    <input class="input" type="text" name="phone_price" placeholder="Giá thành"><br>
    <input class="input" type="text" name="phone_evo" placeholder="Đánh giá"><br>
    <input class="input" type="text" name="phone_img" placeholder="Link ảnh"><br>
    <input class="input" type="submit" name="submit" value="Lưu">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>