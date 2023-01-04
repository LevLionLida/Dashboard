<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-base.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
<?php include('/Users/macbook/Documents/dashboard/bd/bd_analytics.php'); //Подключились к БД
?>
<div class="wrapper" style="padding-inline: 5%;">
    <div class="container ">

        <div class="row  justify-content-center">
            <div id="countNewUsers" style="width: 1200px; height: 400px;"></div>
        </div>
        <div class="row  justify-content-center">
            <div id="countNewPhones" style="width: 1200px; height: 400px;"></div>
        </div>
        <div class="row  justify-content-center">
            <div id="countActiveTariff" style="width: 1200px; height: 400px;"></div>
        </div>
        <div class="row  justify-content-center">
            <div id="countDisabledTariff" style="width: 1200px; height: 400px;"></div>
        </div>
        <div class="row  justify-content-center">
            <div id="countCountPayments" style="width: 1200px; height: 400px;"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

</div>

</body>
<!--//newUsers-->
<script>

    function sendAjaxUser() {
        $.ajax({
            type: "GET",
            url: 'api.php',
            data: {
                get_new_users: true
            },
            success: function (response) {
                let data = [];
                for (let i = 0; i < response.length; i++) {
                    let item = response[i];
                    data.push([
                        item.date,
                        parseInt(item.user)
                    ]);
                }

                // create a chart
                chart = anychart.area();
                chart.title("Количество новых пользователей");
                var yAxisLabels = chart.xAxis().labels();
                yAxisLabels.rotation(90)
                // create an area series and set the data
                var series = chart.area(data);


                // set the container id
                chart.container("countNewUsers");

                // initiate drawing the chart
                chart.draw();
            },
            dataType: 'json'
        });
    }

    $(document).ready(function () {
        sendAjaxUser();
    });
</script>
<!--//newPhones-->
<script>

    function sendAjaxPhones() {
        $.ajax({
            type: "GET",
            url: 'api.php',
            data: {
                get_new_phones: true
            },
            success: function (response) {
                let data = [];
                for (let i = 0; i < response.length; i++) {
                    let item = response[i];
                    data.push([
                        item.date,
                        // 'asd',
                        parseInt(item.phone)
                    ]);
                }
                // create a chart
                chart = anychart.area();
                chart.title("Количество новых номеров ");
                var yAxisLabels = chart.xAxis().labels();
                yAxisLabels.rotation(90)
                // create an area series and set the data
                var series = chart.area(data);
                // set the container id
                chart.container("countNewPhones");

                // initiate drawing the chart
                chart.draw();
            },
            dataType: 'json'
        });
    }

    $(document).ready(function () {
        sendAjaxPhones();
    });
</script>
<!--//ActiveTariff-->
<script>

    function sendAjaxActiveTariff() {
        $.ajax({
            type: "GET",
            url: 'api.php',
            data: {
                get_active_tariff: true
            },
            success: function (response) {
                let data = [];
                for (let i = 0; i < response.length; i++) {
                    let item = response[i];
                    data.push([
                        item.date,
                        // 'asd',
                        parseInt(item.tariff)
                    ]);
                }
                // create a chart
                chart = anychart.area();
                chart.title("Количество номеров с активным тарифом ");
                var yAxisLabels = chart.xAxis().labels();
                yAxisLabels.rotation(90)
                // create an area series and set the data
                var series = chart.area(data);
                // set the container id
                chart.container("countActiveTariff");

                // initiate drawing the chart
                chart.draw();
            },
            dataType: 'json'
        });
    }

    $(document).ready(function () {
        sendAjaxActiveTariff();
    });
</script>
<!--//DisableTariff-->
<script>

    function sendAjaxDisabledTariff() {
        $.ajax({
            type: "GET",
            url: 'api.php',
            data: {
                get_disabled_tariff: true
            },
            success: function (response) {
                console.log(response);

                let data = [];
                for (let i = 0; i < response.length; i++) {
                    let item = response[i];
                    data.push([
                        item.date,
                        // 'asd',
                        parseInt(item.tariff)
                    ]);
                }
                // create a chart
                chart = anychart.area();
                chart.title("Количество номеров с неактивным тарифом ");
                var yAxisLabels = chart.xAxis().labels();
                yAxisLabels.rotation(90)
                // create an area series and set the data
                var series = chart.area(data);
                // set the container id
                chart.container("countDisabledTariff");

                // initiate drawing the chart
                chart.draw();
            },
            dataType: 'json'
        });
    }

    $(document).ready(function () {
        sendAjaxDisabledTariff();
    });
</script>
<!--//CountPayments-->
<script>

    function sendAjaxCountPayments() {
        $.ajax({
            type: "GET",
            url: 'api.php',
            data: {
                get_count_payments: true
            },
            success: function (response) {
                console.log(response.count_payments);
                var json = {
                    // chart settings
                    "chart": {
                        // chart type
                        "title": 'Количество оплат',
                        "type": "pie",
                        // chart data
                        "data": response.count_payments,
                        // chart container
                        "container": "countCountPayments"
                    }
                };
                var chart = anychart.fromJson(json);
                // draw chart
                chart.draw();
            },
            dataType: 'json'
        });
    }

    $(document).ready(function () {
        sendAjaxCountPayments();
    });
</script>
</html>