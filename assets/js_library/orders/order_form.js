$(function() {
    console.log("LOAD ORDERS/ORDER_FORM");
    var url = $("#url").val();

    $("#cart_table").DataTable();
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
        "dom": '<"top float-left col col-md-8" f> <"top float-right col col-md-4"p>t<"bottom float-left col col-md-6"l><"bottom float-right col col-md-6"p>',
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
                //console.log(response);
                var output = [];
                $.each(response.data, function(index, item) {
                    //console.log(index);
                    //console.log(item);
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

        console.log(data_table_options.ajax.url);
        data_table_options.ajax.url = url + 'main/find_ship';
        data_table_options.ajax.dataSrc = function(response) {
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
                var col0, col1, col2, col3, col4, col5, col6 = '';
                col0 = '<button class="btn btn-success btn-sm" id="ship_to"  data-id="' + item.id + '" data-name="' + item.customer_name + '" > SELECT </button>';
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
            //console.log(response);
            var output = [];
            $.each(response.data, function(index, item) {
                //console.log(index);
                //console.log(item);
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
                col0 = '<button class="btn btn-success btn-sm" id="term_id"  data-id="' + item.id + '" data-description="' + item.description + '" > SELECT </button>';
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
                col0 = '<button class="btn btn-success btn-sm" id="item_id"  data-id="' + item.item_id + '" data-description="' + item.description1 + "\n" + item.description2 + "\n" + item.description3 + '" data-unit_price="' + item.price1 + '" data-disc1="' + item.disc1 + '" > SELECT </button>';
                col1 = item.item_id;
                col2 = item.description1 + "<br>" + item.description2 + "<br>" + item.description3;
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
        $("form").find("#item_number").val(data.id);
        $("form").find("#item_description").val(data.description);
        $("form").find("#unit_price").val(data.unit_price);
        $("form").find("#discuount").val(data.disc1);
        $("#modal_search_item").find('#find_item_datatable').DataTable().destroy();
        $("#modal_search_item").modal("hide");
        return false;
    });

    $("#bt_info_product_form").click(function() {
        return false;
        //alert("SOON");
    });


    $("#bt_clear_product_form").click(function() {
        console.debug("===> bt_clear_product_form");
        $("#item_section").find("input").val(null);
        // $("#bt_clear_product_form").modal("show");
    });

    $("#bt_add_product").click(function() {
        console.debug("===> bt_add_product");

        //var inputs = $("#item_section").find("input,textarea");
        output = '';
        output += '<tr>';
        output += '<td>' +
            '<button type="button" class="btn btn-xs btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>' +
            '<button type="button" class="btn btn-xs btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>' +
            '<button type="button" class="btn btn-xs btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>' +
            '<button type="button" class="btn btn-xs btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>' +
            '</td>';

        i = 0;
        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[item_number]" class="form-control form-control-sm" value="' + $("#item_number").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<textarea type="number" id="item' + i + '" name="items[item_description]" class="form-control form-control-sm" value="">' + $("#item_description").val() + '</textarea>';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[order_qty]" class="form-control form-control-sm" value="' + $("#order_qty").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[ship_qty]" class="form-control form-control-sm" value="' + $("#ship_qty").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[unit_price]" class="form-control form-control-sm" value="' + $("#unit_price").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[bko_qty]" class="form-control form-control-sm" value="' + $("#bko_qty").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[discuount]" class="form-control form-control-sm" value="' + $("#discuount").val() + '">';
        output += '</td>';

        output += '<td>';
        output += '<input type="number" id="item' + i + '" name="items[exit_price]" class="form-control form-control-sm" value="' + $("#exit_price").val() + '">';
        output += '</td>';

        /*$.each(inputs, function(i, item) {
            console.debug("===> INPUT[%o]: %o", i, $(item).val());
            output += '<td>';
            output += '<input type="number" id="items' + i + '" name="items[]" class="form-control form-control-sm" value="' + $(item).val() + '">';
            output += '</td>';
            //$output += '';
        });*/
        output += '</tr>';
        console.debug(output);
        $("#cart_table").find("tbody").append(output);
        //console.log($output);
        // $("#bt_clear_product_form").modal("show");
        $("#cart_table").DataTable.draw();
    });



    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });


    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });

});