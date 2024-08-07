<div class="boxer">
    <div class="boxer-child bg-dark text-light" data-bs-theme="dark">
        <form action="signupSeller.php" method="post" class="form" enctype="multipart/form-data">
            <div class="text-center"><img src="static/img/userWhite.svg" alt=""></div>
            <h1 class="text-center mb-4">Signup</h1>
            <input type="text" name="name" placeholder="Your Name" class="form-control my-2" required>
            <input type="text" name="lastname" placeholder="Your Last Name" class="form-control my-2" required>
            <input type="text" name="email" placeholder="Your email" class="form-control my-2" required>
            <input type="text" name="phone" placeholder="Your phone" class="form-control my-2" required>
            <input type="password" name="password" placeholder="Your password" class="form-control my-2" required>
            <input type="text" name="card" placeholder="Your Number Card" class="form-control my-2" required>
            <select name="country">
                <option value=""></option>
            </select>
            <span style="font-size: 12px; margin-top: 15px;" class="mt-2">Profile photo (Not required)</span>
            <input type="file" name="photo" class="form-control mb-2">
            <input type="submit" name="submit" value="Submit" class="form-btn btn btn-success w-3">
        </form>
    </div>
</div>