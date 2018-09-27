

         <table id="find_ship_datatable" class="table table-striped table-sm" cellspacing="0" width="100%">
            <thead> 
              <tr class="table-info">
                <th>SELECT</th>
                <th>SHIP LOC</th>
                <th>ADDRESS1</th>
                <th>STATE</th>
                <th>ZIP</th>
                <th>COUNTRY</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <thead> 
              <tr class="table-info">
                <th>SELECT</th>
                <th>SHIP LOC</th>
                <th>ADDRESS1</th>
                <th>STATE</th>
                <th>ZIP</th>
                <th>COUNTRY</th>
              </tr>
            </thead>
         </table>
         <script>
$(function() {
  console.log("LOAD ORDERS/modal_SHIT_search");
  var url = $("#url").val();
  var customer_id = ($(document).find("#customer_id").val()!='')?$(document).find("#customer_id").val():null;
  
  $('#find_ship_datatable').DataTable({
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
          'url': url + 'orders/find_ship/' + customer_id,
          'dataSrc': function(response) {
          //console.log(response);
          var output = [];
              $.each(response.data, function(index, item) {
                  console.log(index);
                  console.log(item);
                  var col0, col1, col2, col3, col4, col5, col6 = '';
                  col0 = '<button class="btn btn-success btn-xs btn-block" id="ship_to"  data-id="' + item.ship_loc + '" data-name="' + item.address1 + '" > SELECT </button>';
                  col1 = item.ship_loc;
                  col2 = item.address1;
                  col3 = item.city;
                  col4 = item.state;
                  col5 = item.zip_code;
                  col6 = item.country;

                  output.push([col0, col1, col2, col3, col4, col5, col6]);
              });
              return output;
          }
        }
    });
});
</script>


