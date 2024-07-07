</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="index.php">Home</a>
        <?php if(!isset($_SESSION['user-id'])):?>
            <a class="nav-link" href="signup.php">Sign up</a>
            <a class="nav-link" href="login.php">Log in</a>
        <?php else: ?>
            <a href="logout.php" class="btn btn-danger">Log out</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>