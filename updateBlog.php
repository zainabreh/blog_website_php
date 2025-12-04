<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Blog Post</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{ background:#eef2f7; font-family: 'Segoe UI', sans-serif; }

    
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

    .form-container{
        width:60%;
        background:#fff;
        padding:35px;
        border-radius:12px;
        margin:auto;
        margin-top:50px;
        box-shadow:0 6px 20px rgba(0,0,0,.08);
    }
    .btn-submit{
        background:#00A8E8;
        font-weight:bold;
        border:none;
        padding:10px 22px;
        border-radius:50px;
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
<div class="form-container">
    <h2 class="fw-bold mb-4 text-center text-primary">Update Blog Post</h2>

    <form action="insert.php" method="POST" enctype="multipart/form-data">

        <label class="fw-semibold">Post Title</label>
        <input type="text" name="title" class="form-control mb-3" placeholder="Enter blog title" required>

        <label class="fw-semibold">Featured Image</label>
        <input type="file" name="image" class="form-control mb-3" required>

        <label class="fw-semibold">Content</label>
        <textarea name="article" rows="6" class="form-control mb-3" placeholder="Enter blog article..." required></textarea>

        <label class="fw-semibold">Publish Date</label>
        <input type="date" name="pub_date" class="form-control mb-4" required>

        <button type="submit" class="btn-submit text-white w-100">Update Blog</button>
    </form>
</div>
</body>
</html>
