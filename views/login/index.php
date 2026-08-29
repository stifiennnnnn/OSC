<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/login.css">
<body>
    <?php include '../../includes/header.php'; ?>
    <section class="page">
        <div class="formcon">
            <form class="form">
                <h1>Sign In</h1><br>
                <label for="email">Email</label><br>
                <input type="text" name="email" id="email" placeholder="Enter Your Email Here" required><br>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="pass" placeholder="Enter Your Password Here" required><br><br>
                <p>Forgot Your Password? <a href="../../views/forgot-password/index.php">Click here.</a><br><br>
                <button type="submit" name="signin">Sign In</button><br>
                <p>Sign Up <a href="../../views/register/index.php">Here</a> If You Haven't Created An Account</p>
            </form>
        </div>
        <div class="gambars">
            <img src="../../assets/images/Group 20.png">
        </div>
    </section>
    <?php include '../../includes/footer.php'; ?>
</body>
</html>