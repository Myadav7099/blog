<?php
include_once(__DIR__ . '/../function.php');
include_once(__DIR__ . '/loginstyle.php');

$success = getMessage('success', true);
$error = getMessage('error', true);

?>
<!DOCTYPE html>
<html lang="en">


<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>


    <form action="./adminServer/adminLoginServer.php" method="POST">
        <h3>Admin Login </h3>
        <?php if (isset($error) && !is_array($error)) { ?>
            <p style="color:red"><?php echo $error; ?></p>
        <?php } ?>

        <label for="email">E-mail</label>
        <input type="email" placeholder="Email" id="email" name="email">
        <?php if (isset($error) && isset($error['email'])) { ?>
            <p style="color:red"><?php echo $error['email']; ?></p>
        <?php } ?>

        <label for="password">Password</label>
        <input type="text" placeholder="Password" id="password" name="password">
        <?php if (isset($error) && isset($error['password'])) { ?>
            <p style="color:red"><?php echo $error['password']; ?></p>
        <?php } ?>

        <button type="submit">Log In</button>
    </form>
</body>

</html>