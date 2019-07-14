$('document').ready(function(){  
    var table_book = $('#table_transaction').DataTable({  
        "searching": true,
        "order": [[0, 'asc']],
        "processing": true,
        "serverSide": true,
        "ajax" : {
            'url': app_config.api_uri + "/transaction"
        },
        "columns"     : [  
            { 
                "data": "creation_time",
                "render": function(data, type, row, meta) {
                    return moment(data).format('lll');
                }
            },
            { 
                "orderable": false,
                "data": "operator_name",
            },
            { 
                "orderable": false,
                "data": "phone_number",
            },
            { 
                "data": "nominal",
                "render": function(data, type, row, meta) {
                    return accounting.formatMoney(data);
                }
            },
            { 
                "data": "price",
                "render": function(data, type, row, meta) {
                    return accounting.formatMoney(data);
                }
            },
            { 
                "orderable": false,
                "data": "status",
            },
        ]
    }); 

});