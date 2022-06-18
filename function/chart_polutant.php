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
                    for (var i in data) {
                        id.push(data[i].id);
                        reading_time.push(data[i].reading_time);
                        GAS1.push(data[i].GAS1);
                        GAS2.push(data[i].GAS2);
                        GAS3.push(data[i].GAS3);
                    }

                    var chartdata = {
                        labels: reading_time,
                        datasets: [
                            {
                                label: 'CO',
                                borderColor: '#CC0066',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS1,
                                fill: false,
                                lineTension: 0,
                                
                            },
                            {
                                label: 'NH3',
                                borderColor: '#00A7B5',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS2,
                                fill: false,
                                lineTension: 0,
                            },
                            {
                                label: 'NO',
                                borderColor: '#2D3131',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: GAS3,
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