$('.order__form-tag').on('submit', function (event) {
    event.preventDefault();
    var form = $(this).serialize();
    $.ajax({
        url: 'http://' + window.location.host + '/core/ajax.php',
        type: 'POST',
        data: form,
        success: function (data) {
            if (data == 1) {
                $('.box_for_result_order').show();
            } else {
                $('.box_for_result_order h2').html("Ошибка ввода данных");
                $('.echo_results').css({'background': "rgba(255,0,0,.5)"});
                $('.box_for_result_order').show();
            }
        }
    });
});
$('.box_for_result_order').on('submit', function () {
    window.location.reload();
});