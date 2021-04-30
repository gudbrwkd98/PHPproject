<script type="text/javascript">
	$(document).ready(function(){

		var table = $('#datatable').DataTable();

		table.on('click','.edit',function(){

			$tr = $(this).closest('tr');
			if ($($tr).hasClass('child')){
				$tr = $tr.prev('.parent')

			}	

			var data = table.row($tr).data();
			console.log(data);

			$('#name').val(data[1]);



			$('#editForm').attr('action', 'admin.users.edit'+data[0]);
			$('#editModal').modal('show');

		});



	});


</script>
<script type="text/javascript">
	

	$(document).ready(function() {
    $('#example').DataTable( {
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
} );
</script>
