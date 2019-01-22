<html>
    <body>
        <div class="col-md-12">
        <h1>Company Stocks</h1>
        <button id="btn" >Show Chart</button>
        <div id="container" style="height: 400px; width: 610px; display:none;"></div>
        </div>    
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
    
<script type="text/javascript">
$(document).ready(function(){
    
	//	console.log(JSON.parse(data));
    // Create the chart
   $("#btn").click(function(){
  $("#container").show();
});
     var data="<?php echo json_encode($data); ?>";
    Highcharts.stockChart('container', {


        rangeSelector: {
            selected: 0
        },

        title: {
            text: 'Company Stock rates'
        },

        tooltip: {
            style: {
                width: '200px'
            },
            valueDecimals: 4,
            shared: true
        },

        yAxis: {
            title: {
                text: 'rates'
            }
        },

        series: [{
            name: 'Stock Rates',
            data: JSON.parse(data),
            id: 'dataseries'

        // the event marker flags
        }, {
            type: 'flags',
            data: [{
                x: Date.UTC(2017, 01, 1),
                title: 'B',
                text: 'Purchasing Date'
            }, {
                x: Date.UTC(2017, 01, 12),
                title: 'D',
                text: 'Selling Date'
            },],
            onSeries: 'dataseries',
            shape: 'circlepin',
            width: 16
        }]
    });
});
</script>    