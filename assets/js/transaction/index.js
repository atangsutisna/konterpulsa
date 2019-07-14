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

var form_transaction = new Vue({
    el: '#form_transaction',
    data: {
        phone_number: null,
        operator_name: null
    },
    watch: {
        phone_number: function(val) {
            app = this;
            if (val !== undefined && val !== '' && val.length === 4) {
                $.get(app_config.api_uri + "/operator_prefix?prefix="+ val, function(data){
                    if (data.operator_prefix != null) {
                        app.operator_name = data.operator_prefix.operator_name;
                    } else {
                        console.info("unknown operator");
                        app.operator_name = null;
                    }
                });
            } else {
                app.operator_name = null;
            }
        }
    }
});

});