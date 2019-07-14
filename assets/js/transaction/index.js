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

    $('#table_book tbody').on('click', '.btn-delete', function(){
        var conf = confirm('are you sure ?');
        if (conf !== false) {
            var val = $(this).data('id');
            $.ajax({
                url: app_config.api_uri + "/user",
                type: "DELETE",
                dataType: "json", // expected format for response              
                jsonp: false,
                data: {uid: val},
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function(data) {
                    table_book.draw();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 400) {
                        var response = JSON.parse(jqXHR.responseText);
                        alert('Error: '+ response.message);
                    } 

                    if (jqXHR.status == 500) {
                        alert('Internal server error');
                    }
                },
            });
        } 

    });

});