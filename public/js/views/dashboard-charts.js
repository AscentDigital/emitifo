$(function(){

    //convert Hex to RGBA
    function convertHex(hex,opacity){
        hex = hex.replace('#','');
        r = parseInt(hex.substring(0,2), 16);
        g = parseInt(hex.substring(2,4), 16);
        b = parseInt(hex.substring(4,6), 16);

        result = 'rgba('+r+','+g+','+b+','+opacity/100+')';
        return result;
    }

    //Cards with Charts
    var labels = ['January','February','March','April','May','June','July'];
    var data = {
        labels: labels,
        datasets: [
            {
                label: 'Subscribers',
                backgroundColor: $.brandPrimary,
                borderColor: 'rgba(255,255,255,.55)',
                data: [65, 59, 84, 84, 51, 55, 40]
            },
        ]
    };
    var options = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent',
                }

            }],
            yAxes: [{
                display: false,
                ticks: {
                    display: false,
                    min: Math.min.apply(Math, data.datasets[0].data) - 5,
                    max: Math.max.apply(Math, data.datasets[0].data) + 5,
                }
            }],
        },
        elements: {
            line: {
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4,
            },
        }
    };
    var ctx = $('#card-chart1');
    var cardChart1 = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

    var data = {
        labels: labels,
        datasets: [
            {
                label: 'SMS Sent',
                backgroundColor: $.brandInfo,
                borderColor: 'rgba(255,255,255,.55)',
                data: [1, 18, 9, 17, 34, 22, 11]
            },
        ]
    };
    var options = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                gridLines: {
                    color: 'transparent',
                    zeroLineColor: 'transparent'
                },
                ticks: {
                    fontSize: 2,
                    fontColor: 'transparent',
                }

            }],
            yAxes: [{
                display: false,
                ticks: {
                    display: false,
                    min: Math.min.apply(Math, data.datasets[0].data) - 5,
                    max: Math.max.apply(Math, data.datasets[0].data) + 5,
                }
            }],
        },
        elements: {
            line: {
                tension: 0.00001,
                borderWidth: 1
            },
            point: {
                radius: 4,
                hitRadius: 10,
                hoverRadius: 4,
            },
        }
    };
    var ctx = $('#card-chart2');
    var cardChart2 = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

    var options = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                display: false
            }],
            yAxes: [{
                display: false
            }],
        },
        elements: {
            line: {
                borderWidth: 2
            },
            point: {
                radius: 0,
                hitRadius: 10,
                hoverRadius: 4,
            },
        }
    };
    var data = {
        labels: labels,
        datasets: [
            {
                label: 'Clicks',
                backgroundColor: 'rgba(255,255,255,.2)',
                borderColor: 'rgba(255,255,255,.55)',
                data: [78, 81, 80, 45, 34, 12, 40]
            },
        ]
    };
    var ctx = $('#card-chart3');
    var cardChart3 = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

    //Random Numbers
    function random(min,max) {
        return Math.floor(Math.random()*(max-min+1)+min);
    }

    var elements = 16;
    var labels = [];
    var data = [];

    for (var i = 2000; i <= 2000 + elements; i++) {
        labels.push(i);
        data.push(random(40,100));
    }

    var options = {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                display: false,
                barPercentage: 0.6,
            }],
            yAxes: [{
                display: false,
            }]
        },

    };
    var data = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'rgba(255,255,255,.3)',
                borderColor: 'transparent',
                data: data
            },
        ]
    };
    var ctx = $('#card-chart4');
    var cardChart4 = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

 
 
 


    //Social Box Charts
    var labels = ['January','February','March','April','May','June','July'];

    var options = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                display:false,
            }],
            yAxes: [{
                display:false,
            }]
        },
        elements: {
            point: {
                radius: 0,
                hitRadius: 10,
                hoverRadius: 4,
                hoverBorderWidth: 3,
            }
        }
    };

    var data1 = {
        labels: labels,
        datasets: [{
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
            pointHoverBackgroundColor: '#fff',
            borderWidth: 2,
            data: [65, 59, 84, 84, 51, 55, 40]
        }]
    };
    var ctx = $('#social-box-chart-1');
    var socialBoxChart1 = new Chart(ctx, {
        type: 'line',
        data: data1,
        options: options
    });

    var data2 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'rgba(255,255,255,.1)',
                borderColor: 'rgba(255,255,255,.55)',
                pointHoverBackgroundColor: '#fff',
                borderWidth: 2,
                data: [1, 13, 9, 17, 34, 41, 38]
            }
        ]
    };
    var ctx = $('#social-box-chart-2').get(0).getContext('2d');
    var socialBoxChart2 = new Chart(ctx, {
        type: 'line',
        data: data2,
        options: options
    });

    var data3 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'rgba(255,255,255,.1)',
                borderColor: 'rgba(255,255,255,.55)',
                pointHoverBackgroundColor: '#fff',
                borderWidth: 2,
                data: [78, 81, 80, 45, 34, 12, 40]
            }
        ]
    };
    var ctx = $('#social-box-chart-3').get(0).getContext('2d');
    var socialBoxChart3 = new Chart(ctx, {
        type: 'line',
        data: data3,
        options: options
    });

    var data4 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'rgba(255,255,255,.1)',
                borderColor: 'rgba(255,255,255,.55)',
                pointHoverBackgroundColor: '#fff',
                borderWidth: 2,
                data: [35, 23, 56, 22, 97, 23, 64]
            }
        ]
    };
    var ctx = $('#social-box-chart-4').get(0).getContext('2d');
    var socialBoxChart4 = new Chart(ctx, {
        type: 'line',
        data: data4,
        options: options
    });



    //Sparkline Charts
    var labels = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

    var options = {
        legend: {
            display: false,
        },
        scales: {
            xAxes: [{
                display:false,
            }],
            yAxes: [{
                display:false,
            }]
        },
        elements: {
            point: {
                radius: 0,
                hitRadius: 10,
                hoverRadius: 4,
                hoverBorderWidth: 3,
            }
        },
    };

    var data1 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: $.brandPrimary,
                borderWidth: 2,
                data: [35, 23, 56, 22, 97, 23, 64]
            }
        ]
    };
    var ctx = $('#sparkline-chart-1');
    var sparklineChart1 = new Chart(ctx, {
        type: 'line',
        data: data1,
        options: options
    });

    var data2 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: $.brandDanger,
                borderWidth: 2,
                data: [78, 81, 80, 45, 34, 12, 40]
            }
        ]
    };
    var ctx = $('#sparkline-chart-2');
    var sparklineChart2 = new Chart(ctx, {
        type: 'line',
        data: data2,
        options: options
    });

    var data3 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: $.brandWarning,
                borderWidth: 2,
                data: [35, 23, 56, 22, 97, 23, 64]
            }
        ]
    };
    var ctx = $('#sparkline-chart-3');
    var sparklineChart3 = new Chart(ctx, {
        type: 'line',
        data: data3,
        options: options
    });

    var data4 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: $.brandSuccess,
                borderWidth: 2,
                data: [78, 81, 80, 45, 34, 12, 40]
            }
        ]
    };
    var ctx = $('#sparkline-chart-4');
    var sparklineChart4 = new Chart(ctx, {
        type: 'line',
        data: data4,
        options: options
    });

    var data5 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: '#d1d4d7',
                borderWidth: 2,
                data: [35, 23, 56, 22, 97, 23, 64]
            }
        ]
    };
    var ctx = $('#sparkline-chart-5');
    var sparklineChart5 = new Chart(ctx, {
        type: 'line',
        data: data5,
        options: options
    });

    var data6 = {
        labels: labels,
        datasets: [
            {
                backgroundColor: 'transparent',
                borderColor: $.brandInfo,
                borderWidth: 2,
                data: [78, 81, 80, 45, 34, 12, 40]
            }
        ]
    };
    var ctx = $('#sparkline-chart-6');
    var sparklineChart6= new Chart(ctx, {
        type: 'line',
        data: data6,
        options: options
    });

});

