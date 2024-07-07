<div class="container my-4" style="width: 70%;">
    <div class="row">
        <h1 class="text-center my-5">Sign up</h1>
    </div>
    <div class="row">
        <div class="col-md-6 text-center j-center align-center">
            <img src="static/img/interior.jpeg" alt="" class="image-fluid" style="width: 90%;">
        </div>
        <div class="col-md-6">
            <form action="signup.php" method="post" class="form" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Your Name" class="form-control my-2" required>
                <input type="text" name="lastname" placeholder="Your Last Name" class="form-control my-2" required>
                <input type="text" name="email" placeholder="Your email" class="form-control my-2" required>
                <input type="text" name="phone" placeholder="Your phone" class="form-control my-2" required>
                <input type="password" name="password" placeholder="Your password" class="form-control my-2" required>
                <input type="text" name="card" placeholder="Your Number Card" class="form-control my-2" required>
                <span style="font-size: 12px; margin-top: 15px;" class="mt-2">Profile photo (Not required)</span>
                <input type="file" name="photo" class="form-control mb-2">
                <input type="submit" name="submit" value="Submit" class="form-btn btn btn-success w-3">
            </form>
        </div>
    </div>
</div>