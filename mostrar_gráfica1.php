<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/chartist.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <script src="./js/chartist.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="centro">
            <h1>Temperaturas tomadas durante 7 días </h1>
            <span class="temp"><span class="temp-box max">&nbsp;</span>&nbsp; Temperturas Máximas</span>
            <span class="temp"><span class="temp-box min">&nbsp;</span>&nbsp; Temperturas Mínimas</span>
            <span class="subt">Fecha: del 22 al 28 de Febrero de 2023</span>
    </div>
    <?php
    $archivoTemps = "./CSV/tempMyMWeek.csv";

    $handle = fopen($archivoTemps, "r") or die("No se puede abrir el archivo: $archivoTemps");

    $d_encabezados = array();
    $d_temp_max = array();
    $d_temp_min = array();

    $d_encabezados = fgetcsv($handle, 0, ',', '"', '"');
    $d_temp_max = fgetcsv($handle, 0, ',', '"', '"');
    $d_temp_min = fgetcsv($handle, 0, ',', '"', '"');
    ?>
    <div class="ct-chart ct-octave"></div>
    <script>
        var datos = {
            labels: [
                '<?php echo $d_encabezados[0]; ?>',
                '<?php echo $d_encabezados[1]; ?>',
                '<?php echo $d_encabezados[2]; ?>',
                '<?php echo $d_encabezados[3]; ?>',
                '<?php echo $d_encabezados[4]; ?>',
                '<?php echo $d_encabezados[5]; ?>',
                '<?php echo $d_encabezados[6]; ?>',
               
            ],
            series: [{
                name: 'series-a',
                data: [
                    <?php echo $d_temp_max[0]; ?>,
                    <?php echo $d_temp_max[1]; ?>,
                    <?php echo $d_temp_max[2]; ?>,
                    <?php echo $d_temp_max[3]; ?>,
                    <?php echo $d_temp_max[4]; ?>,
                    <?php echo $d_temp_max[5]; ?>,
                    <?php echo $d_temp_max[6]; ?>,
                  
                    ]
                }, {
                    name: 'series-b',
                    data: [
                        <?php echo $d_temp_min[0]; ?>,
                        <?php echo $d_temp_min[1]; ?>,
                        <?php echo $d_temp_min[2]; ?>,
                        <?php echo $d_temp_min[3]; ?>,
                        <?php echo $d_temp_min[4]; ?>,
                        <?php echo $d_temp_min[5]; ?>,
                        <?php echo $d_temp_min[6]; ?>,
                       
                        ]
                    }]
                };
                var opciones = {
                    fullWidth: true,
                    seriesBarDistance: 30,
                    chartPadding: {
                        bottom: 40
                    },
                    axisX: {
                        position: 'start'
                    },
                    axisY: {
                        type: Chartist.FixedScaleAxis,
                        ticks: [0, 20, 25, 30, 35, 40],
                        high: 40,
                    }
                };
                var opcionesResponsive = [
                    ['screen and (min-width: 641px) and (max-width: 1024px)', {
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value;
                            }
                        }
                    }],
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function(value) {
                                return value[0];
                            }
                        }
                    }]
                ];
                new Chartist.Line('.ct-chart', datos, opciones, opcionesResponsive);
                </script>
            </div>
    </script>
</body>
</html>