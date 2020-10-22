<script>
    <?php
    function js_str($s){
        return '"' . addcslashes($s, "\0..\37\"\\") . '"';
    }

    function js_array($array){
        $temp = array_map('js_str', $array);
        return '[' . implode(',', $temp) . ']';
    }
    // $data = array();
    $label = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = Date('Y');
        $totalSkor1 = $this->Dashboard_model->totalPrestasiPerBulan($bulan,$thn_ini);

        // $total = str_replace(",", "44", number_format($pem['total_pemasukan']));
        
        $data[] = $totalSkor1;
    }

    for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = Date('Y');
        $totalSkor = $this->Dashboard_model->totalPelanggaranPerBulan($bulan,$thn_ini);

        // $total = str_replace(",", "44", number_format($pem['total_pemasukan']));
        
        $data2[] = $totalSkor;
    }

    ?>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= js_array($label)?>,
        datasets: [{
            label: "Jumlah",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: <?= js_array($data);?>,
        },{
            label: "Jumlah",
            lineTension: 0.3,
            backgroundColor: "rgba(255, 66, 66,1)", 
            //255, 66, 66. 
            // color: "rgb(255, 23, 12 )",
            borderColor: "rgba(247,10,10,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(247,10,10,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(247,10,10,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: <?= js_array($data2);?>,
        }],
    },
    options: {
        scales: {
        xAxes: [{
            time: {
            unit: 'date'
            },
            gridLines: {
            display: false
            },
            ticks: {
            maxTicksLimit: 12
            }
        }],
        yAxes: [{
            ticks: {
            min: 0,
            max: 1000,
            maxTicksLimit: 10
            },
            gridLines: {
            color: "rgba(0, 0, 0, .125)",
            }
        }],
        },
        legend: {
        display: false
        }
    }
    });

//====================================================================================================================================//
<?php
    $totalPrestasi = $this->Dashboard_model->totalPrestasi();
    $totalPelanggaran = $this->Dashboard_model->totalPelanggaran();
    $totalPencatatan = $this->Dashboard_model->totalPencatatan();

?>
Highcharts.chart('coba', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: true,
        type: 'pie'
    },
    title: {
        text: '<b>Perbandingan Total Skor Pelanggaran dan Prestasi Saat Ini</b>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Total Skor',
        colorByPoint: true,
        data: [{
            name: 'Prestasi',
            y:<?= $totalPrestasi/$totalPencatatan ?>,
            // color: "rgb(51,255,236)",
            color: "rgb(12,53,255 )",
            // sliced: true,
            // selected: true
            //Dua hal ini digunakan untuk mengambil skor terbesar, sehingga bagian tersebut dapat terpisah. 
        }, {
            name: 'Pelanggaran',
            y: <?= $totalPelanggaran/$totalPencatatan ?>,
            color: "rgb(255, 23, 12 )",
        }
        // , {
        //     name: 'Firefox',
        //     y: 10.85
        // }, {
        //     name: 'Edge',
        //     y: 4.67
        // }, {
        //     name: 'Safari',
        //     y: 4.18
        // }, {
        //     name: 'Other',
        //     y: 7.05
        // }
        ]
    }]
});


</script>