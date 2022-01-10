<?php
include 'connect.php';

if (isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $queryCek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username jika ada di database
    if (mysqli_num_rows($queryCek) == 1) {
        // cek password
        $data = mysqli_fetch_assoc($queryCek);

        if (password_verify($password, $data['password'])) {
            // membuat session username
            $_SESSION['login'] = true;

            header('location: index.php');
        } else {
            $incorrectPw = true;
        }
    } else {
        $notUsername = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | ElecTI Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- My Style -->
    <link rel="stylesheet" href="my-css/login.css?v=<?php echo time(); ?>" />

    <!-- Header Logo -->
    <link rel="icon" href="img/header logo.jpg" type="image/x-icon" />
</head>

<body>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="bg-login col-lg-6 col-md-12 d-md-flex justify-content-center align-items-center">
                <h1 class="text-white fw-bold text-center">WELCOME TO LOGIN PAGE</h1>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card d-flex flex-column align-items-center shadow py-5 px-5 mx-auto">
                    <h1 class="h1-brand text-center mb-5">
                        <a href="index.php" class="text-decoration-none text-dark opacity-75 fw-bold">ElecTI Store</a>
                    </h1>
                    <h2 class="text-center opacity-75 fw-bold mb-3">Sign In</h2>
                    <p class="text-center mb-4">Please fill out the form below</p>

                    <?php if (isset($incorrectPw)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert">
                            Your password is incorrect.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php elseif (isset($notUsername)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert">
                            Username not found.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>

                    <form action="" method="post">
                        <div class="mb-4">
                            <input type="username" class="form-control px-4 py-3" placeholder="Username" name="username" required />
                        </div>
                        <div class="mb-4">
                            <input type="password" class="form-control px-4 py-3" placeholder="Password" name="password" required />
                        </div>
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn py-3 fw-bold btn-primary border border-none bgAcsent" name="login">
                                Login
                            </button>
                        </div>
                        <!-- <div class="mb-5 form-check d-flex justify-content-between">
                            <div class="checkbox">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <a href="#" class="text-decoration-none fw-bold colorAcsent">Forget Password?</a>
                        </div> -->
                        <p class="text-center">
                            Don't have an account yet?
                            <a href="register.php" class="text-decoration-none fw-bold colorAcsent">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>