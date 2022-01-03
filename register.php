<?php 
    include 'connect.php';

    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        $email = $_POST['email'];

        // cek username sudah ada atau belum
        $queryCek = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
        
        if (mysqli_fetch_assoc($queryCek)) {
            $already = true;
        }
        else {
            // cek konfirmasi password
            if ($password == $confirmPassword) {
                // mengenkripsi password
                $password = password_hash($password, PASSWORD_DEFAULT);
        
                // menambahkan user ke database;
                mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password', '$email')");

                $success = true;
            }
            else {
                $notPassword = true;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register | ElecTI Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- My Style -->
    <link rel="stylesheet" href="my-css/login.css?v=<?php echo time(); ?>" />

    <!-- Header Logo -->
    <link rel="icon" href="img/header logo.jpg" type="image/x-icon" />
</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="bg-login col-lg-6 col-md-12 d-md-flex justify-content-center align-items-center order-sm-2">
                <h1 class="h1-welcome text-white fw-bold text-center">WELCOME TO REGISTER PAGE</h1>
            </div>
            <div class="col-lg-6 col-md-12 order-sm-1">
                <div class="d-flex flex-column align-items-center card shadow py-5 px-5 mx-auto">
                    <h1 class="h1-brand text-center mb-5">
                        <a href="index.php" class="text-decoration-none text-dark opacity-75 fw-bold">ElecTI Store</a>
                    </h1>
                    <h2 class="text-center opacity-75 fw-bold mb-3">Sign Up</h2>
                    <p class="text-center mb-4">Please fill out the form below</p>

                    <?php if (isset($already)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert">
                        Username is already used.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <?php elseif (isset($success)) : ?>
                    <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert">
                        Register is successfull.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <?php elseif (isset($notPassword)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert">
                        Confirm password does not match.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif ?>

                    <form action="" method="post" class="form">
                        <div class="mb-4">
                            <input type="username" class="form-control px-4 py-3" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Username" name="username" />
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control px-4 py-3" id="exampleInputPassword1"
                                placeholder="Password" name="password" />
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control px-4 py-3" id="exampleInputPassword1"
                                placeholder="Confirm Password" name="confirm-password" />
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control px-4 py-3" id="exampleInputPassword1"
                                placeholder="Your Email Address" name="email" />
                        </div>
                        <div class="d-grid mb-5">
                            <button type="submit" class="btn py-3 fw-bold btn-primary border border-none bgAcsent"
                                name="register">Register</button>
                        </div>
                        <p class="text-center">
                            Already have an account?
                            <a href="login.php" class="text-decoration-none fw-bold colorAcsent">Sign in</a>
                        </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>