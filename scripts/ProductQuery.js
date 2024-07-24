function SelectAll() {
    let content = document.getElementById("contentLoaded");
    let box="";
    $.ajax({
        method: 'GET',
        url: 'RelatedProducts.php',
        data: {},
        success: function (results) {
            console.log(results);
            let resultsJson = JSON.parse(results);
            let counter = 0;
            resultsJson.forEach(e => {
                let photo;
                if(e['product_photo'] == '') {
                    photo = `<img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />`;
                } else {
                    photo = `<img class="card-img-top" src="${e['product_photo']}" alt="..." />`;
                }

                box += `
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            ${photo}
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">${e['product_name']}</h5>
                                    <!-- Product price-->
                                    $ ${e['product_price']}
                                </div>
                                <div class="text-justify text-dark small">
                                    <p class="fw-bolder">${e['product_description']}</p>
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
            content.innerHTML = box;
        }
    });
}

function SelectOne() {
    let name = document.getElementById('elementName');
    let price = document.getElementById('elementPrice');
    let description = document.getElementById('elementDescription');
    let photo = document.getElementById('elementPhoto');
    $.ajax({
        method: 'GET',
        url: 'SelectOne.php',
        data: {},
        success: function(results) {
            let resultsJson = JSON.parse(results);
            name.innerHTML = resultsJson['product_name'];
            price.innerHTML = '$' + resultsJson['product_price'];
            description.innerHTML = resultsJson['product_description'];
            if(resultsJson['product_photo'] == '') {
                photo.innerHTML = `<img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." />`
            } else {
                photo.innerHTML = `<img class="card-img-top mb-5 mb-md-0" src="${resultsJson['product_photo']}" alt="..." />`
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            // Acciones a realizar en caso de error
            alert(errorThrown);
        }
    });
}

$(document).ready(e => {
    SelectOne();
    SelectAll();
});