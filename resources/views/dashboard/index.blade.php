@extends('master')

@section('page_css')

@endsection

@section('content')
 <div class="row">
	<div class="col-md-6">
		<div class="white-box">
			<h3 class="box-title">EID OUTCOMES</h3>
			<div class="row">
				<div class="col-md-8">
					<div id="outcomes_pie"></div>
				</div>
				<div class="col-md-4">
					<table class="table table-bordered table-striped" style="margin-top: 100px;">
						<tbody id="eid-outcomes-table"></tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="white-box">
			<h3 class="box-title">EID: Positive Outcome Analysis</h3>
			<div class="row">
				<div class="col-md-8">
					<div id="positive-outcomes-graph"></div>
				</div>
				<div class="col-md-4">
					<table class="table table-bordered table-striped" style="margin-top: 100px;">
						<tbody id="positive-outcomes-table"></tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="white-box">
			<h3 class="box-title">EID: Negative Outcome Analysis</h3>
			<div class="row">
				<div class="col-md-8">
					<div id="negative-outcomes-graph"></div>
				</div>
				<div class="col-md-4">
					<table class="table table-bordered table-striped" style="margin-top: 100px;">
						<tbody id="negative-outcomes-table"></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<div class="white-box">
					<h3 class="box-title">No. of Facilities</h3>
					<ul class="list-inline two-part">
						<li><i class="fa fa-hospital-o text-danger"></i></li>
						<li class="text-right"><span class="counter">2</span></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-sm-6">
				<div class="white-box">
					<h3 class="box-title">Number of Patient Records</h3>
					<ul class="list-inline two-part">
						<li><i class="icon-user text-success"></i></li>
						<li class="text-right"><span class="counter">{{ $patients }}</span></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12 col-sm-6">
				<div class="white-box">
					<h3 class="box-title">Positives: Median TAT</h3>
					<div class="list-group">
						@foreach($positive_tats as $key => $median)
							<a href="javascript:void(0)" class="list-group-item">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<h2 class="list-group-item-heading">{{ $key }}</h2>
										<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 ">
										<h1 class="text-right text-muted m-t-20">{{ $median }} Days</h1>
									</div>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-md-12 col-sm-6">
				<div class="white-box">
					<h3 class="box-title">Negative: Median TAT</h3>
					<div class="list-group">
						@foreach($negative_tats as $key => $median)
							<a href="javascript:void(0)" class="list-group-item">
								<div class="row">
									<div class="col-md-6 col-sm-6 col-xs-6">
										<h2 class="list-group-item-heading">{{ $key }}</h2>
										<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-6 ">
										<h1 class="text-right text-muted m-t-20">{{ $median }} Days</h1>
									</div>
								</div>
							</a>
						@endforeach
					</div>
				</div>
			</div>

			<div class="col-md-12 col-sm-6">
				<div class="white-box">
					<h3 class="box-title">VL Analysis</h3>
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th>No. of PPW Accessing VL</th>
								<td>{{ $ppw_count }}</td>
							</tr>
							<tr>
								<th>Suppressed</th>
								<td>{{ $suppressed }}</td>
							</tr>
							<tr>
								<th>Not Suppressed</th>
								<td>{{ $not_suppressed }}</td>
							</tr>
							<tr>
								<th>Invalid Suppressions</th>
								<td>{{ $invalid_suppression }}</td>
							</tr>
						</tbody>
					</table>
					<h4>Median TAT</h4>
					<div class="list-group">
						<a href="javascript:void(0)" class="list-group-item">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-6">
									<h2 class="list-group-item-heading">Initiated on Treatment to VL Sample collected</h2>
									{{-- <p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p> --}}
								</div>
								<div class="col-md-6 col-sm-6 col-xs-6 ">
									<h1 class="text-right text-muted m-t-20">{{ $initiated_to_sample_collected }} Days</h1>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('page_js')
