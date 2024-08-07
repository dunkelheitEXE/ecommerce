<form action="UpdateProductImage.php?product_id=<?= $_GET['product_id'] ?>" class="form" method="post" enctype="multipart/form-data">
    <div style="width: 100%; display:flex; justify-content: center;">
        <?php if($imgsrc['product_photo'] != null): ?>
            <img class="img-fluid" alt="" src="<?=$imgsrc['product_photo']?>" style="width: 200px; height: 200px; object-fit: contain;">
        <?php else: ?>
            <img class="img-fluid" src="static/img/shopingBag.svg" style="width: 200px; height: 200px; object-fit: contain;">
        <?php endif; ?>
    </div>
    <br>
    <div class="m-5 text-center">
        <span class=" mb-3">PROFILE PHOTO:</span>
        <input type="file" name="photo" class="form-control mb-3">
        <input type="submit" value="submit" name="submit" class="btn form-btn btn-success mb-3" style="width: 70%;">
    </div>
</form>