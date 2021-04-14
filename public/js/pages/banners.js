$(document).ready(function() {
    $('#bannerTable').DataTable();

    $('#bannerAddButton').click(function() {
    	$('#bannerAddForm').toggleClass('d-none');
    });
} );