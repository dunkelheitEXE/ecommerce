</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="static/img/MAIN_LOGO.png" alt="Bootstrap" width="100" height="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <?php if(!isset($_SESSION['user-id'])):?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="signupSeller.php">I want to sell</a></li>
              <li><a class="dropdown-item" href="#">As customer</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Log in</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Merch</a>
          </li>
      </ul>
      </div>
      <?php else: ?>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger">Log out</a>
        </li>
      <?php endif; ?>
      </ul>
  </div>
</nav>