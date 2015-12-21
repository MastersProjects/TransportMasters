//Autocomplete for station input
$(".input").keyup(function(station) {
	var value = $(this).val();
	$.getJSON('http://transport.opendata.ch/v1/locations?', {
		query : value
	}).done(function(data) {
		// $( ".input" ).autocomplete({
		// source: data
		// });
		$.each(data.stations, function(i, item) {
			console.log(item.name);
		});
	});
});
