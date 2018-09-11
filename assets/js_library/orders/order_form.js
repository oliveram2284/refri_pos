$(function() {
    console.log("LOAD ORDERS/ORDER_FORM");
    var url = $("#url").val();
    var data_table_options = {
        'pageLength': 10,
        'responsive': true,
        'processing': true,
        'serverSide': true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "pagingType": "simple_numbers",
        "dom": '<"top float-left col col-md-8" Bf> <"top float-right col col-md-4"p>t<"bottom float-left col col-md-6"l><"bottom float-right col col-md-6"p>',
        "columnDefs": [{
                targets: 1,
                className: 'noVis'
            }
            /*{ "className": "text-left fcol", "targets": [1] },
            { "className": "text-right", "targets": [7] },
            { "targets": [8], "visible": false },
            { "className": "text-center", "targets": "_all" },*/
        ],
        buttons: [{
            extend: 'colvis',
            columns: ':not(.noVis)'
        }, ],
        'ajax': {
            'dataType': 'json',
            'method': 'POST',
            'url': url + 'main/find_customers',
            'dataSrc': function(response) {
                console.log(response);
                var output = [];
                $.each(response.data, function(index, item) {
                    console.log(index);
                    console.log(item);
                    var col0, col1, col2, col3, col4, col5, col6 = '';
                    col0 = '<button class="btn btn-success btn-sm" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" > SELECT </button>';
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
        /*
        createdRow: function(row, data, dataIndex) {
            console.debug("===> row: %o", row);
            console.debug("===> data: %o", data[8]);
            console.debug("===> dataIndex: %o", dataIndex);
            if (data[8] !== undefined && data[8] == 3) {
                $(row).addClass('table-danger');
            }
            // Set the data-status attribute, and add a class

        },*/
    };


    /*console.log(data_table_options.ajax.url);
    data_table_options.ajax.url = url + 'main/find_ships';
    data_table_options.ajax.dataSrc = function(response) {
        console.log(response);
        var output = [];
        $.each(response.data, function(index, item) {
            console.log(index);
            console.log(item);
            var col0, col1, col2, col3, col4, col5, col6 = '';
            col0 = '<button class="btn btn-success btn-sm" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" > SELECT </button>';
            col1 = item.id;
            col2 = item.name;
            col3 = item.city;
            col4 = item.state;
            col5 = item.zip_code;
            col6 = item.mainph;

            output.push([col0, col1, col2, col3, col4, col5, col6]);
        });
        return output;
    };
    console.log(data_table_options.ajax.url);
    console.log(data_table_options.ajax.dataSrc);


    //$('#find_ship_datatable').DataTable(data_table_options); */

    $("#bt_model_customer").click(function() {
        console.debug("===> bt_model_customer");
        data_table_options.ajax.url = url + 'main/find_customers';
        data_table_options.ajax.dataSrc = function(response) {

            console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                console.log(index);
                console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-sm" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" > SELECT </button>';
                col1 = item.id;
                col2 = item.name;
                col3 = item.city;
                col4 = item.state;
                col5 = item.zip_code;
                col6 = item.mainph;

                output.push([col0, col1, col2, col3, col4, col5, col6]);
            });
            return output;
        };
        $('#find_customer_datatable').DataTable(data_table_options);
        $("#modal_search_customer").modal("show");
        return false;
    });



    $(document).on('click', '#modal_search_customer #customer_id', function() {
        console.debug("#modal_search_customer #customer_id");
        var data = $(this).data();
        $("form").find("#customer_id").val(data.id);
        $("form").find("#customer_name").val(data.name);
        $("#modal_search_customer").find('#find_customer_datatable').DataTable().destroy();
        $("#modal_search_customer").modal("hide");
        return false;
    });



    $("#bt_model_detail").click(function() {
        console.debug("===> bt_model_detail");
        //$("#modal_search_de").modal("show");
    })

    $("#bt_model_ship").click(function() {
        console.debug("===> bt_model_ship");
        $("#modal_search_ship").modal("show");
    });




    $("#bt_model_sales").click(function() {
        console.debug("===> bt_model_sales");
        data_table_options.ajax.url = url + 'main/find_salesman';
        data_table_options.ajax.dataSrc = function(response) {
            console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                console.log(index);
                console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-sm" id="salesman_id"  data-id="' + item.id + '" data-name="' + item.first_name + " " + item.last_name + '" > SELECT </button>';
                col1 = item.id;
                col2 = item.first_name + " " + item.last_name;
                col3 = item.location_code;
                col4 = item.city;
                col5 = item.region_id;
                col6 = item.home_phone;
                col7 = item.cell_phone;

                output.push([col0, col1, col2, col3, col4, col5, col6, col7]);
            });
            return output;
        };
        $('#find_salesman_datatable').DataTable(data_table_options);
        $("#modal_search_salesman").modal("show");
    });

    $(document).on('click', '#modal_search_salesman #salesman_id', function() {
        console.debug("#modal_search_customer #salesman_id");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#salesman_id").val(data.id);
        $("form").find("#salesman_name").val(data.name);
        $("#modal_search_salesman").find('#find_salesman_datatable').DataTable().destroy();
        $("#modal_search_salesman").modal("hide");
        return false;
    });

    $("#bt_model_ship_via").click(function() {
        console.debug("===> bt_model_ship_via");
        data_table_options.ajax.url = url + 'main/find_ship_vias';
        data_table_options.ajax.dataSrc = function(response) {
            console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                console.log(index);
                console.log(item);
                var col0, col1, col2, col3 = '';
                col0 = '<button class="btn btn-success btn-sm" id="shipvia_id"  data-id="' + item.id + '" data-description="' + item.description + '" > SELECT </button>';
                col1 = item.id;
                col2 = item.description;
                col3 = item.notes;

                output.push([col0, col1, col2, col3]);
            });
            return output;
        };
        $('#find_ship_vias_datatable').DataTable(data_table_options);
        $("#modal_search_ship_vias").modal("show");
    });

    $(document).on('click', '#modal_search_ship_vias #shipvia_id', function() {
        console.debug("#modal_search_customer #shipvia_id");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#ship_via_id").val(data.id);
        $("form").find("#ship_via_description").val(data.description);
        $("#modal_search_ship_vias").find('#find_ship_vias_datatable').DataTable().destroy();
        $("#modal_search_ship_vias").modal("hide");
        return false;
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