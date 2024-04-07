// Entrada, registro y reenvio de contraseña
var Login = function() {

    // Contenido del login
    var handleLogin = function() {
        $('#form-login').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                nombre_login: {
                    required: true
                },
                clave_login: {
                    required: true
                }
            },
            messages: {
                nombre_login: {
                    required: "Introduce un Nombre_Apellido."
                },
                clave_login: {
                    required: "Introduce una contraseña."
                }
            },
            invalidHandler: function(event, validator) {
                $('.alert-danger', $('#form-login')).show();
            },
            highlight: function(element) {
                $(element)
                        .closest('.form-group').addClass('has-error');
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
                $('.alert-danger', $('#form-login')).hide();
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function(form) {
                //Si no hay error de comprobación procedemos a comprar el login
                var efecto = new ajaxLoader2('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                $('#login').button('loading');
                form.submit();
            }
        });

        // Reenviar email de confirmación de cuenta
        $('#reemail-conf').click(function(e) {
            e.preventDefault();
            var nombre = $("#nombre").val();
            $.ajax({
                url: "http://vida-virtual.es/pcu/incs/comprobar.php?opc=5",
                type: 'POST',
                data: 'nombre=' + nombre,
                success: function(msg) {

                }
            });
        });
    }

    // Contenido de regisrar cuenta
    var handleRegistro = function() {

        $('#registrar-cuenta').click(function(e) {
            e.preventDefault();
            $('#form-login').toggle('blind');
            $('.register-form').show('blind');
            document.title = 'Registrar nueva cuenta | Watts City';
        });
        $('#registrar-atras').click(function(e) {
            e.preventDefault();
            $('#form-login').show('blind');
            $('.register-form').toggle('blind');
            document.title = 'Entrar | Watts City';
        });
        
        var form4 = $('#form-registrar');
        var error4 = $('.alert-danger', form4);
        var success4 = $('.alert-success', form4);
        form4.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                nombre_reg: {
                    required: true
                },
                correo_reg: {
                    required: true,
                    email: true
                },
                clave_reg: {
                    required: true
                },
                reclave_reg: {
                    required: true,
                    equalToP: '#clave_reg'
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            invalidHandler: function(event, validator) {
                success4.hide();
                error4.show();
            },
            highlight: function(element) {
                $(element)
                        .closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element)
                        .closest('.form-group').removeClass('has-error');
            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error');
            },
            submitHandler: function(form) {
                success4.show();
                error4.hide();
                new ajaxLoader2('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }

    // Contenido de recuperar contraseña
    var handleRecuperar = function() {

        $('#recuperar-pass').click(function(e) {
            e.preventDefault();
            $('#form-login').toggle('blind');
            $('.forget-form').show('blind');
            document.title = 'Recuperar contraseña | Watts City RP';
        });
        $('#recuperar-atras').click(function(e) {
            e.preventDefault();
            $('#form-login').show('blind');
            $('.forget-form').toggle('blind');
            document.title = 'Entrar | Watts City RP';
        });

        var form3 = $('#form-reclave');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);
        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            rules: {
                nombre_reclave: {
                    required: true
                },
                correo_reclave: {
                    required: true,
                    email: true
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },
            invalidHandler: function(event, validator) {
                success3.hide();
                error3.show();
            },
            highlight: function(element) {
                $(element)
                        .closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element)
                        .closest('.form-group').removeClass('has-error');
            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error');
            },
            submitHandler: function(form) {
                success3.show();
                error3.hide();
                new ajaxLoader2('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    return {
        init: function() {
            handleLogin();
            handleRegistro();
            handleRecuperar();
        }
    };

}();