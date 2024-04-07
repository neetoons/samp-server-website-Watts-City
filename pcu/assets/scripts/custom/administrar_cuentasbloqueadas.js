var AdministrarCuentasBloqueadas = function() {

    var TablaCuentas = function() {

        var oTable = $('#cuentas_bloqueadas').dataTable({
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

        jQuery('#cuentas_bloqueadas_wrapper .dataTables_filter input').addClass("form-control input-small input-inline");
        jQuery('#cuentas_bloqueadas_wrapper .dataTables_length select').addClass("form-control input-small");
        jQuery('#cuentas_bloqueadas_wrapper .dataTables_length select').select2();
    };

    return {
        init: function() {
            TablaCuentas();
        }
    };
}();