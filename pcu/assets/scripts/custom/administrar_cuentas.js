var AdministrarCuentas = function() {

    var TablaCuentas = function() {

        var oTable = $('#cuentas_registradas').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[0, 'desc']],
            "aLengthMenu": [
                [15, 20, 25, 50, 100, -1],
                [15, 20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 15,
        });

        jQuery('#cuentas_registradas_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#cuentas_registradas_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#cuentas_registradas_wrapper .dataTables_length select').select2();
    };

    return {
        init: function() {
            TablaCuentas();
        }
    };
}();

var AdministrarVerCuentas = function() {

    var TablaCuentas = function() {

        var oTable = $('#tabla_accesos').dataTable({
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [0]}
            ],
            "aaSorting": [[0, 'desc']],
            "aLengthMenu": [
                [15, 20, 25, 50, 100, -1],
                [15, 20, 25, 50, 100, "All"]
            ],
            "oLanguage": {
                "sLengthMenu": "_MENU_ registros"
            },
            "iDisplayLength": 15,
        });

        jQuery('#tabla_accesos_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#tabla_accesos_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#tabla_accesos_wrapper .dataTables_length select').select2();
    };

    return {
        init: function() {
            TablaCuentas();
        }
    };
}();