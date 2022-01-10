<?php
include "process.php";

if (!isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}

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
    <link rel="stylesheet" href="my-css/update.css?v=<?php echo time(); ?>">

    <title>ElecTI Store | Product</title>
</head>

<body>

    <div class="container py-5">
        <?php if (isset($_GET['id-desc'])) : ?>
            <h2 class="text-center text-white colorAcsent fw-bold mb-3">Full Product Description</h1>
            <?php else : ?>
                <h2 class="text-center text-white colorAcsent fw-bold mb-3">Update Your Shopping Cart</h1>
                <?php endif ?>

                <?php while ($data = mysqli_fetch_assoc($queryShow)) : ?>
                    <form action="" method="post" class="w-75 mx-auto">
                        <?php if (isset($_GET['id-desc'])) : ?>
                            <p class="text-end"><a href="product.php" class="btn btn-secondary btn-custom">Back to product</a></p>
                        <?php else : ?>
                            <p class="text-end"><a href="cart.php" class="btn btn-secondary btn-custom">Back to cart</a></p>
                        <?php endif ?>

                        <h5 class="text-white mb-3">Product Name</h4>
                            <input type="text" class="form-control fw-bold mb-4" id="name_product" name="name_product" value="<?= $data['name_product'] ?>" readonly>

                            <h5 class="text-white mb-3">Description</h4>
                                <textarea name="desc_product" class="form-control fw-bold mb-4" readonly><?= $data['desc_product'] ?></textarea>

                                <h5 class="text-white mb-3">Price</h4>
                                    <input type="number" name="price_product" class="form-control fw-bold mb-4" value="<?= $data['price_product']  ?>" readonly>

                                    <h5 class="text-white mb-3">Image</h4>
                                        <img src="img/product-img/<?= $data['img_product'] ?>" width="400px" class="rounded mb-4">
                                        <input type="hidden" name="img_product" value="<?= $data['img_product'] ?>">

                                        <h5 class="text-white mb-3">Brand</h4>
                                            <input type="text" name="brand_product" class="form-control fw-bold mb-4" value="<?= $data['brand_product'] ?>" readonly style="width: 400px;">

                                            <h5 class="text-white mb-3">Item Quantity</h4>
                                                <?php if (isset($_GET['id-desc'])) : ?>
                                                    <input type="number" class="form-control mb-4 fw-bold" placeholder="Order Count" name="qty" min="1" required style="width: 208px;">
                                                    <button type="submit" name="add" class="btn btn-primary me-1">
                                                        <i class="fas fa-cart-plus me-1"></i>
                                                        Add to cart
                                                    </button>
                                                <?php else : ?>
                                                    <?php while ($data = mysqli_fetch_assoc($queryShowCarts)) : ?>
                                                        <input type="number" class="form-control mb-4 fw-bold" value="<?= $data['item_quantity'] ?>" placeholder="Order Count" name="qty" min="1" required style="width: 208px;">
                                                        <button type="submit" name="update" class="btn btn-success me-1">Update cart</button>
                                                    <?php endwhile ?>
                                                <?php endif ?>
                                                <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                    </form>

                <?php endwhile ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>