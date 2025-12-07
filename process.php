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
                    $_SESSION['profile_image'] = $user['profile_image'];
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
    if (isset($_GET['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit();
    }
    ?>


 <?php
    session_start();
    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST['createblog'])) {

        $title = $_POST['title'];
        $article = $_POST['article'];
        $pub_date = $_POST['pub_date'];
        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];
        $targetPath = './uploads/' . $image;

        if (!move_uploaded_file($tempImage, $targetPath)) {
            echo "<div class='alert alert-danger' role='alert'>
                        Failed to upload blog image.
                    </div>";
            exit();
        }

        include_once('database.php');

        if (empty($title) || empty($article) || empty($pub_date) || empty($image)) {
            echo "<div class='alert alert-danger' role='alert'>
                    All fields are required.
                </div>";
            exit();
        }

        $uId = $_SESSION['user_id'];
        $uName = $_SESSION['username'];

        $insertQuery = "insert into blogs (userId,author,blog_title,description,blog_image,published_date) values(?,?,?,?,?,?)";

        $stmt = $conn->prepare($insertQuery);

        $stmt->bind_param('isssss', $uId, $uName, $title, $article, $image, $pub_date);
        if ($stmt->execute()) {
            echo "<div class='alert alert-success' role='alert'>
                            Blog Created Successfully.
                        </div>";

            // Sending email after successful blog creation

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->isHTML(true);
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Username = 'zainab.rd.93@gmail.com';
                $mail->Password = 'afwl rbfb lnkc yppk';

                $mail->setFrom('no-reply@yourwebsite.com', 'Your Website');
                $mail->addAddress('subscriber@example.com', 'Subscriber Name'); // recipient
                $mail->Subject = "New Blog Posted: $title";
                $mail->Body = "
            <h2>New Blog Published</h2>
            <p><strong>Title:</strong> $title</p>
            <p>$article</p>
            <p>Check it out on your website!</p>
        ";

                $mail->send();
            } catch (Exception $e) {
                echo "Email could not be sent. Error: {$mail->ErrorInfo}";
            }

            header('Location: dashboard.php');
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                            Blog Creation Failed. Please try again.
                        </div>";
        }
        $stmt->close();
        $conn->close();
    }

    ?>


 <?php

    if (isset($_POST['update_blog'])) {

        include_once('database.php');

        $blogId = $_GET['id'];
        $title = $_POST['title'];
        $article = $_POST['article'];
        $pub_date = $_POST['pub_date'];

        $oldImageQuery = $conn->query("SELECT blog_image FROM blogs WHERE id=$blogId");
        $oldImageRow = $oldImageQuery->fetch_assoc();
        $oldImage = $oldImageRow['blog_image'];


        $image = $_FILES['image']['name'];
        $tempImage = $_FILES['image']['tmp_name'];
        $targetPath = "./uploads/" . $image;


        if (!empty($image)) {

            if (!move_uploaded_file($tempImage, $targetPath)) {
                echo "<div class='alert alert-danger'>Failed to upload blog image.</div>";
                exit();
            }
            $blog_image = $image;
        } else {

            $blog_image = $oldImage;
        }


        if (empty($title) || empty($article) || empty($pub_date)) {
            echo "<div class='alert alert-danger'>All fields are required.</div>";
            exit();
        }

        $updateQuery = "UPDATE blogs 
                    SET blog_title=?, description=?, blog_image=?, published_date=? 
                    WHERE id=?";

        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssi", $title, $article, $blog_image, $pub_date, $blogId);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Blog updated successfully.</div>";
            header("Location:detail.php?id=$blogId");
        } else {
            echo "<div class='alert alert-danger'>Failed to update blog.</div>";
        }
    }

    ?>