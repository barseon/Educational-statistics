<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/views/favicon.ico">
    <title>Educational statistic</title>
    <!-- Bootstrap core CSS -->
    <link href="/views/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/views/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="/views/assets/css/custom.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/views/assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"></script>
    <![endif]-->
</head>

<body>

<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1>Educational statistic</h1>
    </div>
    <p class="lead">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Program</th>
            <?php foreach($data->Columns as $column): ?>
                <th><?= substr($column, 0, 3) ?></th>
            <?php endforeach ?>

        </tr>
        </thead>
        <tbody>
        <?php foreach($data->Rows as $name=>$value): ?>
        <tr>
                <th><?= $name ?></th>
                <?php foreach($value as $count): ?>
                    <th><?= $count ?></th>
                <?php endforeach ?>
        </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    </p>

    <p class="lead">

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </p>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script src="/views/dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/views/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
<script>
    $(function () {
        $('#container').highcharts({
            title: {
                text: 'Monthly Average',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: [<?php foreach($data->Columns as $column): ?>'<?= substr($column, 0, 3) ?>',<?php endforeach ?>]
            },
            yAxis: {
                title: {
                    text: 'Students'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [
            <?php foreach($data->Rows as $name=>$value): ?>
                {
                name: '<?= $name ?>',
                data: [
                <?php foreach($value as $count): ?>
                    <?= $count ?>,
                <?php endforeach ?>
                    ]
                },
            <?php endforeach ?>
            ]
        });
    });
</script>
</body>
</html>
