var Skins = function() {

    var TablaSkins = function() {

        function fnFormatDetails(oTable, nTr) {
            var aData = oTable.fnGetData(nTr);
            var sOut = '<table>';
            sOut += '<tr><td>ID Skin:</td><td>' + aData[1] + '</td></tr>';
            sOut += '<tr><td><img src="http://vida-virtual.es/pcu/assets/img/skins/Skin_' + aData[1] + '.png" /></td></tr>';
            sOut += '<tr><td>Sexo:</td><td>' + aData[2] + '</td></tr>';
            sOut += '<tr><td>Estado:</td><td id="dwestado">' + aData[3] + '</td></tr>';
            sOut += '</table>';
            return sOut;
        }

        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';

        $('#tabla_skins thead tr').each(function() {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#tabla_skins tbody tr').each(function() {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });

        var oTable = $('#tabla_skins').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[1, 'asc']],
            "aLengthMenu": [
                [20, 25, 50, 100, -1],
                [20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 20
        });

        jQuery('#tabla_skins_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_skins_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_skins_wrapper .dataTables_length select').select2();

        $('#tabla_skins').on('click', ' tbody td .row-details', function() {
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
    };
    return {
        init: function() {
            TablaSkins();
        }
    };
}();

var AddSkins = function() {

    var AddSkin = function() {
        // Cambiamos la imagen del skin
        $("#id_skin").bind("change keyup", function() {
        	var id = $(this).val();
        	$('#img_skin').html('<img src="../../assets/img/skins/Skin_'+id+'.png" />');
        });
        
        var form2 = $('#form-addskin');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                id_skin: {
                    required: true
                },
                sexo: {
                    required: true
                },
                estado: {
                    required: true
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
                $('#validar_addskin').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    };
    return {
        init: function() {
            AddSkin();
        }
    };
}();

var EditarSkin = function() {

    var EditSkin = function() {
        
        var form2 = $('#form-editskin');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span',
            errorClass: 'help-block',
            focusInvalid: false,
            ignore: "",
            rules: {
                id_skin: {
                    required: true
                },
                sexo: {
                    required: true
                },
                estado: {
                    required: true
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
                $('#validar_editskin').button('loading');
                new ajaxLoader('#EfectoAjax', {classOveride: 'blue-loader', bgColor: '#000'});
                form.submit();
            }
        });
    };
    return {
        init: function() {
            EditSkin();
        }
    };
}();