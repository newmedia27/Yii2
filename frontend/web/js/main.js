// $(document).ready(function () {

function showCart(cart) {
    $('#modal-cart .modal-body').html(cart);
    $('#modal-cart').modal();
}
function getCart() {

    $.ajax({
        url: '/cart/show-cart',
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('ERror');
            }
            showCart(res);
        },
        error: function () {
            alert('ERROR!');
        }
    });
    return false;
}

$('#modal-cart').on('click', '.item-delete', function () {

    var id = $(this).data('id');
    $.ajax({
        url: '/cart/del-item',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('Нечего удалять');
            }
            // console.log(res);
            showCart(res);
        },
        error: function () {
            alert('ERROR!');
        }
    });
});



function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            if (!res) {
                alert('ERror');
            }
            showCart(res);
        },
        error: function () {
            alert('ERROR!');
        }
    });
    return false;
}

$('.item_add').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var quantity = $('#quantity').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id,quantity: quantity},
        type: 'GET',

        success: function (res) {
            if (!res) {
                alert('Товара не существует');
            }
            // console.log(res);
            showCart(res);

        },
        error: function () {
            alert('ERROR!');
        }
    });


});


// });