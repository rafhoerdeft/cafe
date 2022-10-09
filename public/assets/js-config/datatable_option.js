function createDataTable(name_id, column_no_order = [], search = true) {
    $('#' + name_id).dataTable({
        "dom": '<"row"<"col-md-6"l><"col-md-6"f>><"table-responsive"t><"row"<"col-md-6"i><"col-md-6"p>>',
        "searching": search,
        "order": [],
        "columnDefs":[  
            {  
                "targets": column_no_order,  
                "orderable": false,  
                "class":"text-center" 
            }
        ],
        "language": {
            "emptyTable": "Tidak ada data yang tersedia",
            "lengthMenu": "Tampilkan _MENU_ entri",
            "zeroRecords": "Data yang dicari tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari:",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            // "paginate": {
            //     "first": "First",
            //     "last": "Last",
            //     "next": "Next",
            //     "previous": "Previous"
            // },
        }
    });
}

function createDataTableExport(name_id, info, msg, num_cols = 1, column_no_order = [0,1,2], remove_cols = 2, orientation = 'portrait') {
    var col_print = range(0, (num_cols-1));
    col_print.splice(1, remove_cols); //At position 1, remove 2 value

    $('#' + name_id).dataTable({
        "dom": '<"row"<"col-md-6"<"row"<"col-md-4 mb-2"l><"col-md-8 mb-2"B>>><"col-md-6"f>><"table-responsive"t><"row"<"col-md-6"i><"col-md-6"p>>',
        // "searching": true,
        "order": [],
        "columnDefs":[  
            {  
                "targets": column_no_order,  
                "orderable": false,  
                "class":"text-center" 
            }
        ],
        "buttons": [
            // 'copy', 
            // 'csv', 
            {
                "extend": 'excelHtml5',
                "title": info,
                "text": '<i class="fa-regular fa-file-excel" style="font-size: 11pt"></i> Excel',
                "messageTop": msg,
                "className": 'btn-outline-success',
                "exportOptions": {
                    "columns": col_print,
                    "format": {
                        body: function (data, row, column, node) {
                          return data.toString().replaceAll('.', '');
                        }
                    }
                }
                // "exportOptions": {
                //     format: {
                //         body: function(data, column, row) {
                //             if (typeof data === 'string' || data instanceof String) {
                //                 data = data.replace(/<br\s*\/?>/ig, "\r\n");
                //             }
                //             return data;
                //         }
                //     }
                // }
            },
            {
                "extend": 'pdf',
                "title": info,
                "text": '<i class="fa-regular fa-file-pdf" style="font-size: 11pt"></i> PDF',
                "messageTop": msg,
                "orientation": orientation,
                "pageSize": 'LEGAL',
                "className": 'btn-outline-info',
                "exportOptions": {
                    "columns": col_print
                }
            },
            // {
            //     "extend": 'print',
            //     "title": info,
            //      "text": '<i class="fa-solid fa-print" style="font-size: 11pt"></i> Print',
            //     "messageTop": msg,
            //     "customize": function(win) {
            //         var css = '@page { size: landscape; }',
            //             head = win.document.head || win.document.getElementsByTagName('head')[0],
            //             style = win.document.createElement('style');

            //         style.type = 'text/css';
            //         style.media = 'print';

            //         if (style.styleSheet) {
            //             style.styleSheet.cssText = css;
            //         } else {
            //             style.appendChild(win.document.createTextNode(css));
            //         }

            //         head.appendChild(style);
            //     }
            // }
        ],
        "language": {
            "emptyTable": "Tidak ada data yang tersedia",
            "lengthMenu": "Tampilkan _MENU_",
            "zeroRecords": "Data yang dicari tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari:",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            // "sLengthMenu": "_MENU_",
            // "paginate": {
            //     "first": "First",
            //     "last": "Last",
            //     "next": "Next",
            //     "previous": "Previous"
            // },
        }
    });
}

function createDataTableServerSide(name_id = '', url = '', columns = [], info = '', msg = '', btn_print = false, num_cols = 1, remove_cols = 2, orientation = 'portrait') {
    var col_print = range(0, (num_cols-1));
    col_print.splice(1, remove_cols); //At position 1, remove 2 value

    var buttons = [];
    if (btn_print) {
        buttons = [
            // 'copy', 
            // 'csv', 
            {
                "extend": 'excelHtml5',
                "title": info,
                "text": '<i class="fa-regular fa-file-excel" style="font-size: 11pt"></i> Excel',
                "messageTop": msg,
                "className": 'btn-outline-success',
                "exportOptions": {
                    "columns": col_print,
                    "format": {
                        body: function (data, row, column, node) {
                            //   return column === 8 ? data.toString().replaceAll('.', '') : data;
                            let dt = data.toString().replace(/<.*?>/ig, ""); // remove tag html
                            return dt.toString().replaceAll('.', ''); // remove '.' in nominal
                        }
                    }
                }
                // "exportOptions": {
                //     format: {
                //         body: function(data, column, row) {
                //             if (typeof data === 'string' || data instanceof String) {
                //                 data = data.replace(/<br\s*\/?>/ig, "\r\n");
                //             }
                //             return data;
                //         }
                //     }
                // }
            },
            {
                "extend": 'pdf',
                "title": info,
                "text": '<i class="fa-regular fa-file-pdf" style="font-size: 11pt"></i> PDF',
                "messageTop": msg,
                "orientation": orientation,
                "pageSize": 'LEGAL',
                "className": 'btn-outline-info',
                "exportOptions": {
                    "columns": col_print
                }
            },
            // {
            //     "extend": 'print',
            //     "title": info,
            //      "text": '<i class="fa-solid fa-print" style="font-size: 11pt"></i> Print',
            //     "messageTop": msg,
            //     "customize": function(win) {
            //         var css = '@page { size: landscape; }',
            //             head = win.document.head || win.document.getElementsByTagName('head')[0],
            //             style = win.document.createElement('style');

            //         style.type = 'text/css';
            //         style.media = 'print';

            //         if (style.styleSheet) {
            //             style.styleSheet.cssText = css;
            //         } else {
            //             style.appendChild(win.document.createTextNode(css));
            //         }

            //         head.appendChild(style);
            //     }
            // }
        ];
    }

    $('#' + name_id).DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        dom: '<"row"<"col-md-6"<"row"<"col-md-4 mb-2"l><"col-md-8 mb-2"B>>><"col-md-6"f>><"table-responsive"t><"row"<"col-md-6"i><"col-md-6"p>>Tr',
        // "searching": true,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
        order: [],
        columns: columns,
        buttons: buttons,
        language: {
            "emptyTable": "Tidak ada data yang tersedia",
            "lengthMenu": "Tampilkan _MENU_",
            "zeroRecords": "Data yang dicari tidak ditemukan",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
            "infoEmpty": "",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Cari:",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            // "sLengthMenu": "_MENU_",
            // "paginate": {
            //     "first": "First",
            //     "last": "Last",
            //     "next": "Next",
            //     "previous": "Previous"
            // },
        }
    }).on('draw.dt', function() {
        checkChangePage();
        // activeIcheck();
    });
}

function range(start, end) {
    return Array(end - start + 1).fill().map((_, idx) => start + idx)
}