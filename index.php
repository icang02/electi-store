<?php
include 'connect.php';

if (isset($_POST['btn_our'])) {

    if (!isset($_SESSION['login'])) {
        echo "
            <script>
                alert('Login terlebih dulu');
                window.location='index.php';
            </script>
        ";
    } else {
        header('Location: product.php');
    }
}

$queryShowProduct = mysqli_query($conn, "SELECT * FROM products WHERE id_product BETWEEN 1 AND 3");
$queryShowBrand = mysqli_query($conn, "SELECT * FROM brands WHERE id_brand BETWEEN 1 AND 2");

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
    <link rel="stylesheet" href="my-css/index.css?v=<?php echo time(); ?>" />
    <link rel="stylesheet" href="my-css/responsive-index.css?v=<?php echo time(); ?>" />

    <title>Electi Store</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-absolute w-100">
        <div class="container">
            <a class="navbar-brand my-brand fw-bold" href="index.php">ElecTI Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (!isset($_SESSION['login'])) : ?>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a href="login.php" class="btn fw-bold colorAcsent me-2" type="button">Sign In</a>
                        <a href="register.php" class="btn btn-secondary btn-custom fw-bold" type="button">Sign Up</a>
                    <?php else : ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-2">
                                <a class="nav-link fw-bold" href="product.php">Product</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="brand.php">Brand</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="cart.php">Cart</a>
                            </li>
                        </ul>
                        <a onclick="return confirm('Logout?') " href="logout.php" class="btn btn-secondary btn-custom fw-bold" type="button">
                            <i class="fas fa-sign-out-alt me-1"></i>Logout
                        </a>
                    <?php endif ?>
                    </ul>
            </div>
        </div>
    </nav>
    <!-- akhir Navbar -->

    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-12 my-auto">
                    <h1 class="fw-bold text-white mb-3">WELCOME TO ELECTI STORE</h1>
                    <p class="text-white"><span class="colorAcsent">ElecTI store</span> is a store that provides all
                        electronic needs. ElecTI store is one of the best electronics stores in Indonesia.</p>
                    <!-- <a class="btn btn-secondary btn-lg fw-bold mt-4 btn-custom" href="product.php" role="button">Get Our Products</a> -->
                    <form action="" method="post">
                        <button type="submit" class="btn btn-secondary btn-lg fw-bold mt-4 btn-custom" name="btn_our">Get Our Product</button>
                    </form>
                </div>
                <img class="position-absolute bottom-0 end-0" src="img/laptop-3.png" alt="Laptop" />
            </div>
        </div>
    </section>
    <!-- akhir WELCOME -->

    <!-- Feature -->
    <section id="feature">
        <div class="container">
            <h1 class="colorAcsent text-center fw-bold mb-5">Why ElecTI Store?</h1>
            <div class="row">

                <?php for ($row = 0; $row < count($textFeature); $row++) : ?>
                    <div class="col-md-3 col-12 mb-5">
                        <div class="card py-4 px-2 mx-auto shadow" style="width: 18rem">
                            <i class="bi bi-check-square-fill text-center text-white mb-2 fs-1"></i>
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-center fw-bold text-white"><?= $textFeature[$row][0] ?></h5>
                                <p class="card-text text-center text-white"><?= $textFeature[$row][1] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endfor ?>

            </div>
        </div>
    </section>
    <!-- akhir Feature -->

    <!-- browse-product -->
    <section id="browse-product">
        <div class="container">
            <h1 class="colorAcsent text-center fw-bold mb-4">Browse Product</h1>
            <p class="p-browse-product text-white text-center mb-5">Find a product according to your criteria</p>
            <div class="row">

                <?php while ($data = mysqli_fetch_assoc($queryShowProduct)) : ?>
                    <div class="col-md-4 col-12">
                        <div class="card py-2 px-2 mx-auto shadow" style="width: 25rem">
                            <img src="img/product-img/<?= $data['img_product'] ?>" class="card-img-top" />
                            <div class="card-body d-flex flex-column justify-content-center">
                                <h5 class="card-title mb-4 text-center fw-bold text-white"><?= $data['name_product'] ?></h5>
                                <p class="card-text text-center text-white"><?= $data['desc_product'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>

            </div>
        </div>
    </section>
    <!-- akhir browse-product -->

    <!-- Browse by Brand -->
    <section id="browse-brand">
        <div class="container">
            <h1 class="text-center fw-bold mb-4 colorAcsent">Browse By Brand</h1>
            <p class="p-browse-product text-white text-center mb-5">Browse by electronic brand</p>
            <div class="d-flex flex-wrap">

                <?php while ($data = mysqli_fetch_assoc($queryShowBrand)) : ?>
                    <div class="card py-2 px-2 mx-auto shadow mb-4" style="width: 30rem; height: 570px">
                        <img src="img/brand-img/<?= $data['img_brand'] ?>" class="card-img-top" />
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h5 class="card-title mb-4 text-center fw-bold text-white"><?= $data['name_brand'] ?></h5>
                            <p class="card-text text-center text-white"><?= $data['desc_brand'] ?></p>
                        </div>
                    </div>
                <?php endwhile ?>

            </div>
        </div>
    </section>
    <!-- akhir Browse by Brand -->

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <div class="container p-4 pb-0">
            <p>Contact Our: +62-123-123-123</p>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            &copy 2021 Copyright:
            <a class="text-white" href="#hero">ElecTI-Store.com</a>
        </div>
    </footer>
    <!-- akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>