function purchase(product, seller) {
    $.ajax({
        method: 'POST',
        url: 'Purchase.php',
        data: {
            'product': product,
            'seller': seller
        },
        success: (e) => {
            alert(e);
        }
    });
}