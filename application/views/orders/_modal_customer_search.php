<table id="find_customer_datatable" class="table table-striped table-sm" cellspacing="0" width="100%">
  <thead> 
    <tr class="table-infos">
      <th>SELECT</th>
      <th>ID</th>
      <th>NAME</th>
      <th>CITY</th>
      <th>ST</th>
      <th>ZIP</th>
      <th>PHONE</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <tfoot> 
    <tr class="table-info">
      <th>SELECT</th>
      <th>ID</th>
      <th>NAME</th>
      <th>CITY</th>
      <th>ST</th>
      <th>ZIP</th>
      <th>PHONE</th>
    </tr>
  </tfoot>
</table>

<script>
$(function() {
  console.log("LOAD ORDERS/modal_customer_search");
  var url = $("#url").val();
 
  $('#find_customer_datatable').DataTable({
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
                var output = [];
                $.each(response.data, function(index, item) {                    
                    var col0=null;
                    col0 = '<button class="btn btn-success btn-xs btn-block" id="customer_id"  data-id="' + item.id + '" data-name="' + item.name + '" data-sales_id="' + item.salesman_id + '"  data-salsmen_name="' + item.salsmen_name + '"> SELECT </button>';
                    output.push([col0, item.id, item.name, item.city, item.state, item.zip_code, item.mainph]);
                });
                return output;
            },
            error: function(error) {
                console.debug("ERROR: %o",error);
            }
        }/*,
        initComplete: function() {
            var input = $('.dataTables_filter input').unbind(),
                self = this.api(),
                $searchButton = $('<button class="btn btn-success btn-sm" style="margin-left:5px">')
                .html(' <i class="fa fa-search "></i> Search')
                .click(function() {
                    self.search(input.val()).draw();
                })
            $('.dataTables_filter').append($searchButton); //, $clearButton);
        }*/
    });
});
</script>


