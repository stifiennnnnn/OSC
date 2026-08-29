<!DOCTYPE html>
<html lang="en">
<?php include '../../includes/head.php'; ?>
<link rel="stylesheet" href="../../assets/css/login.css">
<body>
    <?php include '../../includes/header.php'; ?>
    <section class="page">
        <div class="formcon">
            <form class="form">
                <h1>Sign Up</h1><br>
                <label for="fullname">Full Name</label><br>
                <input type="text" name="fullname" id="fullname" placeholder="Enter Your Full Name Here" required><br>
                <label for="email">Email</label><br>
                <input type="text" name="email" id="email" placeholder="Enter Your Email Here" required><br>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="pass" placeholder="Enter Your Password Here" required><br>
                <label for="repass">Confirm Your Password</label><br>
                <input type="password" name="repass" id="repass" placeholder="Enter Your Password Here Again" required><br><br>
                <button type="submit" name="signup">Sign Up</button><br>
                <p>Sign In <a href="../../views/login/index.php">Here</a> If You Already Have An Account</p>
            </form>
        </div>
        <div class="gambars">
            <img src="../../assets/images/Group 21.png">
        </div>
    </section>
    <?php include '../../includes/footer.php'; ?>
</body>
</html>