<html>

<head>
    <title>My first chart using FusionCharts Suite XT</title>
    <script type="text/javascript" src="path/to/local/fusioncharts.js"></script>
    <script type="text/javascript" src="path/to/local/themes/fusioncharts.theme.fusion.js"></script>
    <script type="text/javascript">
        FusionCharts.ready(function() {
            var revenueChart = new FusionCharts({
                "type": "column2d",
                "renderAt": "chart-container",
                "width": "700",
                "height": "400",
                "dataFormat": "json",
                "dataSource": {
                    // Chart Configuration
                    "chart": {
                        "caption": "Countries With Most Oil Reserves [2017-18]",
                        "subCaption": "In MMbbl = One Million barrels",
                        "xAxisName": "Country",
                        "yAxisName": "Reserves (MMbbl)",
                        "numberSuffix": "K",
                        "theme": "fusion",
                    },
                    // Chart Data
                    "data": [{
                        "label": "Venezuela",
                        "value": "290"
                    }, {
                        "label": "Saudi",
                        "value": "260"
                    }, {
                        "label": "Canada",
                        "value": "180"
                    }, {
                        "label": "Iran",
                        "value": "140"
                    }, {
                        "label": "Russia",
                        "value": "115"
                    }, {
                        "label": "UAE",
                        "value": "100"
                    }, {
                        "label": "US",
                        "value": "30"
                    }, {
                        "label": "China",
                        "value": "30"
                    }]
                }
            });
            revenueChart.render();
        })
    </script>
</head>
<body>
    <div id="chart-container">FusionCharts XT will load here!</div>
</body>
</html>