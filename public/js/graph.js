google.charts.load('current', {
	'packages':['corechart', 'bar']});

google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
	let data = new google.visualization.DataTable();
	data.addColumn('timeofday', 'Hora do dia');
	data.addColumn('number', 'Número de visitas');

	data.addRows([
		[{v: [7, 0, 0], f: '7h'}, 4],
		[{v: [8, 0, 0], f: '8h'}, 10],
		[{v: [9, 0, 0], f: '9h'}, 8],
		[{v: [10, 0, 0], f: '10h'}, 5],
		[{v: [11, 0, 0], f: '11h'}, 6],
		[{v: [12, 0, 0], f: '12h'}, 2],
		[{v: [13, 0, 0], f: '13h'}, 6],
		[{v: [14, 0, 0], f: '14h'}, 4],
		[{v: [15, 0, 0], f: '15h'}, 3],
		[{v: [16, 0, 0], f: '16h'}, 2],
		[{v: [17, 0, 0], f: '17h'}, 1]
		]);

	let options = {
		title: 'Número de visitas ao CEAP',
		height: 600,
		hAxis: {
			title: 'Hora do dia',
			format: 'h:mm a',
			viewWindow: {
				min: [6, 30, 0],
				max: [19, 0, 0]
			}
		},
		vAxis: {
			title: 'Número de veículos'
		}
	};

	let chart = new google.visualization.ColumnChart(
		document.getElementById('grafico_div'));

	chart.draw(data, options);
}