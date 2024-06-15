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
                toShow += `
                    <tr>
                        <td>
                            <img href="${element['product_photo']}" alt="Non image">
                        </td>
                        <td>
                            ${element['product_name']}
                        </td>
                        <td>
                            ${element['product_description']}
                        </td>
                        <td>
                            ${element['product_price']}
                        </td>
                        <td>
                            ${element['product_type']}
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