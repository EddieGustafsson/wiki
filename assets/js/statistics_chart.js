var speedCanvas = document.getElementById("canvas");

function hoursEarlier(hours) {
  return moment().subtract(hours, 'h').toDate();
};

var speedData = {
  labels: [hoursEarlier(10), hoursEarlier(9.4), hoursEarlier(8), hoursEarlier(7), hoursEarlier(6), hoursEarlier(5), hoursEarlier(4)],
  datasets: [{
    label: "Car Speed",
    data: [0, 59, 75, 20, 20, 55, 40],
    lineTension: 0.25,
    fill: false,
    borderColor: 'orange',
    backgroundColor: 'transparent',
    pointBorderColor: 'orange',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    borderDash: [5, 5],
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  },
  scales: {
    xAxes: [{
      type: "time",
      time: {
        unit: 'hour',
        unitStepSize: 0.5,
        round: 'hour',
        tooltipFormat: "h:mm:ss a",
        displayFormats: {
          hour: 'MMM D, h:mm A'
        }
      }
    }],
    yAxes: [{
      gridLines: {
        color: "black",
        borderDash: [2, 5],
      },
      scaleLabel: {
        display: true,
        labelString: "Speed in Miles per Hour",
        fontColor: "green"
      }
    }]
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});