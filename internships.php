<?php
    require_once './core/setup.php';

    $internships = Internship::getAll();

    require 'views/internships.view.php';

?>