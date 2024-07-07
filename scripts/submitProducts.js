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
                    photo = `<a href='UpdateProductImage.php?product_id=${element['product_id']}'>ash</a>`;
                } else {
                    photo = ``;
                }

                toShow += `
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="${photo}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${element['product_name']}</h5>
                                    <!-- Product price-->
                                    $ ${element['product_price']}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
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
    let poperBox = document.getElementById('poperBox');
    let poper = document.createElement('div');
    poper.id = 'poper';
    poper.style.zIndex = 100;
    poperBox.appendChild(poper);
    
    $.ajax({
        type: 'POST',
        url: 'deleteProduct.php',
        data: {'id': id},
        success: function(results) {
            poper.innerHTML = results;
            loadContent();
            setTimeout(function(e){
                poper.innerHTML = '';
                poperBox.removeChild(poper);
            }, 2000)
        }
    });
}