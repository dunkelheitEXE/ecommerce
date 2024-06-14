<style>
    .form {
        width: 40%;
    }

    @media screen and (max-width: 800px) {
        .form {
            width: 90%;
        }
    }
</style>
<div class="poper" id="poper"></div>
<form action="login.php" method="post" class="form focus-orange">
    <h2 class="form-title">Log In</h2>
    <input type="text" class="form-control" name="email" placeholder="Email">
    <input type="text" class="form-control" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Log in" class="btn btn-success form-btn">
</form>