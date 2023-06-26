var LIST_CRUD = (function () {

    var state = {};

    function load() {

        DASHBOARD.load();

        state.deleteForm = $('.delete-form');
        state.crudListBox = $('#crud-list');
        state.table = $('table', state.crudListBox);

        state.deleteForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                DASHBOARD.setTopMessage(data.response.message);

                if (!data.status) {
                    return;
                }

                state.table.find('tr[data-id="' + data.response.id + '"]').remove();

                var remaingRows = state.table.find('tbody > tr');
                if (remaingRows.length == 0) {
                    window.location.reload();
                }
            });
        });
    }

    function initTable(config) {

        if (typeof (config.table) == undefined) {
            config.table = state.table;
        }

        $.fn.dataTable.ext.errMode = 'none';

        state.datatable = state.table.DataTable({
            processing: true,
            paging: true,
            serverSide: true,
            searchDelay: 1500,
            ajax: state.table.data('route'),
            language: languagePT,
            columns: config.columns,
            drawCallback: function (settings) {
                APP.replaceIcons();
            }
        }).on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', {e, settings, techNote, message});

            message = APP.convertMessageToAlert(
                'Ocorreu um problema durante a renderização da tabela, tente recarregar a página.',
                'danger'
            );

            DASHBOARD.setTopMessage(message);
        });
    }

    return {load, initTable};
})();