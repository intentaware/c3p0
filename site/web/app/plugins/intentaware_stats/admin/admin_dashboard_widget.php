<script src="<?php echo plugins_url('intentaware/js/Chart.min.js'); ?>"></script>
<?php
$history = $intentClassObj->getHistory();

$output = array();
if(!empty($history))
{
    usort($history, function($a, $b) {
        return strtotime($b->date) - strtotime($a->date);
    });

    $output = array_slice($history, 0, 9);
}
?>

<canvas id="intentHistory"></canvas>
<script>
var ctx = document.getElementById("intentHistory");

var labels = [];
var datas = [];
var j = 0
<?php if(!empty($output)) { ?>
    <?php foreach($output as $h){ ?>
            labels.push("<?php echo $h->date; ?>");
            datas.push(<?php echo $h->count; ?>); 
    <?php } ?>
<?php } ?>

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'History Counts',
            data: datas,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(242, 0, 255, 0.2)',
                'rgba(0, 216, 255, 0.2)',
                'rgba(255, 0, 148, 0.2)',
                'rgba(0, 255, 17, 0.2)',
            ],
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
