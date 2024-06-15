<style>
    #poper {
        position: fixed;
        top: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-table {
        width: 200px;
        height: 200px;
    }
</style>
<div id="poperBox"></div>

<div class="container" style="width: 70%;">
    <div class="row">
        <div class="col text-center j-center align-center">
            <img src="static/img/interior.jpeg" alt="" style="width: 90%;">
        </div>
        <div class="col text-center">
            <h3 style="margin: 10px 0;">Welcome to Seller's menu</h3>
            <p>Pendiente</p>
            <form class="form focus-orange" id="formProd" method="post" enctype="multipart/form-data">
                <input type="text" name="productName" class="form-control" placeholder="Name" required>
                <textarea name="productDescription" class="form-control" style="height: 100px;" placeholder="Description" required></textarea>
                <input type="number" name="productPrice" class="form-control" placeholder="Amount" required>
                <select name="type" class="form-control" required>
                    <option value="">SELECT AN OPTION</option>
                    <option value="household_appliance">Household Appliance</option>
                    <option value="furniture">Furniture</option>
                    <option value="tool">Tool</option>
                    <option value="decoration">Decoration</option>
                </select>
                <input type="submit" value="Submit" class="form-btn btn btn-success">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col text-center"><h2>Your Products</h2></div>
    </div>
</div>

<table class="text-center w-9" rules="rows">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Type</th>
            <th>Delete</th>
            <th>Modify</th>
        </tr>
    </thead>
    <tbody id="tableProd">
        
    </tbody>
</table>

<script src="scripts/JQuery.js"></script>
<script src="scripts/submitProducts.js"></script>