<?php
include 'connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1('pass');
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $verify_user = $conn->prepare("SELECT *FROM 'users' WHERE email=? AND password=? LIMIT 1");
    $verify_user->execute([$email, $pass]);
    $row = $verify_user->fetch(PDO::FETCH_ASSOC);

    if ($verify_user->rowCount() > 0) {
        setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:home.php');
    } else {
        $warning_msg[] = "incorrect email or password!";
    }
}
$success_msg[] = "its working!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'user_header.php'; ?>

    <section class="form-container">
        <form action="" method="post">
            <h3>welcome back!</h3>
            <input type="email" name="email" require maxlength="50" placeholder="enter your email" class="box">
            <input type="password" name="c_pass" require maxlength="50" placeholder="confirm your c_password" class="box">
            <p>don't have an account<a href="register.php">register now</a></p>
            <input type="submit" value="login now" name="submit" class="btn">
        </form>
    </section>

    <?php include 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="js/script.js">
        <?php include 'components/message.php'; ?>
    </script>
</body>

</html>