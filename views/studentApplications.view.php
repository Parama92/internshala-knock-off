<div class="application-container col-10 offset-1">
    <?php  if (isset($error)) { ?>
        <div class="error"><?php echo $error; ?></div>
    <?php } ?>
    <?php foreach ($stuApps as $stuApp) {?>
        <div class="application">
            <div class="row">
                <h5>Applied To :</h5>
                <div class="col-6"><p><?php echo $stuApp['org'];?></p></div>
            </div>
        </div>
    <?php } ?>
</div>