function SelectAll() {
    let content = document.getElementById("contentLoaded");
    let box="";
    $.ajax({
        method: 'GET',
        url: 'SelectAll.php',
        data: {},
        success: function (results) {
            console.log(results);
            let resultsJson = JSON.parse(results);
            resultsJson.forEach(e => {
                let photo;
                if(e['product_photo'] == '') {
                    photo = `<a href='UpdateProductImage.php?product_id=${e['product_id']}'><img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /></a>`;
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
                                    ${e['product_price']}
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
    let num
}

$(document).ready(e => {
    SelectAll();
});