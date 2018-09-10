$(function() {
    console.log("LOAD ORDERS/ORDER_FORM");
    var url = $("#url").val();
    $("#bt_model_customer").click(function() {
        console.debug("===> bt_model_customer");
        $("#modal_search_customer").modal("show");

        $('#find_customer_datatable').DataTable({
            'pageLength': 5,
            'responsive': true,
            'processing': true,
            'serverSide': true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "pagingType": "full_numbers",
            /*"columnDefs": [

                { "className": "text-left fcol", "targets": [1] },
                { "className": "text-right", "targets": [7] },
                { "targets": [8], "visible": false },
                { "className": "text-center", "targets": "_all" },
            ],*/
            'ajax': {
                'dataType': 'json',
                'method': 'POST',
                'url': url + 'main/find_customers',
                'dataSrc': function(response) {
                    console.log(response);
                    var output = [];
                    var permission = $("#permission").val();
                    $.each(response.data, function(index, item) {
                        console.log(index);
                        console.log(item);
                        var col0, col1, col2, col3, col4, col5, col6 = '';
                        col0 = '<button class="btn btn-success btn-sm" data-id="' + item.id + '" > SELECT </button>';
                        col1 = item.id;
                        col2 = item.name;
                        col3 = item.city;
                        col4 = item.state;
                        col5 = item.zip_code;
                        col6 = item.mainph;

                        output.push([col0, col1, col2, col3, col4, col5, col6]);
                    });
                    return output;
                },
                error: function(error) {
                    console.debug(error);
                }
            },
        });
    });



    /*{
            pageLength: 50,
            responsive: true,
            'processing': true,
            'serverSide': true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "lengthMenu": "Ver _MENU_ filas por página",
                "zeroRecords": "No hay registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrando de un total de _MAX_ registros)",
                "sSearch": "Buscar:  ",
                "oPaginate": {
                    "sNext": "Sig.",
                    "sPrevious": "Ant."
                }
            },
            "pagingType": "full_numbers",
            "columnDefs": [

                { "className": "text-left fcol", "targets": [1] },
                { "className": "text-right", "targets": [7] },
                { "targets": [8], "visible": false },
                { "className": "text-center", "targets": "_all" },
            ],
            ajax: {
                'dataType': 'json',
                'method': 'POST',
                'url': 'main/find_customers',
                'dataSrc': function(response) {
                    //console.log(response);
                    //console.log(response.data);
                    var output = [];
                    var permission = $("#permission").val();
                    $.each(response.data, function(index, item) {
                        var col1, col2, col3, col4, col5, col6, col7, col8, col9 = '';
                        col1 = item.nro;
                        col2 = item.fullname;
                        col3 = item.legajo;
                        col4 = item.muni_code;
                        col5 = item.added;
                        col6 = item.actived;

                        if (item.status == 3) {
                            col7 = '<span class="p-1 bg-danger text-center">Baja</span>';
                            col8 = '';

                        } else {
                            col7 = (item.renew == '1') ? '<span class="p-1 bg-danger-light text-center">Vencido</span>' : '<span class="p-1 bg-primary-light text-center">Habilitado</span>';


                            col8 = '';
                            if (item.renew == '1' && item.status != 3) {
                                col8 += '<a href="#" data-id="' + item.id + '" class="bt-renew btn-icon-o btn-info radius100 btn-icon-sm mr-2 mb-2" title="Renovar"><i class="fa fa-retweet"></i></a>';
                            }
                            col8 += '<a href="#"  data-id="' + item.id + '" class="bt-edit btn-icon-o btn-success radius100 btn-icon-sm mr-2 mb-2" title="Editar"><i class="fa fa-edit"></i></a>';
                            col8 += '<a href="#" data-id="' + item.id + '" class="bt-delete btn-icon-o btn-danger radius100 btn-icon-sm mr-2 mb-2" title="Eliminar"><i class="fa fa-times"></i></a>';
                        }
                        col9 = item.status;
                        //col6 += '<a href="#" data-id="' + item.id + '" class="bt-reset btn-icon-o btn-info radius100 btn-icon-sm mr-2 mb-2" title="Restaurar Contraseña"><i class="fa fa-sync"></i></a>';
                        output.push([col1, col2, col3, col4, col5, col6, col7, col8, col9]);
                    });
                    return output;
                },

                error: function(error) {
                    console.debug(error);
                }
            },
            createdRow: function(row, data, dataIndex) {
                console.debug("===> row: %o", row);
                console.debug("===> data: %o", data[8]);
                console.debug("===> dataIndex: %o", dataIndex);
                if (data[8] !== undefined && data[8] == 3) {
                    $(row).addClass('table-danger');
                }
                // Set the data-status attribute, and add a class

            },
        });
        */






    $("#bt_model_detail").click(function() {
        console.debug("===> bt_model_detail");
        $("#modal_search_customer").modal("show");
    })

    $("#bt_model_ship").click(function() {
        console.debug("===> bt_model_ship");
        $("#modal_search_customer").modal("show");
    });


    $("#bt_model_sales").click(function() {
        console.debug("===> bt_model_sales");
        $("#modal_search_customer").modal("show");
    });

    $("#bt_model_ship_via").click(function() {
        console.debug("===> bt_model_ship_via");
        $("#modal_search_customer").modal("show");
    });

    $("#bt_model_terms").click(function() {
        console.debug("===> bt_model_terms");
        $("#modal_search_customer").modal("show");
    });

    $("#bt_model_search_product").click(function() {
        console.debug("===> bt_model_search_product");
        $("#modal_search_customer").modal("show");
    });

    $("#bt_clear_product_form").click(function() {
        console.debug("===> bt_clear_product_form");
        // $("#bt_clear_product_form").modal("show");
    });

    $("#bt_add_product").click(function() {
        console.debug("===> bt_add_product");
        $("#bt_clear_product_form").modal("show");
    });



    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });


    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });

});