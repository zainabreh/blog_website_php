<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Title - Blog Detail Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    body{ background:#f6f8fc; font-family:'Segoe UI',sans-serif;}

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

    .post-box{
        background:#fff; 
        padding:25px; 
        border-radius:12px;
        box-shadow:0 8px 20px rgba(0,0,0,.08);
    }
    .post-img{
        width:100%;
         height:350px;
          object-fit:cover;
        border-radius:12px;
    }
    .download-btn{
        background:#007bff;color:#fff;border:none;
        padding:8px 20px;border-radius:50px;font-weight:600;
        text-decoration:none;display:inline-block;margin-top:15px;
    }
    .download-btn:hover{background:#0056d6;}
    .dashboard-content {
    flex: 1;
    padding: 40px;
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

<main>
    <div class="dashboard-content">
 <!-- Blog Detail Box -->
        <img src="https://i.ibb.co/tPQyK0n/office.jpg" class="post-img" alt="Blog Image">

        <h2 class="fw-bold mt-4">The Power of Creative Blogging</h2>

        <p class="text-muted mb-1">Published: 25 February 2025</p>
        <p class="text-muted">Author: <b>Admin</b></p>

        <hr>

        <p style="font-size:17px;line-height:1.8;">
            Blogging is more than just writing words. It is a strong medium through which
            ideas, creativity, and information can be shared globally. Whether you write
            for business, personal development, or storytelling, blogs help you communicate
            with the world in a meaningful way.
            <br><br>
            A powerful blog attracts readers not just with information, but with presentation.
            Proper layout, visuals, formatting, and design make the content more engaging and
            memorable for users.
        </p>

        <!-- File Download Button (dummy pdf) -->
        <a href="#" class="download-btn">Download PDF File</a>
</div>
</main>
   

</div>

</body>
</html>
