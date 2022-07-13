$(document).ready(function() {
	
	$("a#print").click(function() {
		window.print();
	});
	
	
	window.setTimeout(function() {
		$(".alert").slideUp(500);
	}, 5000);
	
	
	$("a.delete").click(function() {
		var result = window.confirm("Are you sure you want to delete?");
		if(!result) {
			event.preventDefault();
		}
	});
	
});
