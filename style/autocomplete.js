//Autocomplete for station input
$(".input").keyup(function(station) {
	var value = $(this).val();

	if (value.length > 4) {
		$.getJSON('http://transport.opendata.ch/v1/locations?', {
			query : value
		})
		
		.done(function(data) {
			var stations = [];
			$.each(data.stations, function(i, item) {
				console.log(item.name);
				stations.push(item.name);
			});
		});
	}
});
