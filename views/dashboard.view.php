<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <?php require './views/layout/links.php' ?>
</head>
<body>
    <?php require './views/layout/navbar.php' ?>
    <?php  if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>
    <?php if(isset($_SESSION['type']) && $_SESSION['type'] !== 'student') { ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="side-nav">
                        <ul class="list-group">
                            <a href="dashboard.php?nav=app"><li class="list-group-item">View Applications</li></a>
                            <a href="dashboard.php?nav=post"><li class="list-group-item">Post an Internship</li></a>
                        </ul>
                    </div>
                </div>
                <div class="col-8">
                    <?php 
                        if ($nav == 'app') {
                            require './views/applications.view.php';
                        }
                        else {
                            require './views/postInternship.view.php';
                        }
                    ?>
                </div>
            </div>
        </div>
    <?php } else if(isset($_SESSION['type']) && $_SESSION['type'] == 'student') {
        require './views/studentApplications.view.php';
    } ?>
    <?php require './views/layout/scripts.php' ?>
</body>
</html>