<form action="UpdateProductImage.php?product_id=<?= $_GET['product_id'] ?>" class="form" method="post" enctype="multipart/form-data">
    <div style="width: 100%; display:flex; justify-content: center;">
        <?php if($imgsrc['product_photo'] != null): ?>
            <img class="img-fluid" alt="" src="<?=$imgsrc['product_photo']?>" style="width: 200px; height: 200px; object-fit: contain;">
        <?php else: ?>
            <img class="img-fluid" src="static/img/shopingBag.svg" style="width: 200px; height: 200px; object-fit: contain;">
        <?php endif; ?>
    </div>
    <br>
    <span>PROFILE PHOTO:</span>
    <input type="file" name="photo" class="form-control">
    <input type="submit" value="submit" name="submit" class="btn form-btn btn-success">
</form>