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
    
?>