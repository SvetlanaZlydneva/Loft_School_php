$('.order__form-tag').on('submit', function (event) {
    event.preventDefault();
    var form = $(this).serialize();
    $.ajax({
        url: 'http://' + window.location.host + '/core/ajax.php',
        type: 'POST',
        data: form,
        success: function (data) {
            echo_result(data);
        }
    });

});

function echo_result(data) {
    if (data == 1) {
        $('.box_for_result_order h2').html("Ваш Заказ принят");
        $('.echo_results').css({'background': "rgba(0, 128, 0, .7)"});
        $('.box_for_result_order').show();
        $('.close_box').on('click', function () {
            window.location.reload();
        });
    } else {
        $('.box_for_result_order h2').html("Ошибка ввода данных");
        $('.echo_results').css({'background': "rgba(255,0,0,.5)"});
        $('.box_for_result_order').show();
        $('.close_box').on('click', function () {
            $('.box_for_result_order').hide();
        });
    }
}
