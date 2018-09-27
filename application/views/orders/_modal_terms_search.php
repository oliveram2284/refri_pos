
<table id="find_terms_datatable" class="table table-bordered table-striped table-sm " cellspacing="0" width="100%">
  <thead> 
    <tr class="table-info">
      <th>SELECT</th>
      <th>ID</th>
      <th>DESCRIPTION</th>
      <th>NOTES</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <thead> 
    <tr class="table-info">
      <th>SELECT</th>
      <th>ID</th>
      <th>DESCRIPTION</th>
      <th>NOTES</th>
    </tr>
  </thead>
</table>  

<script>
$(function() {
  console.log("LOAD ORDERS/modal_customer_search");
  var url = $("#url").val();
 
  $('#find_terms_datatable').DataTable({
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
            'url': url + 'orders/find_terms',
            'dataSrc':function(response) {
                  var output = [];
                  $.each(response.data, function(index, item) {
                      var col0, col1, col2, col3 = '';
                      col0 = '<button class="btn btn-success btn-xs btn-block" id="term_id"  data-id="' + item.id + '" data-description="' + item.description + '" > SELECT </button>';
                      col1 = item.id;
                      col2 = item.description;
                      col3 = item.notes;

                      output.push([col0, col1, col2, col3]);
                  });
                  return output;
              
            }
        }
    });
});
</script>