$(function (){ 
    "use strict";
  //Opt-ins
  var randomizer = function(){ return Math.round(Math.random()*50)};
  var lineChartData = {
    labels : ['February','March','April','May','June','July','August'],
    datasets : [
      {
        label: 'Opt-Outs',
        backgroundColor : 'rgba(230,47,83,0.2)',
        borderColor : 'rgba(230,47,83,1)',
        pointBackgroundColor : 'rgba(230,47,83,1)',
        pointBorderColor : 'rgba(230,47,83,1)',
        data : [randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer()]
      },
      {
        label: 'Opt-Ins',
        backgroundColor : 'rgba(61,188,110,0.2)',
        borderColor : 'rgba(61,188,110,1)',
        pointBackgroundColor : 'rgba(61,188,110,1)',
        pointBorderColor : 'rgba(61,188,110,1)',
        data : [randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer()]
      }
    ]
  }

  var ctx = document.getElementById('canvas-1');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: lineChartData,
    options: {
      responsive: true
    }
  });   

    //Opt-ins
  var randomizer = function(){ return Math.round(Math.random()*50)};
  var lineChartData_lie = {
    labels : ['February','March','April','May','June','July','August', 'September'],
    datasets : [
      {
        label: 'Opt-Outss',
        backgroundColor : 'rgba(230,47,83,0.2)',
        borderColor : 'rgba(230,47,83,1)',
        pointBackgroundColor : 'rgba(230,47,83,1)',
        pointBorderColor : 'rgba(230,47,83,1)',
        data : [randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer()]
      },
      {
        label: 'Opt-Ins',
        backgroundColor : 'rgba(61,188,110,0.2)',
        borderColor : 'rgba(61,188,110,1)',
        pointBackgroundColor : 'rgba(61,188,110,1)',
        pointBorderColor : 'rgba(61,188,110,1)',
        data : [randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer(),randomizer()]
      }
    ]
  }

  var ctx = document.getElementById('canvas-11');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: lineChartData_lie,
    options: {
      responsive: true
    }
  });    


  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  var barChartData = {
    labels : ['January','February','March','April','May','June','July'],
    datasets : [
      {
        backgroundColor : 'rgba(220,220,220,0.5)',
        borderColor : 'rgba(220,220,220,0.8)',
        highlightFill: 'rgba(220,220,220,0.75)',
        highlightStroke: 'rgba(220,220,220,1)',
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        backgroundColor : 'rgba(151,187,205,0.5)',
        borderColor : 'rgba(151,187,205,0.8)',
        highlightFill : 'rgba(151,187,205,0.75)',
        highlightStroke : 'rgba(151,187,205,1)',
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
    ]
  }
  var ctx = document.getElementById('canvas-2');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
      responsive: true
    }
  });


  var doughnutData = {
    labels: [
      'Red',
      'Green',
      'Yellow'
    ],
    datasets: [{
      data: [300, 50, 100],
      backgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ],
      hoverBackgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ]
    }]
  };
  var ctx = document.getElementById('canvas-3');
  var chart = new Chart(ctx, {
    type: 'doughnut',
    data: doughnutData,
    options: {
      responsive: true
    }
  });


  var radarChartData = {
    labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
    datasets: [
      {
        label: 'My First dataset',
        backgroundColor: 'rgba(220,220,220,0.2)',
        borderColor: 'rgba(220,220,220,1)',
        pointBackgroundColor: 'rgba(220,220,220,1)',
        pointBorderColor: '#fff',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data: [65,59,90,81,56,55,40]
      },
      {
        label: 'My Second dataset',
        backgroundColor: 'rgba(151,187,205,0.2)',
        borderColor: 'rgba(151,187,205,1)',
        pointBackgroundColor: 'rgba(151,187,205,1)',
        pointBorderColor: '#fff',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(151,187,205,1)',
        data: [28,48,40,19,96,27,100]
      }
    ]
  };
  var ctx = document.getElementById('canvas-4');
  var chart = new Chart(ctx, {
    type: 'radar',
    data: radarChartData,
    options: {
      responsive: true
    }
  });


  var pieData = {
    labels: [
      'Red',
      'Green',
      'Yellow'
    ],
    datasets: [{
      data: [300, 50, 100],
      backgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ],
      hoverBackgroundColor: [
        '#FF6384',
        '#36A2EB',
        '#FFCE56'
      ]
    }]
  };
  var ctx = document.getElementById('canvas-5');
  var chart = new Chart(ctx, {
    type: 'pie',
    data: pieData,
    options: {
      responsive: true
    }
  });


  var polarData = {
    datasets: [{
      data: [
        11,
        16,
        7,
        3,
        14
      ],
      backgroundColor: [
        '#FF6384',
        '#4BC0C0',
        '#FFCE56',
        '#E7E9ED',
        '#36A2EB'
      ],
      label: '' // for legend
    }],
    labels: [
      'Red',
      'Green',
      'Yellow',
      'Grey',
      'Blue'
    ]
  };
  var ctx = document.getElementById('canvas-6');
  var chart = new Chart(ctx, {
    type: 'polarArea',
    data: polarData,
    options: {
      responsive: true
    }
  });
});
