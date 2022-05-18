<?php
?>

<script>
$(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("/function/data_polutant.php",
                function (data)
                {
                    console.log(data);
                    var id = [];
                    var reading_time = [];
                    var GAS1 = [];
                    var GAS2 = [];
                    var GAS3 = [];
                    var GAS4 = [];
                    var GAS5 = [];

                    for (var i in data) {
                        id.push(data[i].id);
                        reading_time.push(data[i].reading_time);
                        GAS1.push(data[i].GAS1);
                        GAS2.push(data[i].GAS2);
                        GAS3.push(data[i].GAS3);
                        GAS4.push(data[i].GAS4);
                        GAS5.push(data[i].GAS5);
                    }

                    var chartdata = {
                        labels: reading_time,
                        datasets: [
                            {
                                label: 'GAS1',
                                borderColor: '#CC0066',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS1,
                                fill: false,
                                lineTension: 0,
                                
                            },
                            {
                                label: 'GAS2',
                                borderColor: '#00A7B5',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS2,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'GAS3',
                                borderColor: '#2D3131',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS3,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'GAS4',
                                borderColor: '#BAD090',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS4,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'GAS5',
                                borderColor: '#B0E2FF',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS5,
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