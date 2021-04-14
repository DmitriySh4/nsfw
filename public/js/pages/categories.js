$(document).ready(function() {
    $('#catTable').DataTable();

    $('#catAddButton').click(function() {
    	$('#catAddForm').toggleClass('d-none');
    });
} );