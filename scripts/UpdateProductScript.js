function updateProduct() {
    let urlParams = new URLSearchParams(window.location.search);
    let param = urlParams.get('product_id');
    data = {
        'name': $('[name="name"]').val(),
        'description': $('[name="description"]').val(),
        'price': $('[name="price"]').val(),
        'type': $('[name="type"]').val(),
        'param': param
    }
    $.ajax({
        method: 'POST',
        url: 'UpdateProductFile.php',
        data: data,
        success: (results) => {
            alert("PRODUCT UPDATED SUCCESSFULLY");
            getOne();
        }
    })
}

function getOne() {
    let urlParams = new URLSearchParams(window.location.search);
    let param = urlParams.get('product_id');
    $.ajax({
        method: 'GET',
        url: 'getOneProductFile.php',
        data: {product_id : param},
        success: results => {
            let resultsData = JSON.parse(results);
            $('[name="name"]').val(resultsData['product_name']);
            $('[name="description"]').val(resultsData['product_description']);
            $('[name="price"]').val(resultsData['product_price']);
        }
    });
}

$(document).ready(e => {
    getOne()
})

$('#form').submit(e => {
    e.preventDefault();
    updateProduct()
});