//autocomplete function 
//From transport.opendata example
$(function() {
	$('.input').autocomplete({
		source : function(request, response) {
			$.get('https://transport.opendata.ch/v1/locations?', {
				query : request.term,
				type : 'station'
			}, function(data) {
				response($.map(data.stations, function(station) {
					return {
						label : station.name,
						station : station
					}
				}));
			}, 'json');
		},
	});
});

//Function Elia
//Think there is a bug
//$(".input").keyup(function(station) {
//	var value = $(this).val();
//
//	//if (value.length > 4) {
//		$.getJSON('http://transport.opendata.ch/v1/locations?', {
//			query : value
//		})
//		.done(function(data) {
//			var stations = [];
//			$.each(data.stations, function(i, item) {
//				// console.log(item.name);
//				stations.push(item.name);
//				$
//				(".input").autocomplete({
//					source : stations
//				});
//			});
//		});
////	}
//});