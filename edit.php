<?php 
    session_start();
    if (!$_SESSION['login']) {
        header('location: login.php');
        exit;
    }

    include "connect.php";
    $name_product = $_GET['name'];

    $sqlShow = "SELECT * FROM carts WHERE name_product = '$name_product'";
    $queryShow = mysqli_query($conn, $sqlShow);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElecTI Store | Product</title>
</head>

<body>


    <?php while($data = mysqli_fetch_assoc($queryShow)  ) : ?>
    <form action="" method="post">
        <ul>
            Nama Product
            <input type="text" name="name_product" value="<?= $data['name_product'] ?>" readonly> <br>

            Description
            <input type="text" name="desc_product" value="<?= $data['desc_product'] ?>" readonly> <br>

            Price
            <input type="number" name="price_product" value="<?= $data['total_price'] / $data['item_quantity'] ?>"
                readonly>

            <li>
                <img src="img/product-img/<?= $data['img_product'] ?>" width="200px">
                <input type="hidden" name="img_product" value="<?= $data['img_product'] ?>">
            </li>

            <li>
                <input type="number" placeholder="Jumlah Pesanan" name="item_quantity"
                    value="<?= $data['item_quantity'] ?>">
            </li>

            <li>
                <button type="submit" name="edit">Simpan</button>
            </li>
        </ul>
    </form>
    <?php endwhile ?>


    <?php 
        if (isset($_POST['edit'])) {
            $item_quantity = $_POST['item_quantity'];
            $total_price = $_POST['price_product'] * $_POST['item_quantity'];

            $sqlUpdate = "UPDATE carts SET item_quantity = '$item_quantity', total_price = '$total_price' WHERE name_product = '$name_product'";
            mysqli_query($conn, $sqlUpdate);
            

            header('location: menu-cart.php');
        }
    ?>



</body>

</html>