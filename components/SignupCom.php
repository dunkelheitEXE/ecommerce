<div class="container" style="width: 70%;">
    <div class="row">
        <div class="col text-center j-center align-center"><img src="static/img/interior.jpeg" alt="" style="width: 90%; margin: 0 auto;"></div>
        <div class="col">
            <form action="signup.php" method="post" class="form focus-orange" enctype="multipart/form-data">
                <h2 class="form-title"><img src="static/img/personAddLogo.svg" alt=""> Sign up</h2>
                <input type="text" name="name" placeholder="Your Name" class="form-control" required>
                <input type="text" name="lastname" placeholder="Your Last Name" class="form-control" required>
                <input type="text" name="email" placeholder="Your email" class="form-control" required>
                <input type="text" name="phone" placeholder="Your phone" class="form-control" required>
                <input type="password" name="password" placeholder="Your password" class="form-control" required>
                <input type="text" name="card" placeholder="Your Number Card" class="form-control" required>
                <span style="font-size: 12px; margin-top: 15px;">Profile photo (Not required)</span>
                <input type="file" name="photo" class="form-control w-7">
                <input type="submit" name="submit" value="Submit" class="form-btn btn btn-success w-3">
            </form>
        </div>
    </div>
</div>