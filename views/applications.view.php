<div class="application-container">
    <?php  if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>
    <?php foreach ($apps as $app) {?>
        <div class="application">
            <div class="row">
                <h5>Name :</h5>
                <div class="col-6"><p><?php echo $app['first'].' '.$app['last'] ?></p></div>
            </div>
            <div class="row app-details">
                <h5>Application :</h5>
                <div class="col"><p><?php echo $app['application'] ?></p></div>
            </div>
        </div>
    <?php } ?>
</div>