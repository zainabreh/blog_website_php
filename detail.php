<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blog Title - Blog Detail Page</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
    body{ background:#f6f8fc; font-family:'Segoe UI',sans-serif;}
    .post-box{
        background:#fff; padding:25px; border-radius:12px;
        box-shadow:0 8px 20px rgba(0,0,0,.08);
    }
    .post-img{
        width:100%; height:350px; object-fit:cover;
        border-radius:12px;
    }
    .download-btn{
        background:#007bff;color:#fff;border:none;
        padding:8px 20px;border-radius:50px;font-weight:600;
        text-decoration:none;display:inline-block;margin-top:15px;
    }
    .download-btn:hover{background:#0056d6;}
</style>
</head>
<body>

<div class="container py-5">

    <!-- Blog Detail Box -->
    <div class="post-box">
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

</div>

</body>
</html>
