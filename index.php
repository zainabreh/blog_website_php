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
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .07);
            transition: .3s;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        }

        .blog-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

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

    </style>
    
</head>

<body>
    <nav class="navbar">
        <div class="nav-left">
        <a href="index.php"><h2 class="logo">ProBlogger</h2></a>
        </div>

        <div class="nav-right">
            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                echo '<a href="dashboard.php" class="btn new-blog">Dashboard</a>';
                echo '<a href="process.php" name="logout" class="btn login">Logout</a>';
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

            <!-- Blog 1 -->
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1509099836639-18ba1795216d?auto=format&fit=crop&w=800&q=60" alt="">
                    <div class="blog-body">
                        <small class="text-muted">2024/01/18</small>
                        <h5 class="fw-bold mt-2">What is PHP? A Beginner's Guide</h5>
                        <p class="text-secondary">
                            PHP is a server-side scripting language primarily used for web development, powering millions of websites...
                        </p>
                        <a href="detail.php" class="btn-read">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog 2 -->
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=60" alt="">
                    <div class="blog-body">
                        <small class="text-muted">2024/02/10</small>
                        <h5 class="fw-bold mt-2">How to Become a Web Developer</h5>
                        <p class="text-secondary">
                            Becoming a web developer requires understanding front-end, backend, databases and frameworks...
                        </p>
                        <a href="#" class="btn-read">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog 3 -->
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1522199755839-a2bacb67c546?auto=format&fit=crop&w=800&q=60" alt="">
                    <div class="blog-body">
                        <small class="text-muted">2024/03/04</small>
                        <h5 class="fw-bold mt-2">Why Bootstrap is Great for UI</h5>
                        <p class="text-secondary">
                            Bootstrap makes web design faster and responsive by offering a wide set of pre-styled components...
                        </p>
                        <a href="#" class="btn-read">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog 4 -->
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=800&q=60" alt="">
                    <div class="blog-body">
                        <small class="text-muted">2024/03/21</small>
                        <h5 class="fw-bold mt-2">Top 5 Programming Languages in 2024</h5>
                        <p class="text-secondary">
                            Python, JavaScript, C#, Java and Go remain top choices for software development...
                        </p>
                        <a href="#" class="btn-read">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog 6 -->
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=800&q=60" alt="">
                    <div class="blog-body">
                        <small class="text-muted">2024/04/22</small>
                        <h5 class="fw-bold mt-2">How Databases Work — Simple Explanation</h5>
                        <p class="text-secondary">
                            Databases store, retrieve and organize data in structured form using SQL and relational models...
                        </p>
                        <a href="#" class="btn-read">Read More →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>