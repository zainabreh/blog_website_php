<?php
    session_start();
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Blogs (Dummy Data)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f6f8fc;
            font-family: 'Segoe UI', sans-serif;
        }

        .blog-card img {
            width: 100%;
            height: 220px;
            object-fit: contain;
            object-position: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Limit description to 3 lines */
        .blog-desc {
            color: #6c757d;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .blog-title {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

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


        .blog-card {
            background: #fff;
            border-radius: 15px;
            height: 450px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .07);
            transition: .3s;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        }

        /* .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        } */

        .blog-body {
            padding: 20px;
        }

        .btn-read {
            background: #00A8E8;
            border: none;
            color: #fff;
            font-weight: bold;
            border-radius: 50px;
            padding: 6px 15px;
            text-decoration: none;
        }

        .profile-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #fff;
            padding: 6px 12px;
            border-radius: 25px;
            border: 1px solid #ddd;
        }

        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-name {
            font-weight: 600;
            color: #333;
        }
    </style>

</head>

<body>
    <nav class="navbar">
        <div class="nav-left">
            <a href="index.php">
                <h2 class="logo">ProBlogger</h2>
            </a>
        </div>

        <div class="nav-right">
            <?php
            
            if (isset($_SESSION['user_id'])) {
                $username = $_SESSION['username'];
                $profileImage = $_SESSION['profile_image'] ?? 'default.png'; 

                echo '<a href="dashboard.php"><div class="profile-box">
                        <img src="./uploads/' . $profileImage . '" class="profile-img" alt="Profile">

                        <span class="profile-name">' . htmlspecialchars($username) . '</span>
                    </div></a>';

                echo '<a href="process.php?logout=true" name="logout" class="btn login">Logout</a>';

            } else {
                echo '<a href="login.php" class="btn login">Login</a>';
                echo '<a href="register.php" class="btn signup">Signup</a>';
            }
            ?>

        </div>
    </nav>

    <div class="container py-5">
        <h2 class="fw-bold text-center mb-5 text-primary">All Blog Posts</h2>

        <div class="row g-4">
            <?php
            include_once('database.php');

            $query = "SELECT * FROM blogs";
            $res = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="col-md-4">
                    <div class="blog-card mb-4">
                        <img src="./uploads/<?php echo $row['blog_image']; ?>" alt="">
                        <div class="blog-body">
                            <small class="text-muted"><?php echo date('Y/m/d', strtotime($row['published_date'])); ?></small>
                            <h5 class="fw-bold mt-2 blog-title "><?php echo $row['blog_title']; ?></h5>
                            <p class="blog-desc"><?php echo $row['description']; ?></p>
                            <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn-read">Read More →</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</body>

</html>