var CertificarTest = function() {

    var TablaPreguntasTest = function() {

        function fnFormatDetailsTest(oTable, nTr) {
            var aData = oTable2.fnGetData(nTr);
            var texto = $('#textot' + aData[1]).val();
            var pa = $('#pa' + aData[1]).val();
            var pb = $('#pb' + aData[1]).val();
            var pc = $('#pc' + aData[1]).val();
            var pd = $('#pd' + aData[1]).val();
            var sOut = '<table>';
            sOut += '<tr><td>ID Pregunta:</td><td>' + aData[1] + '</td></tr>';
            sOut += '<tr><td>Pregunta:</td><td id="dwpreg">' + texto + '</td></tr>';
            if (aData[3] == 'A')
                sOut += '<tr><td><strong>A):</strong></td><td><strong>' + pa + '</strong></td></tr>';
            else
                sOut += '<tr><td>A):</td><td>' + pa + '</td></tr>';
            if (aData[3] == 'B')
                sOut += '<tr><td><strong>B):</strong></td><td><strong>' + pb + '</strong></td></tr>';
            else
                sOut += '<tr><td>B):</td><td>' + pb + '</td></tr>';
            if (aData[3] == 'C')
                sOut += '<tr><td><strong>C):</strong></td><td><strong>' + pc + '</strong></td></tr>';
            else
                sOut += '<tr><td>C):</td><td>' + pc + '</td></tr>';
            if (aData[3] == 'D')
                sOut += '<tr><td><strong>D):</strong></td><td><strong>' + pd + '</strong></td></tr>';
            else
                sOut += '<tr><td>D):</td><td>' + pd + '</td></tr>';
            sOut += '<tr><td>Autor:</td><td>' + aData[4] + '</td></tr>';
            sOut += '<tr><td>Estado:</td><td>' + aData[5] + '</td></tr>';
            sOut += '</table>';
            return sOut;
        }

        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        $('#tabla_preguntas_test thead tr').each(function() {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#tabla_preguntas_test tbody tr').each(function() {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        var oTable2 = $('#tabla_preguntas_test').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": [
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 10,
        });

        jQuery('#tabla_preguntas_test_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_preguntas_test_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_preguntas_test_wrapper .dataTables_length select').select2();

        $('#tabla_preguntas_test').on('click', ' tbody td .row-details', function() {
            var nTr = $(this).parents('tr')[0];
            if (oTable2.fnIsOpen(nTr)) {
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable2.fnClose(nTr);
            }
            else {
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable2.fnOpen(nTr, fnFormatDetailsTest(oTable2, nTr), 'details');
            }
        });
    }

    return {
        init: function() {
            TablaPreguntasTest();
        }
    };
}();

var CertificarDesarrollo = function() {

    var TablaPreguntas = function() {

        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var texto = $('#texto' + aData[1]).val();
            var sOut = '<table>';
            sOut += '<tr><td>ID Pregunta:</td><td>' + aData[1] + '</td></tr>';
            sOut += '<tr><td>Pregunta:</td><td id="dwpreg">' + texto + '</td></tr>';
            sOut += '<tr><td>Autor:</td><td>' + aData[3] + '</td></tr>';
            sOut += '<tr><td>Estado:</td><td id="dwestado">' + aData[4] + '</td></tr>';
            sOut += '</table>';
            return sOut;
        }

        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        $('#tabla_preguntas thead tr').each(function() {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#tabla_preguntas tbody tr').each(function() {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        var oTable = $('#tabla_preguntas').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": [
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 10,
        });

        jQuery('#tabla_preguntas_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_preguntas_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_preguntas_wrapper .dataTables_length select').select2();

        $('#tabla_preguntas').on('click', ' tbody td .row-details', function() {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose(nTr);
            }
            else {
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    }

    return {
        init: function() {
            TablaPreguntas();
        }
    };
}();

var CertificarUsuarioTest = function() {
    
    var ValidarTest = function() {

        var form3 = $('#form_certtest');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                pregunta_1: {
                    required: true
                },
                pregunta_2: {
                    required: true
                },
                pregunta_3: {
                    required: true
                },
                pregunta_4: {
                    required: true
                },
                pregunta_5: {
                    required: true
                },
                pregunta_6: {
                    required: true
                },
                pregunta_7: {
                    required: true
                },
                pregunta_8: {
                    required: true
                },
                pregunta_9: {
                    required: true
                },
                pregunta_10: {
                    required: true
                }
            },


            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_test').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    return {
        init: function() {
            ValidarTest();
        }
    };
}();

