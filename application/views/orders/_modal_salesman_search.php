

         <table id="find_salesman_datatable" class="table table-bordered table-striped table-sm" cellspacing="0" width="100%">
            <thead> 
              <tr class="table-info">
                <th>SELECT</th>
                <th>ID</th>
                <th>NAME</th>
                <th>LOC</th>
                <th>CITY</th>
                <th>REGION</th>
                <th>HOME PHONE</th>
                <th>CELL PHONE</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <thead> 
              <tr class="table-info">
                <th>SELECT</th>
                <th>ID</th>
                <th>NAME</th>
                <th>LOC</th>
                <th>CITY</th>
                <th>REGION</th>
                <th>HOME PHONE</th>
                <th>CELL PHONE</th>
              </tr>
            </thead>
         </table>


<script>
$(function() {
  console.log("LOAD ORDERS/modal_customer_search");
  var url = $("#url").val();
 
  $('#find_salesman_datatable').DataTable({
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
            'url': url + 'main/find_salesman',
            'dataSrc': function(response) {
              //console.log(response);
              var output = [];
              $.each(response.data, function(index, item) {
                  console.log(index);
                  console.log(item);
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