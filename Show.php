<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="Show.css">
</head>

<body>
    <form method="get">
            <input type="text" name="search" placeholder="Nhập tên điện thoại">
            <input type="submit" value="Tìm kiếm">
        </form>
    <?php
    session_start();

    if (isset($_SESSION['phone_list'])) {

        if (isset($_GET['search'])) { 
            $search_name = $_GET['search'];

            $phone_list = $_SESSION['phone_list'];
           
            $phone_list = searchByName($phone_list, $searchName);
        }

        $phone_list = $_SESSION['phone_list'];

        echo '<div class="title">* Điện thoại *</div>';

        echo '<div class="show">';
        foreach ($phone_list as $phone) {
            echo '
                    <div class="card" style="width:20%;border: 1px solid #000; margin-right: 10px">
                    <img class="card-img-top" src=" ' . $phone['img'] . '" alt="Phone image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title">' . $phone['name'] . '</h4>
                            <p class="card-text price">$' . $phone['price'] . '</p>
                            <div class="evaluation">
                                <div class="stars">';
            for ($x = 0; $x < 5; $x++) {
                if ($x < $phone['evo']) echo '<i class="fa-solid fa-star" style="color:#CCCC00"></i>';
                else echo '<i class="fa-regular fa-star"></i>';
            }
            echo '
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
        }
        echo '</div>';
    } else {
        echo "Không có điện thoại nào trong dữ liệu.";
    }

    function searchByName($array, $name) {
        $results = array();
        foreach ($array as $item) {
            if (strpos(strtolower($item), strtolower($name)) !== false) {
                $results['name'] = $item;
            }
        }
        return $results;
    }
    ?>
</body>

</html>