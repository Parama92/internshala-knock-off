<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Internshala</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCollapse" aria-controls="navCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navCollapse">
      <ul class="navbar-nav ml-auto">
        <?php if ((!isset($type) && !isset($_SESSION['type'])) || (isset($_SESSION['type']) && ($_SESSION['type']!=='employer')) || ((isset($type) && $type!='employer'))) { ?>
          <li class="nav-item">
          <a class="btn btn-outline-light" href="internships.php">Internships</a>
        </li>
        <?php } ?>
        <?php if(!isset($_SESSION['type'])) { ?>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="#" data-toggle="modal" data-target="#login">Login</a>
          </li>
          <?php if (!isset($type)) { ?>
            <li class="nav-item">
                <button class='btn btn-outline-light dropdown-toggle' id='registerDropdown' role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Register</button>
                <div class="dropdown-menu" aria-labelledby="registerDropdown">
                  <a class="dropdown-item" href="register.php?type=student">Student</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="register.php?type=employer">Employer</a>
                </div>
            </li>
          <?php } 
        } else {?>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="dashboard.php?nav=app">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="logout.php">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header">
        <h5 class="login-modal-title">
          <span class='student-login active'>
            Student
          </span>
          <span class='employer-login'>
            Employer
          </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="login.php" method="post">
          <div class="form-group">
            <label for="login-email">Email</label>
            <input type="email" class="form-control" id='login-email' name='email' required>
          </div>
          <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" class="form-control" id='login-password' name='password' required>
            <span id='show-password'><i class="fas fa-eye-slash"></i></span>
          </div>
          <input id='login-type' type="hidden" name="type" value='student'>
          <button type="submit" class='btn btn-outline-dark btn-block'>Login</button>
        </form>
      </div>
      <div class="modal-footer">New to Internshala? Register as &nbsp;<a href="register.php?type=student"> Student</a> / <a href="register.php?type=employer"> Employer</a></div>
    </div>
  </div>
</div>