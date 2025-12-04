<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            background: #eef2f7;
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

    <div class="reg-box">
        <h3 class="text-center mb-4">Registration</h3>

        <form action="register_action.php" method="POST" enctype="multipart/form-data">

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
        </form>
    </div>

</body>
</html>
