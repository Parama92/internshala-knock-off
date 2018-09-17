<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <?php require './views/layout/links.php' ?>
</head>
<body>
    <?php require './views/layout/navbar.php' ?>

    <img src="https://hire-cdn.codementor.io/images/HomePage/header-background.c4145518.png" width='100%' alt="">
    <div id="registration-form">
        <form action="" method="post">
            <?php if($type == 'employer') { ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input class='form-control' id='fname' type="text" name="fname" required>
                        </div>
                        <div class="col">
                            <label for="lname">Last Name</label>
                            <input class='form-control' id='lname' type="text" name="lname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="org-name">Organisation Name</label>
                    <input class='form-control' id='org-name' type="text" name="org-name" required>
                </div>
                <div class="form-group">
                    <label for="org-email">Official Email-Id</label>
                    <input class='form-control' id='org-email' type="text" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class='form-control' id='password' type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input class='form-control' id='phone' type="tel" name="phone" required>
                </div>
            <?php } else { ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="fname">First Name</label>
                            <input class='form-control' id='fname' type="text" name="fname" required>
                        </div>
                        <div class="col">
                            <label for="lname">Last Name</label>
                            <input class='form-control' id='lname' type="text" name="lname" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="stu-email">Email</label>
                    <input class='form-control' id='stu-email' type="text" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class='form-control' id='password' type="password" name="password" required>
                </div>
            <?php } ?>
            <input id='login-type' type="hidden" name="type" value="<?php echo $type ?>">
            <?php  if (isset($error)) { ?>
                <div class="error"><?php echo $error; ?></div>
            <?php } ?>
            <button class='btn btn-dark btn-block' type="submit">Register</button>
        </form>
    </div>

    <?php require './views/layout/scripts.php' ?>
</body>
</html>