var CertificarUsuarioPersonaje = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-cuenta');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                edad: {
                    digits: true,
                    required: true,
                    range: [1, 99]
                },
                raza: {
                    required: true
                },
                sexo: {
                    required: true
                },
                altura: {
                    digits: true,
                    required: true,
                    range: [120, 200]
                },
                peso: {
                    digits: true,
                    required: true,
                    range: [40, 150]
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_test').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
                "html": false,
                "link": false,
                "image": false
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            ValidarConfiguracion();
        }
    };
}();

var CertificarUsuarioDesarrollo = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-certcuenta');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                respuesta_1: {
                    required: true
                },
                respuesta_2: {
                    required: true
                },
                respuesta_3: {
                    required: true
                },
                respuesta_4: {
                    required: true
                },
                respuesta_5: {
                    required: true
                },
                respuesta_6: {
                    required: true
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_test').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
                "html": false,
                "link": false,
                "image": false
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            ValidarConfiguracion();
        }
    };
}();

var CertificarUsuarioCambiarNombre = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-cnombre');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                nuevonombre: {
                    required: true
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_cnombre').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    return {
        init: function() {
            ValidarConfiguracion();
        }
    };
}();

var CertificarUsuarioResponder = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-respcert');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                eresp_1: {
                    required: true
                },
                eresp_2: {
                    required: true
                },
                eresp_3: {
                    required: true
                },
                eresp_4: {
                    required: true
                },
                eresp_5: {
                    required: true
                },
                eresp_6: {
                    required: true
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_respcert').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
                "html": false,
                "link": false,
                "image": false
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            ValidarConfiguracion();
        }
    };
}();

var CertificarEditarPersonaje = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-editpers');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                altura: {
                    digits: true,
                    required: true,
                    range: [120, 200]
                },
                peso: {
                    digits: true,
                    required: true,
                    range: [40, 150]
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_editpers').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    var handleWysihtml5 = function() {
        if (!jQuery().wysihtml5) {
            return;
        }

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"],
                "html": false,
                "link": false,
                "image": false
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            ValidarConfiguracion();
        }
    };
}();

var CertificarCuentasLista = function() {
    
    var TablaListaCuentas = function() {
        
        var ccTabla = $('#tabla_certcuentas').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[2, 'asc']],
             "aLengthMenu": [
                [10, 15, 20, 25, 50, 100, -1],
                [10, 15, 20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 10,
        });

        jQuery('#tabla_certcuentas_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_certcuentas_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_certcuentas_wrapper .dataTables_length select').select2();
    }
    
    var handleWysihtml5 = function() {

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            TablaListaCuentas();
        }
    };
}();

var CertificarCuentasVer = function() {
    
    var ValidarConfiguracion = function() {

        var form3 = $('#form-respcert');
        var error3 = $('.alert-danger', form3);
        var success3 = $('.alert-success', form3);

        form3.validate({
            errorElement: 'span',
            errorClass: 'help-block', 
            focusInvalid: false,
            ignore: "",
            rules: {
                opcion: {
                    required: true
                },
                respcert: {
                    required: true
                }
            },

            errorPlacement: function (error, element) {
                if (element.parents('.radio-list').size() > 0) { 
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

            invalidHandler: function (event, validator) { 
                success3.hide();
                error3.show();
                App.scrollTo(error3, -200);
            },

            highlight: function (element) {
               $(element)
                    .closest('.form-group').addClass('has-error');
            },

            unhighlight: function (element) { 
                $(element)
                    .closest('.form-group').removeClass('has-error');
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error');
            },

            submitHandler: function (form) {
                $('#validar_respcert').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    }
    
    var handleWysihtml5 = function() {

        if ($('.wysihtml5').size() > 0) {
            $('.wysihtml5').wysihtml5({
                "stylesheets": ["assets/plugins/bootstrap-wysihtml5/wysiwyg-color.css"]
            });
        }
    }
    
    return {
        init: function() {
            handleWysihtml5();
            ValidarConfiguracion();
        }
    };
}();
