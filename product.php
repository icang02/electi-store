<?php
include 'connect.php';

if (!isset($_SESSION['login'])) {
    echo "
        <script>
            alert('Login terlebih dulu');
            window.location='index.php';
        </script>
    ";
    exit;
}

$queryShow = mysqli_query($conn, "SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- My Style -->
    <link rel="stylesheet" href="my-css/product.css?v=<?php echo time(); ?>">

    <title>ElecTI Store | Product</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute w-100" id="hero">
        <div class="container">
            <a class="navbar-brand my-brand fw-bold" href="index.php">ElecTI Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-2">
                        <a class="nav-link active fw-bold colorAcsent" href="product.php">Product</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="brand.php">Brand</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="cart.php">Cart</a>
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

    <!-- Background -->
    <div class="background"></div>
    <!-- akhir Background -->

    <!-- Product -->
    <div class="products py-5">
        <h2 class="colorAcsent fw-bold text-center mb-4">All Products</h3>
            <div class="container bg-secondary pt-5 pb-3 d-flex flex-wrap">

                <?php while ($data = mysqli_fetch_assoc($queryShow)) : ?>
                    <div class="card  mx-auto shadow mb-5" style="width: 23rem">
                        <img src="img/product-img/<?= $data['img_product'] ?>" class="card-img-top" />
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 text-center fw-bold text-white"><?= $data['name_product'] ?></h5>
                            <p class="card-text text-center text-white"><?= $data['desc_product'] ?></p>
                        </div>
                        <a href="desc-product.php?id-desc=<?= $data['id_product'] ?>" class="btn btn-secondary bgAcsent fw-bold py-2">Check Now</a>
                    </div>
                <?php endwhile ?>
            </div>
    </div>
    <!-- akhir Product -->

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <div class="container p-4 pb-0">
            <p>Contact Our: +62-123-123-123</p>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            &copy 2022 Copyright:
            <a class="text-white" href="#hero">ElecTI-Store.com</a>
        </div>
    </footer>
    <!-- akhir Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>