function loadContent() {
    const table = document.getElementById('tableProd');
    $.ajax({
        type: 'GET',
        url: 'ShowProducts.php',
        data: {},
        success: function (results) {
            let resultsJson = JSON.parse(results);
            let toShow='';
            console.log(resultsJson);
            resultsJson.forEach(element => {
                let photo;
                if(element['product_photo'] == '') {
                    photo = `<a href='UpdateProductImage.php?product_id=${element['product_id']}'><img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /></a>`;
                } else {
                    photo = `<img class="card-img-top" src="${element['product_photo']}" alt="..." />`;
                }

                toShow += `
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            ${photo}
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${element['product_name']}</h5>
                                    <!-- Product price-->
                                    $ ${element['product_price']}
                                </div>
                                <div class="text-justify text-dark small">
                                    <!-- Product name-->
                                    <p class="fw-bolder">${element['product_description']}</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                <div class="text-center"><button class="btn btn-danger mt-4" onclick="deleteProduct(${element['product_id']})">Delete</button></div>
                            </div>
                        </div>
                    </div>
                `;
            });
            table.innerHTML = toShow;
        }
    });
}


$(document).ready(e => {
    loadContent()
});

$('#formProd').submit(e => {
    e.preventDefault();

    const data = {
        'name': $('[name="productName"]').val(),
        'description': $('[name="productDescription"]').val(),
        'price': $('[name="productPrice"]').val(),
        'type': $('[name="type"]').val()
    }

    //console.log(data.photo);
    //const array = JSON.stringify(data);
    //alert(array);
    
    
    $.ajax({
        type: 'POST',
        url: 'Products.php',
        data: data,
        success: function (results) {
            
            if(results == "OK") {
                alert("PRODUCT SIGNED UP SUCCESSFULLY!");
                $('#formProd')[0].reset();
                loadContent();
            } else {
                alert("SOMETHING HAS GONE WRONG");
            }
        }
    });
});

function deleteProduct(id) {
    alert("OBJETC DELETED SUCCESSFULLY!");
    
    $.ajax({
        type: 'POST',
        url: 'deleteProduct.php',
        data: {'id': id},
        success: function(results) {
            loadContent();
        }
    });
}