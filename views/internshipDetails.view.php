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

    <?php if (strlen($error)>0) {?>
        <div class="error"><?php echo $error; ?><span class="close">&times;</span></div>
    <?php } else {?>
        <div class="container internship-container">
            <div class="row my-5">
                <div class="col text-center"><h2>Work at <?php echo $details['org']; ?></h2></div>
            </div>
            <div class="internship-details">
                <h4><?php echo $details['field']; ?></h4>
                <div class="row">
                    <div class="col">
                        <p><?php echo $details['org']; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p>Location: <?php echo strlen($details['location']) !== 0 ? $details['location'] : 'Undecided' ?></p></div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Start By</h5>
                        <p><?php echo is_null($details['start']) ? 'Immediately' : date('d-m-Y',strtotime($details['start'])) ?></p>
                    </div>
                    <div class="col">
                        <h5>Duration</h5>
                        <p><?php echo (($details['duration']) != 0) ? $details['duration'].' months' : 'To be decided' ?></p>
                    </div>
                    <div class="col">
                        <h5>Stipend</h5>
                        <p><?php echo is_null($details['stipend']) ? 'To be decided' : $details['stipend']; ?></p>
                    </div>
                    <div class="col">
                        <h5>Posted On</h5>
                        <p><?php echo (date('d-m-Y',strtotime($details['posted']))) ?></p>
                    </div>
                    <div class="col">
                        <h5>Apply By</h5>
                        <p><?php echo is_null($details['apply']) ? 'Immediately' : date('d-m-Y',strtotime($details['apply'])) ?></p>
                    </div>
                </div>
            </div>
            <div class="internship-details">
                <div class="row">
                    <div class="col">
                        <?php if (strlen($details['description'])>0) {?>
                            <p><b>About the internship :</b></p>
                            <p><?php echo $details['description']; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Number of interships available :</b> <?php echo ($details['interns'] != 0 ? $details['interns'] : 'To be decided'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p><b>Skills required : </b><?php echo $details['skills'];?></p>
                    </div>
                </div>
            </div>
            <form action="apply.php" method="get">
                <input type="hidden" name="intrid" value="<?php echo $intrid ?>">
                <button type="submit" class="btn btn-outline-light btn-block my-5" <?php if((isset($_SESSION['type']) && $_SESSION['type'] == 'employer') || $hasPosted) { echo 'disabled'; } ?>>Apply Now</button>
            </form>
        </div>
    <?php } ?>
    <?php require './views/layout/scripts.php' ?>
</body>
</html>