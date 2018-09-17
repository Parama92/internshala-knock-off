<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internships</title>
    <?php require './views/layout/links.php' ?>
</head>
<body>
    <?php require './views/layout/navbar.php' ?>

    <div class="container">
        <?php foreach ($internships as $internship) {?>
                <div class="internship">
                <h4><?php echo $internship['field'] ?></h4>
                <div class="brand"></div>
                <div class="row">
                    <div class="col">
                        <p><?php echo $internship['org'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col"><p>Location: <?php echo strlen($internship['location']) !== 0 ? $internship['location'] : 'Undecided' ?></p></div>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Start By</h5>
                        <p><?php echo is_null($internship['start']) ? 'Immediately' : date('d-m-Y',strtotime($internship['start'])) ?></p>
                    </div>
                    <div class="col">
                        <h5>Duration</h5>
                        <p><?php echo (($internship['duration']) != 0) ? $internship['duration'].' months' : 'To be decided' ?></p>
                    </div>
                    <div class="col">
                        <h5>Stipend</h5>
                        <p><?php echo is_null($internship['stipend']) ? 'To be decided' : $internship['stipend']; ?></p>
                    </div>
                    <div class="col">
                        <h5>Posted On</h5>
                        <p><?php echo (date('d-m-Y',strtotime($internship['posted']))) ?></p>
                    </div>
                    <div class="col">
                        <h5>Apply By</h5>
                        <p><?php echo is_null($internship['apply']) ? 'Immediately' : date('d-m-Y',strtotime($internship['apply'])) ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <a href='internshipDetails.php?intrid=<?php echo $internship['intrid']; ?>' class="btn btn-outline-light btn-block" disabled>View Details</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php require './views/layout/scripts.php' ?>
</body>
</html>