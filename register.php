<?php
//include 'connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['submit'])) {
    $id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name);
    $email = $_POST['email'];
    $email = filter_var($email);
    $number = $post['number'];
    $number = filter_var($number);
    $pass = sha1['pass'];
    $pass = filter_var($pass);
    $c_pass = sha1['c_pass'];
    $c_pass = filter_var($c_pass);

    $select_email = $conn->prepare("SELECT *FROM 'users' WHERE email=?");
    $select_email->execute([$email]);

    if ($select_email->rowCount() > 0) {
        $warning_msg[] = 'email already taken!';
    } else {
        if ($pass != $c_pass) {
            $warning_msg[] = 'password not matching!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO 'users'(id,name,number,email,password) VALUES(?,?,?,?,?)");
            $insert_user->execute([$id, $name, $number, $email, $c_pass]);

            if ($insert_user) {
                $verify_user = $conn->prepare("SELECT *FROM 'users' WHERE email=? AND password=? LIMIT 1");
                $verify_user->execute([$email, $c_pass]);
                $row = $verify_user->fetch(PDO::FETCH_ASSOC);

                if ($verify_user->rowCount() > 0) {
                    setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
                    header('location:home.php');
                } else {
                    $error_msg[] = "something went wrong!";
                }
            }
        }
        $success_msg[] = "its working!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'user_header.php'; ?>
    <section class="form-container">
        <form action="" method="post">
            <h3>create an account</h3>
            <input type="text" name="name" require maxlength="50" placeholder="enter your name" class="box">
            <input type="email" name="email" require maxlength="50" placeholder="enter your email" class="box">
            <input type="number" name="number" require maxlength="50" placeholder="enter your number " min="0" max="9999999999" maxlength="50" class="box">
            <input type="password" name="pass" require maxlength="50" placeholder="enter your password" class="box">
            <input type="password" name="c_pass" require maxlength="50" placeholder="confirm your c_password" class="box">
            <p>already have an account<a href="login.php">login now</a></p>
            <input type="submit" value="register new" name="submit" class="btn">
        </form>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="script.js">
        <?php include 'message.php'; ?>
    </script>
</body>

</html>