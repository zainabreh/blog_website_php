<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <style>
        /* ============ Dashboard Layout ============ */
        .dashboard-container {
            max-width: 1050px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .dash-title {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            color: #2f3542;
            margin-bottom: 35px;
        }

        /* ============ Blog Card Grid ============ */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
        }

        /* ============ Blog Card ============ */
        .blog-card {
            background: rgba(255, 255, 255, 0.75);
            border-radius: 22px;
            backdrop-filter: blur(14px);
            padding: 18px;
            box-shadow:
                0 10px 25px rgba(0, 0, 0, 0.08),
                0 4px 10px rgba(0, 0, 0, 0.04);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
        }

        .blog-card:hover {
            transform: translateY(-4px);
        }

        /* Blog Featured Image */
        .blog-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 16px;
            margin-bottom: 14px;
        }

        /* ============ Blog Content ============ */
        .blog-content {
            flex: 1;
        }

        .blog-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #1e293b;
        }

        .blog-desc {
            font-size: 15px;
            color: #475569;
            margin-bottom: 10px;
        }

        .blog-date {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 15px;
        }

        /* ============ Action Buttons ============ */
        .blog-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 10px;
            font-size: 14px;
            text-decoration: none;
            transition: 0.25s;
            font-weight: 500;
        }

        /* Edit Button */
        .edit {
            background: #4a78f8;
            color: white;
        }

        .edit:hover {
            background: #3a64d6;
        }

        /* Delete Button */
        .delete {
            background: #ef4444;
            color: white;
        }

        .delete:hover {
            background: #d13131;
        }
    </style> -->

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
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
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
                <tr>
                    <td>2023/09/25</td>
                    <td>First Blog Edited</td>
                    <td>Test Summary</td>
                    <td class="actions">
                        <a href="detail.php" class="btn view">View</a>
                        <a href="updateBlog.php" class="btn edit">Edit</a>
                        <a href="deleteBlog.php" class="btn delete">Delete</a>
                    </td>
                </tr>

                <!-- Repeat rows dynamically with PHP -->
            </tbody>
        </table>
    </main>

</div>


     <div class="dashboard-container">

        <h1 class="dash-title">Your Blog Posts</h1>

        <div class="blog-grid">

            <!-- Example Blog Card -->
            <div class="blog-card">
                <img src="sample.jpg" class="blog-img" alt="Blog Image">

                <div class="blog-content">
                    <h3 class="blog-title">My First Blog</h3>
                    <p class="blog-desc">This is a short description of your blog post...</p>
                    <p class="blog-date">Posted on: 2025-02-20</p>
                </div>

                <div class="blog-actions">
                    <a href="edit.php?id=1" class="btn edit">Edit</a>
                    <a href="delete.php?id=1" class="btn delete">Delete</a>
                </div>
            </div>

            <!-- Duplicate this card dynamically with PHP -->
            <!-- ... -->

        </div>
    </div> 

</body>

</html>