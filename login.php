<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: #eef2f7;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            width: 430px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .text-small {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h3 class="text-center mb-4">Login</h3>

        <form action="login_action.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <p class="text-center text-small mt-3">
                Don't have an account? <a href="register.php">Register here</a>
            </p>
        </form>
    </div>

</body>
</html>
