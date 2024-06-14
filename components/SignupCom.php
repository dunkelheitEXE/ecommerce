<div class="container" style="width: 70%;">
    <div class="row">
        <div class="col text-center j-center align-center"><img src="static/img/interior.jpeg" alt="" style="width: 90%; margin: 0 auto;"></div>
        <div class="col">
            <form action="signup.php" method="post" class="form focus-orange" enctype="multipart/form-data">
                <h2 class="form-title">Sign up</h2>
                <input type="text" name="email" class="form-control w-7" placeholder="email" required>
                <input type="text" name="name" class="form-control w-7" placeholder="name" required>
                <input type="text" name="address" class="form-control w-7" placeholder="address" required>
                <input type="text" name="number" class="form-control w-7" placeholder="Telephone number" required>
                <input type="text" name="card" class="form-control w-7" placeholder="card number" required>
                <input type="password" name="password" id="" class="form-control w-7" placeholder="password" required>
                <span style="font-size: 12px; margin-top: 15px;">Profile photo (Not required)</span>
                <input type="file" name="photo" class="form-control w-7">
                <input type="submit" name="submit" value="Submit" class="form-btn btn btn-success w-3">
            </form>
        </div>
    </div>
</div>