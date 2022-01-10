<?php
include 'connect.php';

// Tambah item di keranjang
if (isset($_GET['id-desc'])) {
    $id_product = $_GET['id-desc'];
    $queryShow = mysqli_query($conn, "SELECT * FROM products WHERE id_product = '$id_product'");

    if (isset($_POST['add'])) {
        $name = $_POST['name_product'];
        $desc = $_POST['desc_product'];
        $price = $_POST['price_product'];
        $img = $_POST['img_product'];
        $brand = $_POST['brand_product'];
        $qty = $_POST['qty'];
        $total = $price * $qty;

        $queryCek = mysqli_query($conn, "SELECT id_product FROM carts WHERE id_product = '$id_product'");
        if (mysqli_num_rows($queryCek)) {
            echo "
                    <script>
                        alert('Item sudah ada di keranjang!');
                    </script>
                ";
            header("Refresh:0");
        } else {
            $sqlInsert = "INSERT INTO carts  (id_product, name_product, desc_product, price_product, img_product, brand_product, item_quantity, total_price)
                            VALUES ('$id_product', '$name', '$desc', '$price', '$img', '$brand', '$qty', '$total')";
            mysqli_query($conn, $sqlInsert);

            echo "
                    <script>
                        alert('Berhasil ditambahkan ke keranjang!');
                        window.location.href='cart.php';
                    </script>
                ";
        }
    }
}

// Update item di keranjang
elseif (isset($_GET['id-update'])) {
    $id_product = $_GET['id-update'];

    // Mengambil data dari table products
    $queryShow = mysqli_query($conn, "SELECT * FROM products WHERE id_product = '$id_product' ORDER BY name_product");

    // Mengambil data dari table carts
    $queryShowCarts = mysqli_query($conn, "SELECT * FROM carts WHERE id_product = '$id_product'");

    if (isset($_POST['update'])) {

        $price = $_POST['price_product'];
        $qty = $_POST['qty'];
        $total_price = $price * $qty;

        $sqlUpdate = "UPDATE carts SET item_quantity = '$qty', total_price = '$total_price' WHERE id_product = '$id_product'";
        mysqli_query($conn, $sqlUpdate);

        echo "
                <script>
                    alert('Data berhasil diupdate!');
                    window.location.href='cart.php';
                </script>
            ";
    }
}

// Hapus item di keranjang
else {
    $id = $_GET['id'];

    if (isset($id)) {
        mysqli_query($conn, "DELETE FROM carts WHERE id_product = '$id'");
        header('location: cart.php');
    } else {
        mysqli_query($conn, "DELETE FROM carts");
        header('location: cart.php');
    }
}
