<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap css link -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Css Paths -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/global.css">
    <link rel="stylesheet" href="styles/login.css">

</head>

<body>

    <!-- HEADER nav bar start -->
    <?php include 'header.php'; ?>
    <!-- HEADER nav bar end -->

    <!-- main content start -->
    <main>
        <div class="login-container">
            <h2>Login Here</h2>

            <!-- Login Form -->
            <form>
                <!-- Username input with icon -->
            <div class="mb-3">
                <label for="username" class="form-label">
                    <i class="fas fa-user"></i> Username
                </label>
                <input type="text" class="form-control" id="username" placeholder="Enter username">
            </div>

            <!-- Password input with icon -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Password
                </label>
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>

                <!-- Remember me checkbox -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-login w-100 mb-3">Log In</button>
                <h5>Login Via:</h5>
                <!-- Google login submit button -->
                <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-outline-danger d-flex align-items-center"
                        style="border-radius: 50px; padding: 5px 10px;">
                        <img src="assets/google-10.png" alt="Google Icon" style="width: 20px;">
                        <span class="ms-2">Google</span>
                    </button>
                </div>
                <!-- Forgot password link -->
                <div class="text-center">
                    <a href="#">Forgot Password?</a>
                </div>

                <!-- Register link -->
                <div class="text-center mt-3">
                    <p>Not a user yet? <a href="register.php">Register Here</a></p>
                </div>
            </form>
        </div>
    </main>
    <!-- main content end -->

    <!-- FOOTER Section Start -->
    <?php include 'footer.php'; ?>
    <!-- FOOTER Section End -->


    <!-- Bootstrap JS -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>