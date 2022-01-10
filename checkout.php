<?php

include "connect.php";
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

    <title>ElecTI Store | Checkout</title>
</head>

<body>

    <div class="container py-5">
        <h2 class="text-center text-white colorAcsent fw-bold mb-5">Checkout Your Items</h1>

            <form action="" method="post" class="w-75 mx-auto">
                <h5 class="text-white mb-3">Full Name</h4>
                    <input type="text" class="form-control fw-bold mb-4" id="name_product" required>

                    <h5 class="text-white mb-3">Complete Address</h4>
                        <textarea name="desc_product" class="form-control fw-bold mb-4" required></textarea>

                        <h5 class="text-white mb-3">Total Price</h4>
                            <input type="number" name="price_product" class="form-control fw-bold mb-4" readonly>

                            <h5 class="text-white mb-3">Total of All Items</h4>
                                <input type="number" class="form-control mb-4 fw-bold" readonly style="width: 208px;">

                                <h5 class="text-white mb-3">Method of Payment</h4>
                                    <select class="form-select mb-4" style="width: 208px;">
                                        <option>Select</option>
                                        <option>BRI</option>
                                        <option>BNI</option>
                                        <option>BCA</option>
                                    </select>

                                    <a href="cart.php" class="btn btn-secondary ">Back to cart</a>
                                    <button type="submit" name="checkout" class="btn btn-warning me-1">Continue</button>
            </form>
    </div>

    <?php
    if (isset($_POST['checkout'])) {
        echo "
                <script>
                    alert('Silahkan selesaikan pembayaran!');
                    window.location.href='cart.php';
                </script>
            ";
    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>