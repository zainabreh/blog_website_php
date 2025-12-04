<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
           /* ===== NAVBAR ONLY ===== */

        .navbar {
            width: 100%;
            padding: 18px 50px;
            background: rgba(255, 255, 255, 0.65);
            backdrop-filter: blur(14px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow:
                0 6px 20px rgba(0, 0, 0, 0.06),
                0 2px 6px rgba(0, 0, 0, 0.04);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* Logo */
        .logo {
            font-size: 26px;
            font-weight: 700;
            color: #2f3542;
            letter-spacing: -0.5px;
            margin: 0;
        }

        /* Right side buttons */
        .nav-right {
            display: flex;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
            transition: 0.25s;
        }

        /* New Blog */
        .new-blog {
            background: #4a78f8;
            color: #fff;
        }

        .new-blog:hover {
            background: #3a64d6;
        }

        /* Login */
        .login {
            background: transparent;
            border: 2px solid #4a78f8;
            color: #4a78f8;
        }

        .login:hover {
            background: #4a78f8;
            color: white;
        }

        /* Signup */
        .signup {
            background: #22c55e;
            color: white;
        }

        .signup:hover {
            background: #1ba34d;
        }

        body {
            height: 100vh;
            background: #eef2f7;
        }
        .container{
    margin-top: 150px;
    display: flex;
            justify-content: center;
            align-items: center;
}
        .reg-box {
            width: 430px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>
<nav class="navbar">
    <div class="nav-left">
        <a href="index.php"><h2 class="logo">ProBlogger</h2></a>
    </div>

    <div class="nav-right">
        <a href="createBlog.php" class="btn new-blog">New Blog</a>
        <a href="login.php" class="btn login">Login</a>
        <a href="register.php" class="btn signup">Signup</a>
    </div>
</nav>
<div class="container">


    <div class="reg-box">
        <h3 class="text-center mb-4">Registration</h3>

        <?php
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImage = $_FILES['profile_img']['name'];
        ?>

        <form action="register.php" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <!-- File Upload -->
            <div class="mb-3">
                <label class="form-label">Upload Profile Image</label>
                <input type="file" name="profile_img" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

            <p class="text-center text-small mt-3">
                Already have an account? <a href="login.php">Login here</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
