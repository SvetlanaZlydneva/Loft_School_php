$('.registration form').on('submit', function (event) {
    event.preventDefault();
    var form = $(this).serialize();
    $.ajax({
        url: 'http://' + window.location.host + '/registration/getPostVar',
        type: 'POST',
        data: form,
        success: function (data) {
            if (data == 1) {
                $('.hidden_registration').show();
                $('.echo_results div').html('<a href="main">OK</a>');
            } else if (data == 2) {
                $('.hidden_registration h2').html("Пользователь с таким email уже зарегистрирован, выполните авторизацию");
                $('.echo_results div').html('<a href="main">OK</a>');
                $('.echo_results').css({'background': "rgba(255,0,0,.5)"});
                $('.echo_results a').css({'color': "rgba(255,0,0,.5)", 'border': "1px dotted rgba(255,0,0,.5)"});
                $('.hidden_registration').show();
            } else {
                $('.hidden_registration h2').html("Ошибка ввода данных");
                $('.echo_results div').html('<a href="registration">OK</a>');
                $('.echo_results').css({'background': "rgba(255,0,0,.5)"});
                $('.echo_results a').css({'color': "rgba(255,0,0,.5)", 'border': "1px dotted rgba(255,0,0,.5)"});
                $('.hidden_registration').show();
            }
        }
    });

});

$('.authorization form').on('submit', function (event) {
    event.preventDefault();
    var form = $(this).serialize();
    $.ajax({
        url: 'http://' + window.location.host + '/main/authorization',
        type: 'POST',
        data: form,
        success: function (autho) {
            if (autho == 1) {
                $('.hidden_authorization').show();
                $('.echo_results div').html('<a href="userImages">OK</a>');
            }
            else if (autho == 2) {
                $('.hidden_authorization h2').html("Панель Администратора");
                $('.echo_results div').html('<a href="listUsers">OK</a>');
                $('.hidden_authorization').show();
            }
            else {
                $('.hidden_authorization h2').html("Неверный логин и/или пароль");
                $('.echo_results div').html('<a href="main">OK</a>');
                $('.echo_results').css({'background': "rgba(255,0,0,.5)"});
                $('.hidden_authorization').show();
            }
        }
    });
});