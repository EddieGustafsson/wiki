<div class="row">
    <div class="col">
        <div class="shadow card bg-success text-white h-100 rounded">
            <div class="card-body bg-success">
                <div class="rotate">
                    <i class="fa fa-user fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Användare</h6>
                <h1><?php echo sizeof($user_list['anvandare']); ?></h1>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="shadow card text-white bg-danger h-100 rounded">
            <div class="card-body bg-danger">
                <div class="rotate">
                    <i class="far fa-sticky-note fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Artiklar</h6>
                <h1><?php echo $page_tot;?></h1>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="shadow card text-white bg-info h-100 rounded">
            <div class="card-body bg-info">
                <div class="rotate">
                    <i class="fas fa-pencil-alt fa-lg"></i>
                </div>
                <h6 class="text-uppercase">Ändringar</h6>
                <h1>125</h1>
            </div>
        </div>
    </div>
</div>
<div class="shadow card mt-3">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <canvas id="chartjs" width="100%" height="60%"></canvas>
  </div>
</div>

<script>
var canvas = document.getElementById('chartjs');

var data = {
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
  datasets: [{
    label: 'Counts',
    data: [0, 0, 2, 0, 1, 3, 5],
    fill: false,
    lineTension: 0,
    backgroundColor: 'rgba(75,192,192,0.4)',
    borderWidth: 3,
    borderColor: 'rgba(75,192,192,1)',
    borderCapStyle: 'round',
    borderJoinStyle: 'round',
    pointBorderColor: 'rgba(75,192,192,1)',
    pointBackgroundColor: '#fff',
    pointBorderWidth: 1,
    pointHoverRadius: 5,
    pointHoverBackgroundColor: 'rgba(75,192,192,1)',
    pointHoverBorderColor: 'rgba(220,220,220,1)',
    pointHoverBorderWidth: 2,
    pointRadius: 3,
    pointHitRadius: 20,
    pointStyle: 'circle',
  }]
};

var myBarChart = Chart.Line(canvas, {
  data: data,
  options: {
    scales: {
      yAxes: [{
        ticks: {
            beginAtZero:true,
            suggestedMax:10
        }
      }]
    }
  }
});
</script>