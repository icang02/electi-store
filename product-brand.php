<?php 
    include('connect.php');

    $name_brand = $_GET['name-brand'];
    $queryShow = mysqli_query($conn, "SELECT * FROM products WHERE brand_product = '$name_brand'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <!-- Bootsrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- My Style -->
    <link rel="stylesheet" href="my-css/product.css?v=<?php echo time(); ?>">

    <title>ElecTI Store | Brand Product</title>
</head>

<body>

    <div class="container py-5">
        <h2 class="text-center text-white colorAcsent fw-bold mb-3">All Product by <?= $name_brand ?></h1>
        <p class="text-end">
            <a href="brand.php" class="btn btn-secondary btn-custom">Back to brand</a>
        </p>
        <div class="container bg-secondary pt-5 pb-3 d-flex flex-wrap">

            <?php while($data = mysqli_fetch_assoc($queryShow)  ) : ?>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>