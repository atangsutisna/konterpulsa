$('document').ready(function(){  
    var table_transaction = $('#table_transaction').DataTable({  
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
            if (val !== undefined && val !== '' && val.length >= 4 && val.length <= 12) {
                var prefix = val.substring(0,4);
                $.get(app_config.api_uri + "/operator_prefix?prefix="+ prefix, function(data){
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
                app.price = 0;
                app.nominals = [];
            }
        }
    },
    methods: {
        do_reset: function() {
            app = this;
            console.info('hello');
            if ($.isEmptyObject(app.phone_number) ) {
                app.operator_id = null;
                app.operator_name = null;
                app.price = 0;
                app.nominals = [];    
            }
        },
        process: function(){
            app = this;
            if (app.phone_number.length <= 10) {
                alert('Nomor telepon tidak lengkap');
                return false;
            }

            if (app.credit_nominal_id == null || app.credit_nominal_id == undefined) {
                alert('Silahkan pilih nominal');
                return false;
            }

            var data = {
                'operator_id': app.operator_id,
                'nominal_id': app.credit_nominal_id,
                'phone_number': app.phone_number
            }
            console.info(data);

            $.ajax({
                url: app_config.api_uri + "/transaction",
                type: "POST",
                dataType: "json", // expected format for response              
                jsonp: false,
                data: data,
                beforeSend: function() {
                    $('#btn-process').text('Tunggu..');
                    $('#btn-process').attr('disabled', 'disabled');
                },
                complete: function() {
                    $('#btn-process').text('Proses');
                    $('#btn-process').removeAttr('disabled', 'disabled');
                },
                success: function(data) {
                    alert('Data transaksi sudah disimpa');
                    table_transaction.draw();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#btn-process').removeAttr('disabled', 'disabled');

                    if (jqXHR.status == 400) {
                        var response = JSON.parse(jqXHR.responseText);
                        console.info(response);
                        alert(`Error: Transaki gagal. ${response.message}`);
                    } 

                    if (jqXHR.status == 500) {
                        alert('Internal server error');
                    }
                },
            });            

        }
    }
});

});