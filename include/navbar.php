</head>
<style>
    .collapse-visible .logout {
        background-color: var(--color-danger);
    }

    .collapse-visible .logout a {
        color: var(--color-light);
    }

    .collapse-visible .logout:hover {
        background-color: var(--color-danger-hover);
    }
</style>
<body>
    <nav class="navbar bg-dark text-light">
        <a href="index.php" class="logo"><img src="static/img/logo3.png" alt=""></a>
        <ul class="to-hide">
            <?php if(!isset($_SESSION['user-id'])): ?>
                <li><a href="signup.php">Sign up</a></li>
                <li><a href="login.php">Log in</a></li>
            <?php endif; ?>
            <li><a href="#">Products</a></li>
            <?php if(isset($_SESSION['user-id'])): ?>
                <li><a href="logout.php" class="btn btn-danger"><img src="static/img/logoutLogo.svg" alt=""></a></li>
            <?php endif; ?>
        </ul>
        <button class="btn btn-collapse" id="navBtn">
            <img src="static/img/menuLogo.svg" alt="">
        </button>
    </nav>
    <ul class="collapse text-black" id="collapse">
            <?php if(!isset($_SESSION['user-id'])): ?>
                <li><a href="signup.php">Sign up</a></li>
                <li><a href="login.php">Log in</a></li>
            <?php endif; ?>
            <li><a href="#">Products</a></li>
            <?php if(isset($_SESSION['user-id'])): ?>
                <li class="logout"><a href="logout.php">Log out</a></li>
            <?php endif; ?>
    </ul>