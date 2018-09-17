<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internshala Knock-off</title>
    <?php require './views/layout/links.php' ?>
</head>
<body>
    <?php require './views/layout/navbar.php' ?>
    <?php if (isset($error) && strlen($error)>0) {?>
        <div class="error"><?php echo $error; ?><span class="close">&times;</span></div>
    <?php } ?>
    <div class="row">
        <div class="col-10 offset-1 application-form-container">
            <form action="" method="post">
                <h5 class='mb-4'>Why should you be hired : </h5>
                <textarea name="application" id="application-form" cols="20" rows="6" class="form-control mb-4" placeholder="Tell the Employer why you are so awesome" required></textarea>
                <input type="hidden" name="submit" value="submitted">
                <button type="submit" class="btn btn-block btn-outline-light">Apply</button>
            </form>
        </div>
    </div>
    <?php require './views/layout/scripts.php' ?>
    <script>
        <?php if (isset($goBack)) {?>
            history.back();
        <?php } ?>
    </script>
</body>
</html>