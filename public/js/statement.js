$(document).ready(function () {
    var getTransactionData = $('#getTransactionData').val();
    var search_data_value;
    var h_1 = $(document).height();
    $(window).resize(function () {
        $('#statementTable_wrapper.dataTables_scrollBody').height($(window).height() - 310);
    });
    $(window).trigger('resize');
    $.fn.dataTable.ext.errMode = 'throw';
    var statementTable = $('#statementTable').DataTable({
        "dom": 'ftip',
        "processing": true,
        "serverSide": true,
        "searching": false,
        "pageLength": 10,
        order: [
            [1, 'asc']
        ],
        language: {
            emptyTable: "No transactions are available"
        },
        aoColumnDefs: [
            { bSortable: false, aTargets: [0] },
            { bSortable: false, aTargets: [5] }
            // { "targets": [5], "width": 1 },
        ],
        rowCallback: function (row, data, dataIndex) {
            $(row).attr('id', 'doc_type_details' + data[2]);
        },
        "drawCallback": function (settings) {
            $("[data-bs-toggle='tooltip']").tooltip();
            $('#document-table tbody td').on('keyup mouseup mousedown click', function (e) {
                if (e.target.type == 'checkbox') {
                    e.stopPropagation()
                }
            });
        },
        ajax: {
            url: getTransactionData,
            type: "POST",
            complete: function () {
                showLoader(0);
            },
            beforeSend: function (request) {
                showLoader(1);
            },
            fnDrawCallback: function (data, callback, settings) {
                setTimeout(function () {
                    callback({
                        draw: data.draw,
                        data: data,
                        recordsTotal: data.recordsTotal,
                        recordsFiltered: data.recordsFiltered
                    });
                }, 1000);
            },
        },
        fnInitComplete: function (data) { },
    });
});