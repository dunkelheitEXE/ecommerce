<form id="form" action="editProduct.php" method="post" class="special-object-5" enctype="multipart/form-data">
    <div class="input-group mb-3">
        <span class="input-group-text">Nombre</span>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <textarea name="description" class="form-control" style="height: 100px;" placeholder="Description"></textarea>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text">Price</span>
        <input type="number" name="price" class="form-control" value="">
    </div>
    <select name="type" class="form-select mb-3">
        <option value="household appliance">Household Appliance</option>
        <option value="furniture">Furniture</option>
        <option value="tool">Tool</option>
        <option value="decoration">Decoration</option>
    </select>
    <input type="submit" value="submit" name="submit" class="btn form-btn btn-success mb-3">
</form>

<script src="scripts/JQuery.js"></script>
<script src="scripts/UpdateProductScript.js"></script>