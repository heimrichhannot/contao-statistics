(function ($) {
	var STATISTICS = {
		init: function ()
		{
			this.initPieCharts();
		},
		initPieCharts: function()
		{
			$('.statistics_distribution_pie_chart').each(function() {
				var canvas = $(this).find('canvas'),
					labels = canvas.data('labels'),
					data = canvas.data('data');

				new Chart(canvas, {
					type: 'pie',
					data: {
						labels: typeof labels == 'string' ? labels.split(',') : [labels],
						datasets: [
							{
								data: typeof data == 'string' ? data.split(',') : [data],
								backgroundColor: [
									'#FF6384',
									'#36A2EB',
									'#FFCE56',
									'#4BC0C0',
									'#F5A26F',
									'#DA97E0'
								]
							}
						]
					}
				});
			});
		}
	};

	$(document).ready(function () {
		STATISTICS.init();
	});
})(jQuery);