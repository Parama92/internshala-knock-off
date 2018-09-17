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
    <?php 
        require './views/layout/navbar.php';
        if (isset($error)) { ?>
            <div class="error">
                <?php echo $error; ?>
                <span class="close">&times;</span>
            </div>
    <?php } ?>

    <div class="search-container">
        <form action="" method="get">
            <div class="form-group">
                <input type="text" name="search" id="search" class='form-control' placeholder='Computer Science, MBA, etc.'>
                <button class='btn btn-outline-dark' type='submit'><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class='cities-container'>
        <h4>Internships in popular cities</h4>
        <div class="row cities">
            <div class="city"><span>Kolkata</span></div>
            <div class="city"><span>mumbai</span></div>
            <div class="city"><span>delhi</span></div>
            <div class="city"><span>chennai</span></div>
            <div class="city"><span>bangalore</span></div>
            <div class="city"><span>remote</span></div>
        </div>
    </div>
    <?php require './views/layout/scripts.php' ?>
    <script>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'login') {?>
            $('#login').modal()
        <?php } 
            unset($_GET['action']);
        ?>
    </script>
</body>
</html>