<script type="text/javascript" src=""></script>
<script type="text/javascript" src="{{ my_asset('js/highcharts/highcharts.js') }}"></script>
<script type="text/javascript" src="{{ my_asset('js/highcharts/exporting.js') }}"></script>
<script type="text/javascript" src="{{ my_asset('js/highcharts/export-data.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		drawEIDOutcomesGraph();
		drawPositiveOutcomesGraph();
		drawNegativeOutcomesGraph();
	});

	function drawEIDOutcomesGraph(){
		$.ajax({
			url: '/api/eid/outcomes',
			beforeSend: function(){
				console.log('Fetching EID Outcomes');
			},
			success: function(res){
				chart_data = [];
				table_data = "";
				$.each(res, function(key, value){
					table_data += "<tr>";
					table_data += "<td>"+value.result+"</td>";
					table_data += "<td>"+value.total+"</td>";
					table_data += "</tr>";
					chart_obj = {};
					chart_obj.name = value.result;
					chart_obj.y = value.total;
					chart_obj.color = (value.result == "Negative") ? "#E53935" : "#43A047"

					chart_data.push(chart_obj);
				});

				$('#eid-outcomes-table').html(table_data);

				Highcharts.chart('outcomes_pie', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: null
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b>: {point.percentage:.1f} %',
								style: {
									color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
								}
							}
						}
					},
					series: [{
						name: 'Outcomes',
						colorByPoint: true,
						data: chart_data
					}]
				});
			}
		});
	}

	function drawPositiveOutcomesGraph(){
		$.ajax({
			url: '/api/eid/positiveoutcomes',
			beforeSend: function(){
				console.log('Fetching EID Positive Outcomes');
			},
			success: function(res){
				chart_data = [];
				var categories = [];
				table_data = "";
				$.each(res, function(key, value){
					var title = "";
					if (value.title == "confirmatory_pcr") {
						title = "With Confirmatory PCR";
					}else if(value.title == "initiated"){
						title = "Initiated on Treatment";
					}else{
						title = value.title;
					}

					categories.push(title);
					chart_data.push(value.total);

					table_data += "<tr>";
					table_data += "<td>"+title+"</td>";
					table_data += "<td>"+value.total+"</td>";
					table_data += "</tr>";
				});

				$('#positive-outcomes-table').html(table_data);

				Highcharts.chart('positive-outcomes-graph', {
					chart: {
						type: 'column'
					},
					title: {
						text: null
					},
					subtitle: {
						text: null
					},
					xAxis: {
						categories: categories,
						crosshair: true
					},
					yAxis: {
						min: 0,
						title: {
							text: 'No. of patients'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Patients',
						data: chart_data
					}]
				});
			}
		});
	}

	function drawNegativeOutcomesGraph(){
		$.ajax({
			url: '/api/eid/negativeoutcomes',
			beforeSend: function(){
				console.log('Fetching EID Negative Outcomes');
			},
			success: function(res){
				chart_data = [];
				var categories = [];
				table_data = "";
				$.each(res, function(key, value){
					var title = "";
					if (value.title == "repeat_vl") {
						title = "Repeat Test";
					}else{
						title = value.title;
					}

					categories.push(title);
					chart_data.push(value.total);

					table_data += "<tr>";
					table_data += "<td>"+title+"</td>";
					table_data += "<td>"+value.total+"</td>";
					table_data += "</tr>";
				});

				$('#negative-outcomes-table').html(table_data);

				Highcharts.chart('negative-outcomes-graph', {
					chart: {
						type: 'column'
					},
					title: {
						text: null
					},
					subtitle: {
						text: null
					},
					xAxis: {
						categories: categories,
						crosshair: true
					},
					yAxis: {
						min: 0,
						title: {
							text: 'No. of patients'
						}
					},
					tooltip: {
						headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y}</b></td></tr>',
						footerFormat: '</table>',
						shared: true,
						useHTML: true
					},
					plotOptions: {
						column: {
							pointPadding: 0.2,
							borderWidth: 0
						}
					},
					series: [{
						name: 'Patients',
						data: chart_data
					}]
				});
			}
		});
	}
</script>
@endsection