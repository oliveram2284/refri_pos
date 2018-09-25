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
        "responsive": true,
        "pagingType": "simple_numbers",
        "columnDefs": [
            { 'targets': 1, render: function(data, type, row, meta) { return meta.row + 1; } },
            { "targets": [0, 1], "className": 'text-center', },
            { "targets": [8], "visible": false },
            { "targets": 0, "orderable": false }
        ],
        "order": [
            [1, "DESC"]
        ],
    });

    // LOAD SEARCH CUSTOMER MODAL
    $("#bt_model_customer").click(function() {
        $("#modal_search_customer .modal-body").load(url + 'main/modal_customer');
        $("#modal_search_customer").modal("show");
        return false;
    });

    $("#bt_clean_customer").click(function() {
        console.debug("===> bt_clean_customer");
        $('#sold_section').find("input").val(null);
    });

    $(document).on('click', '#modal_search_customer #customer_id', function() {
        var data = $(this).data();
        $("form").find("#customer_id").val(data.id);
        $("form").find("#customer_name").val(data.name);
        $("form").find('#salesman_id').val(data.sales_id);
        $("form").find('#salesman_name').val(data.salsmen_name);
        $("#modal_search_customer .modal-body").empty();
        $("#modal_search_customer").modal("hide");
        return false;
    });
    // find CUSTOMER by code
    $("form").find("#customer_id").keyup(function(e) {
        if (e.keyCode == 13) {
            var data_ajax = {
                'dataType': 'json',
                'method': 'GET',
                'url': url + 'main/getCustomer/' + $(this).val(),
                success: function(response) {
                    console.log(response);
                    if (!response.status) {
                        alert("Item not found");
                        $(this).focus();
                    } else {
                        $("form").find("#customer_name").val(response.data.name);
                        $("form").find('#salesman_id').val(response.data.salesman_id);
                        $("form").find('#salesman_name').val(response.data.salsmen_name);
                    }
                    return false;
                    if (response.adherent !== undefined) {
                        $("#adherent_name").val(response.adherent.firstname + " " + response.adherent.lastname);
                    } else {
                        $("#adherent_name").val(null);
                    }
                },
                error: function(error) {
                    console.debug("===> ERROR: %o", error);
                }
            };
            console.debug("===> data_ajax: %o", data_ajax);
            $.ajax(data_ajax);
        } else {
            console.log("===>" + $(this).val());
        }
    });





    // LOAD SEARCH SHIP_TO MODAL
    $("#bt_model_ship").click(function() {
        console.debug("===> bt_model_ship");
        var customer_id = $(document).find("#customer_id").val();
        console.debug("===> customer_id: %o", customer_id);
        $("#modal_search_ship .modal-body").load(url + 'main/modal_ship_to/' + customer_id);
        $("#modal_search_ship").modal("show");
    });

    $(document).on('click', '#modal_search_ship #ship_to', function() {
        console.debug("#modal_search_customer #ship_to");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#ship_id").val(data.id);
        $("form").find("#ship_customer_name").val(data.name);
        $("#modal_search_ship .modal-body").empty();
        $("#modal_search_ship").modal("hide");
        return false;
    });


    // LOAD SEARCH SALESMAN MODAL
    $("#bt_model_sales").click(function() {
        console.debug("===> bt_model_sales");
        $("#modal_search_salesman .modal-body").load(url + 'main/modal_salesman/');
        $("#modal_search_salesman").modal("show");
        return false;
    });

    $(document).on('click', '#modal_search_salesman #salesman_id', function() {
        console.debug("#modal_search_customer #salesman_id");
        var data = $(this).data();
        console.debug("data: %o", data);
        $("form").find("#salesman_id").val(data.id);
        $("form").find("#salesman_name").val(data.name);
        $("#modal_search_salesman .modal-body").empty();
        $("#modal_search_salesman").modal("hide");
        return false;
    });

    $("#bt_model_ship_via").click(function() {
        console.debug("===> bt_model_ship_via");
        $("#modal_search_ship_vias .modal-body").load(url + 'main/modal_ship_via/');
        $("#modal_search_ship_vias").modal("show");
    });


    $(document).on('click', '#modal_search_ship_vias #shipvia_id', function() {
        console.debug("#modal_search_ship_vias #shipvia_id");
        var data = $(this).data();
        $("form").find("#ship_via_id").val(data.id);
        $("form").find("#ship_via_description").val(data.description);
        $("#modal_search_ship_vias .modal-body").empty();
        $("#modal_search_ship_vias").modal("hide");
        return false;
    });



    $("#bt_model_terms").click(function() {
        console.debug("===> bt_model_terms");
        $("#modal_search_terms .modal-body").load(url + 'main/modal_terms');
        $("#modal_search_terms").modal("show");
    });

    $(document).on('click', '#modal_search_terms #term_id', function() {
        console.debug("#modal_search_terms #term_id");
        var data = $(this).data();
        $("form").find("#term_id").val(data.id);
        $("form").find("#term_description").val(data.description);
        $("#modal_search_terms .modal-body").empty();
        $("#modal_search_terms").modal("hide");
        return false;
    });

    $("#bt_model_detail").click(function() {
        console.debug("===> bt_model_detail");
    })


    $("#bt_model_search_product").click(function() {
        console.debug("===> bt_model_search_product");
        if ($("#customer_name").val().length == 0) {
            alert("Please, complete Sold to Fields");
            return false;
        }
        $("#modal_search_item .modal-body").load(url + 'main/modal_products_items');
        $("#modal_search_item").modal("show");
        return false;
    });

    $("#item_number").click(function() {
        if ($("#customer_name").val().length == 0) {
            alert("Please, complete Sold to Fields");
            return false;
        }
    });


    $(document).on('click', '#modal_search_item #item_id', function() {
        console.debug("#modal_search_item #item_id");
        var data = $(this).data();
        $("form").find("#item_number").val(data.id);
        $("form").find("#item_description").val(data.description);
        $("form").find("#unit_price").val(data.unit_price);
        $("form").find("#discuount").val(data.disc1);
        $("form").find("#order_qty").focus();
        $("#modal_search_item .modal-body").empty();
        $("#modal_search_item").modal("hide");
        return false;
    });

    //find ITEM by Code
    $("form").find("#item_number").keyup(function(e) {
        if (e.keyCode == 13) {
            var data_ajax = {
                'dataType': 'json',
                'method': 'GET',
                'url': url + 'main/getItem/' + $(this).val(),
                success: function(response) {
                    console.log(response);
                    if (!response.status) {

                        alert("Item not found");
                        $(this).focus();

                    } else {

                        $("form").find("#customer_name").val(response.data.name);
                        $("form").find('#item_description').val(response.data.description1 + '\n' + response.data.description2 + '\n' + response.data.description3);
                        $("form").find('#unit_price').val(response.data.price1);
                        $("form").find('#discuount').val(response.data.discuount);
                    }
                    return false;
                    if (response.adherent !== undefined) {
                        $("#adherent_name").val(response.adherent.firstname + " " + response.adherent.lastname);
                    } else {
                        $("#adherent_name").val(null);
                    }
                },
                error: function(error) {
                    console.debug("===> ERROR: %o", error);
                }
            };
            console.debug("===> data_ajax: %o", data_ajax);
            $.ajax(data_ajax);
        } else {
            console.log("===>" + $(this).val());
        }
    });


    $("#bt_info_product_form").click(function() {
        return false;
    });



    // Item Calc Section

    $("#bt_clear_product_form1,#bt_clear_product_form2").click(function() {
        console.debug("===> bt_clear_product_form");
        $("#item_section").find("input,textarea").val(null);
    });

    $(document).on('change', '#item_section #order_qty', function() {
        $('#item_section #ship_qty').val($(this).val()).trigger('change');
    });
    //clean item_section inputs
    $(document).on('click', '#item_section #order_qty', function() {
        $(this).val(null);
        $("#item_section #ship_qty").val(null);
        $("#item_section #bko_qty").val(null);
        $("#item_section #exit_price").val(null);
    });

    $(document).on('click', '#item_section #ship_qty', function() {
        $(this).val(null);
    });

    $(document).on('change', '#item_section #ship_qty', function() {
        $('#item_section #ship_qty').val($(this).val());
        var ship_qty = $(this).val();
        var unit_price = ($("#item_section #unit_price").val() != '' && $("#item_section #unit_price").val() != 0) ? $("#item_section #unit_price").val() : 0;
        var ext_price = 0;
        if (ship_qty != '') {
            ext_price = ship_qty * parseFloat(unit_price);
        }
        $('#item_section #exit_price').val(ext_price.toFixed(2));
        calc_or_totals();
    })

    $(document).on('click', '#item_section #bko_qty', function() {
        $(this).val(null);
    });
    $(document).on('change', '#item_section #bko_qty', function() {
        var bko_qty = ($(this).val() != '' || $(this).val() != 0) ? $(this).val() : 0;

        if (bko_qty == 0) {
            $('#item_section #ship_qty').val($('#item_section #order_qty').val());
        } else {
            var new_ship_qty = ($(this).val() == 0) ? 0 : $('#item_section #order_qty').val() - $(this).val();
            console.log(new_ship_qty);
            $('#item_section #ship_qty').val(new_ship_qty).trigger('change');
        }
        calc_or_totals();
    });


    $(document).on('click', '#item_section #unit_price', function() {
        $(this).val(null);
    });
    $(document).on('change', '#item_section #unit_price', function() {

        if ($(this).val() == '' && parseFloat($(this).val()) == 0) {
            return false;
        } else {
            $('#item_section #ship_qty').trigger('change');
        }
    });


    $(document).on('click', '#item_section #discuount', function() {
        $(this).val(null);
    });
    $(document).on('change', '#item_section #discuount', function() {
        var percent = ($(this).val() != '') ? (100 - $(this).val()) : 100;
        var ship_qty = $("#item_section #ship_qty").val();
        var unit_price = ($("#item_section #unit_price").val() != '' && $("#item_section #unit_price").val() != 0) ? $("#item_section #unit_price").val() : 0;
        var ext_price = 0;
        if (ship_qty != '') {
            ext_price = ship_qty * parseFloat(unit_price) * (percent / 100);
        }
        $('#item_section #exit_price').val(ext_price.toFixed(2));
    });


    $(document).on('change', '#item_section input:radio[name="tax"]', function() {

        var percent = ($('#item_section #discuount').val() != '') ? (100 - parseFloat($('#item_section #discuount').val())) : 100;
        var ship_qty = $("#item_section #ship_qty").val();
        var unit_price = ($("#item_section #unit_price").val() != '' && $("#item_section #unit_price").val() != 0) ? $("#item_section #unit_price").val() : 0;
        var ext_price = 0;

        if ($(this).is(':checked') && $(this).val() == 'Y') {

            if (ship_qty != '') {
                ext_price = ship_qty * parseFloat(unit_price) * (percent / 100) * 1.07;
            }
            console.log
        } else {
            ext_price = ship_qty * parseFloat(unit_price) * (percent / 100);
        }
        $('#item_section #exit_price').val(ext_price.toFixed(2));
    });

    function calc_or_totals() {

        var or_total = ($("#order_total").val().length > 0) ? parseFloat($("#order_total").val()) : 0;
        var bko_total = ($("#order_total").val().length > 0) ? parseFloat($("#order_total").val()) : 0;
        var ship_qty = $("#item_section #ship_qty").val();
        var bko_qty = $("#item_section #bko_qty").val();
        var unit_price = ($("#item_section #unit_price").val() != '' && $("#item_section #unit_price").val() != 0) ? $("#item_section #unit_price").val() : 0;

        or_total = parseFloat(ship_qty * unit_price);
        bko_total = parseFloat(bko_qty * unit_price);
        $("#order_total").val("$ " + or_total.toFixed(2));
        $("#bko_total").val("$ " + bko_total.toFixed(2));

    }

    $("#bt_add_product").click(function() {
        console.debug("===> bt_add_product");
        console.debug('===> item_number: %o', $("#item_number").val());
        console.debug('===> order_qty: %o', $("#order_qty").val());

        if ($("#item_number").val() == '' || $("#order_qty").val() == '') {
            alert("You must to complete ITEM NUMBER field and ORDER QTY");
            return false;
        }
        var i = $("#cart_table").DataTable().rows().count() + 1;
        var col0, col1, col2, col3, col4, col5, col6, col7, col8 = '';

        col0 =
            '<button type="button" class=" bt_item_view btn btn-xs btn-warning mr-1" disabled><i class="fas fa-eye fa-sm"></i></button>' +
            '<button type="button" class="bt_item_edit btn btn-xs btn-success mr-1 " ><i class="fas fa-edit fa-sm"></i></button>' +
            '<button type="button" class="bt_item_delete btn btn-xs btn-danger mr-1 " ><i class="far fa-trash-alt fa-sm "></i></button>' +
            '<button type="button" class="bt_item_external btn btn-xs btn-info mr-1 " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>';
        col1 = " -  " + i;
        col2 = '<input type="text" id="item_item_number_' + i + '" name="items[' + i + '][item_number]" class="intput_item form-control form-control-sm"  value="' + $("#item_number").val() + '" style="width:180px" disabled>';
        //col3 = '<input type="text" id="item' + i + '" name="items[item_number]" class="form-control form-control-sm" value="' + $("#item_description").val() + '">';
        col3 = '<textarea type="text" id="item_item_description_' + i + '"name="items[' + i + '][item_description]" class="item_description form-control form-control-sm" style="width: 500px; height: 30px;" data-description="' + $("#item_description").val() + '" disabled  >' + $("#item_description").val().replace('\n', ' ').replace('\n', ' ') + '</textarea>';
        col4 = '<input type="text" id="item_order_qty_' + i + '" name="items[' + i + '][order_qty]" class=" order_qty form-control form-control-sm text-right" value="' + $("#order_qty").val() + '" disabled>';
        col5 = '<input type="text" id="item_ship_qty_' + i + '" name="items[' + i + '][ship_qty]" class="ship_qty form-control form-control-sm text-right" value="' + $("#ship_qty").val() + '" disabled >';
        col6 = '<input type="text" id="item_bko_qty_' + i + '" name="items[' + i + '][bko_qty]" class=" bko_qty form-control form-control-sm text-right" value="' + $("#bko_qty").val() + '" disabled>';
        col7 = '<input type="text" id="item_unit_price_' + i + '" name="items[' + i + '][unit_price]" class=" unit_price form-control form-control-sm text-right" value="' + $("#unit_price").val() + '" disabled>';
        col8 = '<input type="text" id="item_discuount_' + i + '" name="items[' + i + '][discuount]" class=" discuount form-control form-control-sm text-right" value="' + $("#discuount").val() + '" disabled>';
        col9 = '<input type="text" id="item_exit_price_' + i + '" name="items[' + i + '][exit_price]" class=" exit_price form-control form-control-sm text-right" value="' + $("#exit_price").val() + '" disabled>';

        $("#item_section").find("input,textarea").val(null);

        $("#cart_table").DataTable().row.add([col0, col1, col2, col3, col4, col5, col6, col7, col8, col9]).draw();

        calc_or_totals();
        $("#order_total").val(null);
        $("#bko_total").val(null);

    });

    $(document).on('click', "#cart_table .bt_item_view", function() {
        alert("SOON ")
    });

    function load_item_to_edit(item) {

    }

    $(document).on('click', "#cart_table .bt_item_edit", function() {
        //alert("Edit Item");
        var _tr_input = $(this).parents("tr");
        // bootbox.alert("Hello world!");

        if ($("#item_number").val().length != 0) {
            bootbox.confirm({
                message: "<h4> Item in Process - Erase ?</h4>",
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if (result) {
                        $("#item_section").find("input,textarea").val(null);

                        $("#item_number").val($(_tr_input).find("input.intput_item").val());
                        $("#item_description").val($(_tr_input).find("textarea.item_description").data('description'));
                        $("#unit_price").val($(_tr_input).find("input.unit_price").val());
                        $("#order_qty").val(0);
                        /* $("#order_qty").val($(_tr_input).find("input.order_qty").val());
                         $("#ship_qty").val($(_tr_input).find("input.ship_qty").val());
                         $("#bko_qty").val($(_tr_input).find("input.bko_qty").val());
                         $("#unit_price").val($(_tr_input).find("input.unit_price").val());
                         $("#discuount").val($(_tr_input).find("input.discuount").val());
                         $("#exit_price").val($(_tr_input).find("input.exit_price").val());*/

                        $(this).parents("tr").find('.bt_item_delete').trigger('click');
                    }
                    //console.log('This was logged in the callback: ' + result);
                }
            });
        } else {

            $("#item_section").find("input,textarea").val(null);

            $("#item_number").val($(_tr_input).find("input.intput_item").val());
            $("#item_description").val($(_tr_input).find("textarea.item_description").val());
            $("#unit_price").val($(_tr_input).find("input.unit_price").val());
            $("#order_qty").val(0);
            /* $("#order_qty").val($(_tr_input).find("input.order_qty").val());
            $("#ship_qty").val($(_tr_input).find("input.ship_qty").val());
            $("#bko_qty").val($(_tr_input).find("input.bko_qty").val());
            $("#unit_price").val($(_tr_input).find("input.unit_price").val());
            $("#discuount").val($(_tr_input).find("input.discuount").val());
            $("#exit_price").val($(_tr_input).find("input.exit_price").val());*/
            $(this).parents("tr").find('.bt_item_delete').trigger('click');
        }


    });


    $(document).on('click', "#cart_table .bt_item_delete", function() {
        var item_deleted = $(this).parents('tr').find('td:nth-child(2)').html();
        $("#cart_table").DataTable().row($(this).parents('tr')).remove().draw();
        var n = 1;
        $.each($('#cart_table tr td:nth-child(2)'), function(index, val) {
            if (parseInt($(this).html()) > parseInt(item_deleted)) {
                temp = parseInt($(this).html()) - parseInt(item_deleted);
                if (temp <= 1) {
                    $(this).html(item_deleted);
                } else {
                    $(this).html(parseInt(item_deleted) + n);
                }
                n++;
            }
        });
    });

    $(document).on('click', "#cart_table_wrapper #previus_bt", function() {
        console.log("===> #cart_table #previus_bt");
        console.log($('#cart_table_wrapper').find('#cart_table_previous a').html());
        $('#cart_table_wrapper').find('#cart_table_previous a').trigger('click');
    })
    $(document).on('click', "#cart_table_wrapper #next_bt", function() {
        console.log("===> #cart_table #next");
        $('#cart_table_wrapper').find('#cart_table_next a').trigger('click');
    })

    //$(document).on('click', "#cart_table .bt_item_external", function() {});
    /*
    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });
    $("#bt_cart").click(function() {
        alert("SOON ACTION");
    });*/

});