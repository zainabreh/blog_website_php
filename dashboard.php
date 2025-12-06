
<?php  
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* ========== LAYOUT WRAPPER ========== */
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            background: #f4f6f9;
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

        /* ========== MAIN CONTENT ========== */
        .dashboard-content {
            flex: 1;
            padding: 40px;
        }

        .page-heading {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #1f2937;
        }

        /* ========== TABLE ========== */
        .blog-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .blog-table thead {
            background: #e2e8f0;
        }

        .blog-table th,
        .blog-table td {
            padding: 14px 18px;
            text-align: left;
            font-size: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .blog-table tbody tr:hover {
            background: #f8fafc;
        }

        /* ========== TABLE ACTION BUTTONS ========== */
        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            font-weight: 600;
            color: #fff;
            transition: 0.25s;
        }

        /* View */
        .view {
            background: #3b82f6;
        }

        .view:hover {
            background: #2563eb;
        }

        /* Edit */
        .edit {
            background: #f59e0b;
        }

        .edit:hover {
            background: #d97706;
        }

        /* Delete */
        .delete {
            background: #ef4444;
        }

        .delete:hover {
            background: #dc2626;
        }

        .navbar {
            /* width: 100%; */
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

        .clamp-title {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-desc {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
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

    <div class="dashboard-wrapper">

        <!-- Sidebar -->
        <aside class="sidebar">
            <h2 class="sidebar-title">Dashboard</h2>

            <nav class="sidebar-menu">
                <a href="createBlog.php" class="menu-link">Add New Post</a>
                <a href="index.php" class="menu-link">View Website</a>
            </nav>

            <a href="logout.php" class="logout-btn">Logout</a>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-content">
            <h1 class="page-heading">Your Blog Posts</h1>

            <table class="blog-table">
                <thead>
                    <tr>
                        <th>Publication Date</th>
                        <th>Title</th>
                        <th>Article</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Example Row -->

                    <?php
                    $query = "select * from blogs where userId=?";
                    include_once('database.php');
                    $stmt = $conn->prepare($query);
                    $uId = $_SESSION['user_id'];
                    $stmt->bind_param("i", $uId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows === 0) {
                        echo "<div class='alert alert-info' role='alert'>
                        You have not created any blog posts yet.
                    </div>";
                    } else {
                        while ($row = $result->fetch_assoc()) {
                            $shortTitle = substr($row['blog_title'], 0, 20) . '...';
                            $shortDesc = substr($row['description'], 0, 60) . '...';

                            echo "
                             <tr>
                                <td>" . htmlspecialchars($row['published_date']) . "</td>
                                <td>" . htmlspecialchars($shortTitle) . "</td>
                                <td>" . htmlspecialchars($shortDesc) . "</td>
                                <td class='actions'>
                                    <a href='detail.php?id=" . htmlspecialchars($row['id']) . "' class='btn view'>View</a>
                                    <a href='updateBlog.php?id=" . htmlspecialchars($row['id']) . "' class='btn edit'>Edit</a>
                                    <a href='deleteBlog.php?id=" . htmlspecialchars($row['id']) . "' class='btn delete'>Delete</a>
                                </td>
                            </tr>";
                        }
                    }
                    ?>

                    <!-- Repeat rows dynamically with PHP -->
                </tbody>
            </table>
        </main>

    </div>
</body>

</html>