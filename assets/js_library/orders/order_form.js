$(function() {
    console.log("LOAD ORDERS/ORDER_FORM");
    var url = $("#url").val();

    $("#cart_table").DataTable({
        "searching": false,
        "lengthChange": false,
        "pageLength": 5,
        "lengthMenu": [
            [5, 10, 20, 50, 100, -1],
            [5, 10, 20, 50, 100, 'Todos']
        ],
        "info": false,
        //"autoWidth": true,
        "responsive": true,
        "pagingType": "simple_numbers",
        "columnDefs": [
            { "targets": [0, 1], "className": 'text-center', },

            // { "targets": [2, 3, 4, 5, 6, 7, 8, 9], "className": 'text-right', },
        ],
        "order": [
            [1, "desc"]
        ]


    });
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
        "responsive": true,
        "pagingType": "simple_numbers",
        "dom": '<"top float-left col col-md-6 text-left" f> <"top float-right col col-md-6"p>t<"bottom float-left col col-md-6"l><"bottom float-right col col-md-6"p>',
        "columnDefs": [{
            targets: 1,
            className: 'noVis',

        }, ],
        buttons: [{
            extend: 'colvis',
            columns: ':not(.noVis)'
        }, ],
        'ajax': {
            'dataType': 'json',
            'method': 'POST',
            'url': url + 'main/find_customers',
            'dataSrc': function(response) {
                //console.log(response);
                var output = [];
                $.each(response.data, function(index, item) {
                    //console.log(index);
                    //console.log(item);
                    var col0, col1, col2, col3, col4, col5, col6 = '';
                    col0 = '<button class="btn btn-success btn-xs btn-block" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" > SELECT </button>';
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
    };



    //$('#find_ship_datatable').DataTable(data_table_options); 

    $("#bt_model_customer").click(function() {
        console.debug("===> bt_model_customer");
        data_table_options.ajax.url = url + 'main/find_customers';
        data_table_options.ajax.dataSrc = function(response) {

            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" data-sales_id="' + item.salesman_id + '"  data-salsmen_name="' + item.salsmen_name + '"> SELECT </button>';
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
        $("form").find('#salesman_id').val(data.sales_id);
        $("form").find('#salesman_name').val(data.salsmen_name);
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

        console.log(data_table_options.ajax.url);
        data_table_options.ajax.url = url + 'main/find_ship';
        data_table_options.ajax.dataSrc = function(response) {
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="ship_to"  data-id="' + item.id + '" data-name="' + item.customer_name + '" > SELECT </button>';
                col1 = item.ship_loc;
                col2 = item.customer_name;
                col3 = item.city;
                col4 = item.state;
                col5 = item.zip_code;
                col6 = item.country;

                output.push([col0, col1, col2, col3, col4, col5, col6]);
            });
            return output;
        };
        console.log(data_table_options.ajax.url);
        console.log(data_table_options.ajax.dataSrc);
        $('#find_ship_datatable').DataTable(data_table_options);
        $("#modal_search_ship").modal("show");
    });

    $(document).on('click', '#modal_search_ship #ship_to', function() {
        console.debug("#modal_search_customer #ship_to");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#ship_id").val(data.id);
        $("form").find("#ship_customer_name").val(data.name);
        $("#modal_search_ship").find('#find_ship_datatable').DataTable().destroy();
        $("#modal_search_ship").modal("hide");
        return false;
    });


    $("#bt_model_sales").click(function() {
        console.debug("===> bt_model_sales");
        data_table_options.ajax.url = url + 'main/find_salesman';
        data_table_options.ajax.dataSrc = function(response) {
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="salesman_id"  data-id="' + item.id + '" data-name="' + item.first_name + " " + item.last_name + '" > SELECT </button>';
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
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="shipvia_id"  data-id="' + item.id + '" data-description="' + item.description + '" > SELECT </button>';
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
        console.debug("#modal_search_ship_vias #shipvia_id");
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
        data_table_options.ajax.url = url + 'main/find_terms';
        data_table_options.ajax.dataSrc = function(response) {
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="term_id"  data-id="' + item.id + '" data-description="' + item.description + '" > SELECT </button>';
                col1 = item.id;
                col2 = item.description;
                col3 = item.notes;

                output.push([col0, col1, col2, col3]);
            });
            return output;
        };
        $('#find_terms_datatable').DataTable(data_table_options);
        $("#modal_search_terms").modal("show");
    });

    $(document).on('click', '#modal_search_terms #term_id', function() {
        console.debug("#modal_search_terms #term_id");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#term_id").val(data.id);
        $("form").find("#term_description").val(data.description);
        $("#modal_search_terms").find('#find_terms_datatable').DataTable().destroy();
        $("#modal_search_terms").modal("hide");
        return false;
    });

    $("#bt_model_search_product").click(function() {
        console.debug("===> bt_model_search_product");

        data_table_options.ajax.url = url + 'main/find_items';
        data_table_options.ajax.dataSrc = function(response) {
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3 = '';
                col0 = '<button class="btn btn-success btn-xs btn-block" id="item_id"  data-id="' + item.item_id + '" data-description="' + item.description1 + "\n" + item.description2 + "\n" + item.description3 + '" data-unit_price="' + item.price1 + '" data-disc1="' + item.disc1 + '" > SELECT </button>';
                col1 = item.item_id;
                col2 = item.description1 + " " + item.description2 + " " + item.description3;
                col3 = item.vendor_id;
                col4 = item.vendor_part;
                col5 = item.department_id;
                col6 = item.category_id;
                col7 = item.group_id;
                col8 = item.family_id;

                output.push([col0, col1, col2, col3, col4, col5, col6, col7, col8]);
            });
            return output;
        };
        $('#find_item_datatable').DataTable(data_table_options);
        $("#modal_search_item").modal("show");
    });

    $(document).on('click', '#modal_search_item #item_id', function() {
        console.debug("#modal_search_item #item_id");

        var data = $(this).data();
        console.debug("data: %o", data);
        console.debug("data: %o", data.description);
        $("form").find("#item_number").val(data.id);
        $("form").find("#item_description").val(data.description);
        $("form").find("#unit_price").val(data.unit_price);
        $("form").find("#discuount").val(data.disc1);
        $("form").find("#order_qty").focus();
        $("#modal_search_item").find('#find_item_datatable').DataTable().destroy();
        $("#modal_search_item").modal("hide");
        return false;
    });

    $("#bt_info_product_form").click(function() {
        return false;
    });


    $("#bt_clear_product_form").click(function() {
        console.debug("===> bt_clear_product_form");
        $("#item_section").find("input").val(null);
    });

    //FORM INPUT SECTION
    //$("#item_number #order_qty").change

    function calc_or_total() {

    }

    $("#bt_add_product").click(function() {
        console.debug("===> bt_add_product");
        if ($("#item_number").val() == '') {
            return false;
        }
        var i = $("#cart_table").DataTable().rows().count() + 1;
        var col0, col1, col2, col3, col4, col5, col6, col7, col8 = '';

        col0 =
            '<button type="button" class="btn btn-xs btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>' +
            '<button type="button" class="btn btn-xs btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>' +
            '<button type="button" class="btn btn-xs btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>' +
            '<button type="button" class="btn btn-xs btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>';
        col1 = i;
        col2 = '<input type="text" id="item' + i + '" name="items[item_number]" class="form-control form-control-sm"  value="' + $("#item_number").val() + '" style="width:200px">';
        //col3 = '<input type="text" id="item' + i + '" name="items[item_number]" class="form-control form-control-sm" value="' + $("#item_description").val() + '">';
        col3 = '<textarea type="text" id="item' + i + '" name="items[item_number]" class="form-control form-control-sm" style="width: 350px;" >' + $("#item_description").val() + '</textarea>';
        col4 = '<input type="text" id="item' + i + '" name="items[order_qty]" class="form-control form-control-sm text-right" value="' + $("#order_qty").val() + '">';
        col5 = '<input type="text" id="item' + i + '" name="items[ship_qty]" class="form-control form-control-sm text-right" value="' + $("#ship_qty").val() + '">';
        col6 = '<input type="text" id="item' + i + '" name="items[bko_qty]" class="form-control form-control-sm text-right" value="' + $("#bko_qty").val() + '">';
        col7 = '<input type="text" id="item' + i + '" name="items[unit_price]" class="form-control form-control-sm text-right" value="' + $("#unit_price").val() + '">';
        col8 = '<input type="text" id="item' + i + '" name="items[exit_price]" class="form-control form-control-sm text-right" value="' + $("#exit_price").val() + '">';

        $("#item_section").find("input,textarea").val(null);

        $("#cart_table").DataTable().row.add([col0, col1, col2, col3, col4, col5, col6, col7, col8]).draw();
    });



    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });


    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });

});