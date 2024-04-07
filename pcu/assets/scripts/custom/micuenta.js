var Micuenta = function() {

    var TablaAccesos = function() {

        var ccTabla = $('#tabla_accesos').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[2, 'desc']],
            "aLengthMenu": [
                [20, 25, 50, 100, -1],
                [20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 20
        });

        jQuery('#tabla_accesos_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_accesos_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_accesos_wrapper .dataTables_length select').select2();
    };

    var ValidarCambiarEmail = function() {

        var form2 = $('#form-cemail');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.parents('.radio-list').size() > 0) {
                    error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                } else if (element.parents('.radio-inline').size() > 0) {
                    error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                } else if (element.parents('.checkbox-list').size() > 0) {
                    error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                } else if (element.parents('.checkbox-inline').size() > 0) {
                    error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            },
            invalidHandler: function(event, validator) {
                success2.hide();
                error2.show();
                App.scrollTo(error2, -200);
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
                $('#validar_cemail').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    };

    var ValidarCambiarClave = function() {

        var form3 = $('#form-cclave');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                clave_actual: {
                    required: true
                },
                nueva_clave: {
                    required: true
                },
                renueva_clave: {
                    required: true,
                    equalToP: '#nueva_clave'
                }
            },
            errorPlacement: function(error, element) {
                if (element.parent('.input-group').size() > 0) {
                    error.insertAfter(element.parent(".input-group"));
                } else if (element.parents('.radio-list').size() > 0) {
                    error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                } else if (element.parents('.radio-inline').size() > 0) {
                    error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                } else if (element.parents('.checkbox-list').size() > 0) {
                    error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                } else if (element.parents('.checkbox-inline').size() > 0) {
                    error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            },
            invalidHandler: function(event, validator) {
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
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
                $('#validar_cclave').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    };

    return {
        init: function() {
            TablaAccesos();
            ValidarCambiarClave();
            ValidarCambiarEmail();
        }
    };
}();

var EditarPersonaje = function() {
    
    var ValidarConfiguracion = function() {
        
        $('#validar_editpers').click(function (e) {
            e.preventDefault();
            $(this).button('loading');
            new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
            document.forms['form-editpers'].submit();
        });
    };
    var handleWysihtml5 = function() {
        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
                "html": false,
                "link": false,
                "image": false
            });
        }
    };
    return {
        init: function() {
            ValidarConfiguracion();
            handleWysihtml5();
        }
    };
}();