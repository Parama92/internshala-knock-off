<div class="post-container">
    <form action="" method="post">
        <section class="post-section">
            <h4>Internship Overview</h4>
            <div class="row mb-5">
                <div class="col">
                    <h6>Select field of internship</h6>
                    <?php foreach ($techs as $tech) {?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="techid" id="<?php echo 'tech'.$tech['techid'] ?>" value="<?php echo $tech['techid'] ?>" required>
                            <label class="form-check-label" for="<?php echo 'tech'.$tech['techid'] ?>">
                                <?php echo $tech['field'] ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h6>Skill(s) that you are looking for: </h6>
                    <div class="form-group">
                        <input type="text" class="form-control" name='skills' placeholder="Eg., Good communication skills, English proficiency, etc." required>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h6>Internship Location: </h6>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="location">
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h6>How many interns are you looking for?</h6>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="number" class="form-control" name="interns" min='1'>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h6>Provide a short description for the internship :</h6>
                    <textarea name="description" class="form-control"></textarea>
                </div>
            </div>
        </section>
        <section class="post-section">
            <h4>Relevant dates</h4>
            <div class="row mb-5">
                <div class="col">
                    <h6>Internship start date: </h6>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="start" id="start">
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-4">
                    <h6>Internship Duration :</h6>
                </div>
                <div class="col-6">
                    <input type="number" name="duration" id="duration" class="form-control" min="1">
                </div>
                <div class="col-2">months</div>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h6>Apply to Internship by: </h6>
                </div>
                <div class="col">
                    <input type="date" class="form-control" name="apply" id="apply">
                </div>
            </div>
        </section>
        <section class="post-section">
            <h4>Stipend</h4>
            <div class="row mb-5">
                <div class="col">
                    <div class="row">
                        <div class="col"><h6>Stipend :</h6></div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="number" class="form-control" name='stipend'>
                        </div>
                        <div class="col">
                            <select name="stipend-rate" class="form-control">
                                <option value="monthly">Monthly</option>
                                <option value="lump-sum">Lump-sum</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='my-5'>
            <input type="hidden" name="submit" value="submitted">
            <button type="submit" class="btn btn-outline-light btn-block">Post</button>
        </section>
    </form>
</div>