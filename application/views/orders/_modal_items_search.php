
<table id="find_item_datatable" class="table table-striped table-sm" cellspacing="0" width="100%">
  <thead> 
    <tr class="table-info">
      <th>SELECT</th>
      <th>ITEM NUMBER</th>
      <th>DESCRIPTION</th>
      <th>VNDR ID</th>
      <th>VENDOR PART #</th>
      <th>DEPT</th>
      <th>CAT</th>
      <th>GROUP</th>
      <th>FAMILY</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <thead> 
    <tr class="table-info">
    <th>SELECT</th>
      <th>ITEM NUMBER</th>
      <th>DESCRIPTION</th>
      <th>VNDR ID</th>
      <th>VENDOR PART #</th>
      <th>DEPT</th>
      <th>CAT</th>
      <th>GROUP</th>
      <th>FAMILY</th>
    </tr>
  </thead>
</table> 
<script>
$(function() {
  console.log("LOAD ORDERS/modal_Item_search");
  var url = $("#url").val();
 
  $('#find_item_datatable').DataTable({
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
            'url': url + 'main/find_items',
            'dataSrc':function(response) {
            var output = [];
            $.each(response.data, function(index, item) {
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
        }
        },
        initComplete: function() {
            var input = $('.dataTables_filter input').unbind(),
                self = this.api(),
                $searchButton = $('<button class="btn btn-success btn-sm" style="margin-left:5px">')
                .html(' <i class="fa fa-search "></i> Search')
                .click(function() {
                    self.search(input.val()).draw();
                })
            $('.dataTables_filter').append($searchButton); //, $clearButton);
        }
    });
});
</script>

