 <!-- Register Code -->
 <?php
    include_once('database.php');

    if (isset($_POST['register'])) {



        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $profileImage = $_FILES['profile_img']['name'];
        $ext = pathinfo($profileImage, PATHINFO_EXTENSION);
        $allowedTypes = array('gif', 'jpg', 'jpeg', 'png');
        $tempImage = $_FILES['profile_img']['tmp_name'];
        $targetPath = './uploads/' . $profileImage;
        $errors = array();

        if (empty($username) || empty($email) || empty($password)) {
            array_push($errors, 'All fields are required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, 'Invalid email format.');
        }

        if (strlen($password) < 8) {
            array_push($errors, 'Password must be at least 8 characters long.');
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>
                                $error
                            </div>";
            }
            exit();
        }

        if (!in_array($ext, $allowedTypes) && !empty($profileImage)) {
            echo "<div class='alert alert-danger' role='alert'>
                            Invalid file type for profile image.
                        </div>";
            exit();
        }

        if (!empty($profileImage)) {
            if (!move_uploaded_file($tempImage, $targetPath)) {
                echo "<div class='alert alert-danger' role='alert'>
                                Failed to upload profile image.
                            </div>";
                exit();
            }
        }

        if (!empty($profileImage)) {
            $insertQuery = "INSERT INTO users (username, email, password, profile_image) VALUES (?, ?, ?, ?)";
        }

        $stmt = $conn->prepare($insertQuery);

        $stmt->bind_param("ssss", $username, $email, $hash, $profileImage);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success' role='alert'>
                            Registration successful.
                        </div>";
            header('Location: login.php');
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                            Registration failed. Please try again.
                        </div>";
        }
        $stmt->close();
        $conn->close();
    }
    ?>




<!-- login code -->
 <?php

    if (isset($_POST['login'])) {
        include_once('database.php');

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email) || empty($password)) {
            echo "<div class='alert alert-danger' role='alert'>
                    All fields are required.
                </div>";
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger' role='alert'>
                    Invalid email format.
                </div>";
            exit();
        } else {
            $query = "SELECT * FROM users WHERE email = ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {

                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: index.php');
                    exit();
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                        Incorrect password.
                    </div>";
                }
            } else {

                echo "<div class='alert alert-danger' role='alert'>
                    Email not found.
                </div>";
            }
        }
    }
    ?>


<?php
if(isset($_POST['logout'])) {
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}
?>


<?php 

if(isset($_POST['createblog'])){

    $title = $_POST['title'];
    $article = $_POST['article'];
    $pub_date = $_POST['pub_date'];
    $image = $_FILES['image']['name'];
    $tempImage = $_FILES['image']['tmp_name'];
    $targetPath = './uploads/' . $image;

    if(!move_uploaded_file($tempImage, $targetPath)){
        echo "<div class='alert alert-danger' role='alert'>
                        Failed to upload blog image.
                    </div>";
        exit();
    }

    include_once('database.php');

    if(empty($title) || empty($article) || empty($pub_date) || empty($image)){
        echo "<div class='alert alert-danger' role='alert'>
                    All fields are required.
                </div>";
        exit();
    }

    session_start();
    $uId = $_SESSION['user_id'];

    $insertQuery = "insert into blogs (userId,blog_title,description,blog_image,published_date) value('?,?,?,?,?,?')";

    

}

?>