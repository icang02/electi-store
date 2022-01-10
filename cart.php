<?php
include 'connect.php';

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}

// Mengambil data dari table carts
$queryShowCarts = mysqli_query($conn, "SELECT * FROM carts ORDER BY name_product");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="my-css/cart.css?v=<?php echo time(); ?>" />

    <title>ELECTI STORE</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand my-brand fw-bold" href="index.html">ElecTI Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="product.php">Product</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="brand.php">Brand</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active fw-bold colorAcsent" href="cart.php">Cart</a>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-secondary btn-custom fw-bold" type="button" onclick="return confirm('Yakin ingin logout?')">
                    <i class="fas fa-sign-out-alt me-1"></i>
                    Log Out
                </a>
            </div>
        </div>
    </nav>
    <!-- akhir Navbar -->


    <!-- Table Cart -->
    <div class="container py-5">
        <h2 class="fw-bold colorAcsent mb-4">Your Shopping Cart</h2>
        <form action="" method="post">
            <table class="table table-striped table-bordered border-dark table-hover table-light text-center align-middle">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Item</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    ?>
                    <?php while ($data = mysqli_fetch_assoc($queryShowCarts)) : ?>
                        <tr>
                            <th scope="row"><?= $no++ . '.' ?></th>

                            <td><?= $data['name_product'] ?></td>

                            <td class="text-center">Rp<?= number_format($data['price_product'], 0, '', '.') ?></td>

                            <td>
                                <input type="number" class="form-control mx-auto" name="qty" value="<?= $data['item_quantity'] ?>" style="width: 70px;" readonly>
                            </td>

                            <td class="text-center">Rp<?= number_format($data['total_price'], 0, '', '.') ?></td>

                            <td class="text-center">
                                <img src="img/product-img/<?= $data['img_product'] ?>" width="100px">
                            </td>

                            <td class="text-center">
                                <a href="desc-product.php?id-update=<?= $data['id_product'] ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="process.php?id=<?= $data['id_product'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?'); ">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $total += $data['total_price'] ?>
                    <?php endwhile ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <h5 class="text-white fw-bold">Order Total : <span class="colorAcsent fs-4">Rp<?= number_format($total, 0, '', '.') ?></span></h6>
                    <div>
                        <?php if (mysqli_num_rows($queryShowCarts) == 1) : ?>
                            <a class="btn btn-danger me-1" href="process.php?delete=all" onclick="return confirm('Yakin ingin mengosongkan cart?'); ">Empty Cart</a>
                            <a class="btn btn-primary" href="checkout.php">Checkout</a>
                        <?php else : ?>
                            <button class="btn btn-danger me-1" disabled>Empty cart</button>
                            <button class="btn btn-primary" disabled>Checkout</button>
                        <?php endif ?>
                    </div>
            </div>
        </form>

        <?php

        ?>
        </h1>
    </div>
    <!-- AKhir table cart -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>