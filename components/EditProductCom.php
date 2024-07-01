<form action="editProduct.php" method="post" class="form" enctype="multipart/form-data">
    <div style="width: 100%; display:flex; justify-content: center;">
        <?php if($productChar['product_photo'] != null): ?>
            <img class="img-fluid" alt="" src="<?=$productChar['product_photo']?>" style="width: 200px; height: 200px; object-fit: contain;">
        <?php else: ?>
            <img class="img-fluid" src="static/img/shopingBag.svg" style="width: 200px; height: 200px; object-fit: contain;">
        <?php endif; ?>
    </div>
    <br>
    <span>PROFILE PHOTO:</span>
    <input type="file" name="photo" class="form-control">
    <input type="text" name="name" class="form-control" value="<?=$productChar['product_name']?>">
    <textarea name="productDescription" class="form-control" style="height: 100px;" placeholder="Description"><?=$productChar['product_description']?></textarea>
    <input type="number" name="price" class="form-control" value="<?=$productChar['product_price']?>">
    <select name="type" class="form-control">
        <option value="<?=$productChar['product_type']?>"><?=$productChar['product_type']?></option>
        <option value="household appliance">Household Appliance</option>
        <option value="furniture">Furniture</option>
        <option value="tool">Tool</option>
        <option value="decoration">Decoration</option>
    </select>
    <input type="submit" value="submit" name="submit" class="btn form-btn btn-success">
</form>