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
        ]
    }); 

var form_transaction = new Vue({
    el: '#form_transaction',
    data: {
        operator_id: null,
        operator_name: null,
        phone_number: null,
        credit_nominal_id: null,
        credit_nominal: null,
        price: 0,
        nominals: []
    },
    watch: {
        credit_nominal: function(val) {
            app = this;
            app.credit_nominal_id = val.id;
            app.price = val.price;
            console.info('credit nominal id: '+ app.credit_nominal_id);
        },
        phone_number: function(val) {
            app = this;
            if (val !== undefined && val !== '' && val.length == 4) {
                $.get(app_config.api_uri + "/operator_prefix?prefix="+ val, function(data){
                    if (data.operator != null) {
                        app.operator_id = data.operator.id;
                        app.operator_name = data.operator.name;
                        app.nominals = [];
                        $.each(data.operator.nominals, function(index, value){
                            app.nominals.push({
                                'id': value.id,
                                'nominal': value.nominal,
                                'price': accounting.formatMoney(value.original_price),
                            });
                        });
                    } else {
                        console.info("unknown operator");
                        app.operator_id = null;
                        app.operator_name = null;
                        app.nominals = [];
                    }
                });
            } else if (val !== undefined && val !== '' && val.length < 4) {
                app.operator_id = null;
                app.operator_name = null;
                app.nominals = [];
            }
        }
    }
});

});