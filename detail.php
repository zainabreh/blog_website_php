<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Title - Blog Detail Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f6f8fc;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ========== SIDEBAR ========== */
        .sidebar {
            width: 240px;
            background: #1e293b;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
        }

        .sidebar-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        /* Sidebar Links */
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .menu-link {
            font-size: 16px;
            padding: 10px 14px;
            border-radius: 8px;
            text-decoration: none;
            color: #e2e8f0;
            background: #334155;
            transition: 0.25s;
        }

        .menu-link:hover {
            background: #475569;
            color: #fff;
        }

        /* Logout Button */
        .logout-btn {
            margin-top: auto;
            padding: 10px 14px;
            background: #ef4444;
            text-align: center;
            border-radius: 8px;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: 0.25s;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            background: #f4f6f9;
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

        .post-box {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);
        }

        /* .post-img {
            width: 100%;
            height: auto;
            object-fit: contain;
            border-radius: 12px;
        } */


        .download-btn {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }

        .download-btn:hover {
            background: #0056d6;
        }

        .post-img-wrapper {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            border-radius: 12px;
            overflow: hidden;
        }

        .post-img-wrapper .post-img {
            width: 100%;
            height: 800px;
            object-fit: contain;
            display: block;
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
                echo '<a href="dashboard.php" class="btn new-blog">Dashboard</a>';
                echo '<a href="process.php?logout=true" name="logout" class="btn login">Logout</a>';
            } else {
                echo '<a href="login.php" class="btn login">Login</a>';
                echo '<a href="register.php" class="btn signup">Signup</a>';
            }
            ?>
        </div>
    </nav>

    <main>
        <div class="container mb-5">
            <!-- Blog Detail Box -->

            <?php
            if ($_GET['id']) {
                include_once('database.php');
                $blogId = $_GET['id'];
                $query = "select * from blogs where id=?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $blogId);

                $stmt->execute();

                $res = $stmt->get_result();

                if ($res->num_rows ==  0) {
                    echo "<div class='alert alert-info' role='alert'>
                        Invalid Blog Id.
                    </div>";
                } else {
                    $row = $res->fetch_assoc();

                    echo "
                        <div class='post-img-wrapper'>
                            <img src='./uploads/" . htmlspecialchars($row['blog_image']) . "' class='post-img' alt='Blog Image'>
                        </div>

                        <h2 class='fw-bold mt-4'>" . htmlspecialchars($row['blog_title']) . "</h2>

                        <p class='text-muted mb-1'>Published: " . htmlspecialchars($row['published_date']) . "</p>
                        <p class='text-muted'>Author: <b>" . htmlspecialchars($row['author']) . "</b></p>

                        <hr>

                        <p style='font-size:17px;line-height:1.8;'>" . nl2br(htmlspecialchars($row['description'])) .
                        "</p>
                    ";
                }
            }

            ?>

        </div>
    </main>


</body>

</html>