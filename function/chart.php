<?php
?>

<script>
$(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                    var id = [];
                    var reading_time = [];
                    var mq3 = [];
                    var mq7 = [];
                    var mq9 = [];
                    var mg811 = [];
                    var tgs2600 = [];

                    for (var i in data) {
                        id.push(data[i].id);
                        reading_time.push(data[i].reading_time);
                    //    mq3.push(data[i].mq3);
                        mq7.push(data[i].mq7);
                        mq9.push(data[i].mq9);
                        mg811.push(data[i].mg811);
                        tgs2600.push(data[i].tgs2600);
                    }

                    var chartdata = {
                        labels: reading_time,
                        datasets: [
                    //        {
                    //            label: 'TGS2600',
                    //            borderColor: '#CC0066',
                    //            hoverBackgroundColor: '#CCCCCC',
                    //            hoverBorderColor: '#666666',
                    //            data: mq3,
                    //            fill: false,
                    //            lineTension: 0,
                    //            
                    //        },
                            {
                                label: 'MQ3',
                                borderColor: '#00A7B5',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: mq7,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'MQ9',
                                borderColor: '#2D3131',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: mq9,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'MQ135',
                                borderColor: '#BAD090',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: mg811,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'MQ7',
                                borderColor: '#B0E2FF',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: tgs2600,
                                fill: false,
                                lineTension: 0,
                            },
                        ]
                    };

                    var graphTarget = $("#graphCanvas");
                    const config = {
                        options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            }
                        },
                    };

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata,
                    });
                });
            }
        }
</script>