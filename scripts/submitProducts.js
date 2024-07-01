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
                    photo = `<a href='UpdateProductImage.php?product_id=${element['product_id']}' class='btn-table'>Add Image</a>`;
                } else {
                    photo = `<img src="${element['product_photo']}" alt="Non image">`;
                }

                toShow += `
                    <tr>
                        <td>
                            ${photo}
                        </td>
                        <td>
                            ${element['product_name']}
                        </td>
                        <td>
                            <p class="text-table">${element['product_description']}</p>
                            <img src="static/img/periodsImg.svg" alt="" class="hiddenTextImg htimg-non">
                        </td>
                        <td class="colToHide">
                            ${element['product_price']}
                        </td>
                        <td class="colToHide">
                            ${element['product_type']}
                        </td>
                        <td>
                            <button onclick="deleteProduct(${element['product_id']})" class="btn btn-danger btn-option-table"><img src="static/img/deleteWhite.svg"></button>
                        </td>
                        <td>
                            <a href="editProduct.php?product_id=${element['product_id']}" class="btn btn-primary btn-option-table"><img src="static/img/editWhite.svg"></a>
                        </td>
                    </tr>
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