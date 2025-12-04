<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Blog Post</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body{ background:#eef2f7; font-family: 'Segoe UI', sans-serif; }
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
