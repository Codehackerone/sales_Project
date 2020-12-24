<script src="vendor/chart.js/Chart.min.js"></script>
<body>
<?php
function count_digit($number){
	return strlen((string)$number);
}
function convert1($str,$j){
  if($j==1){
  $n=(int)$str;
  $n--;
  if(count_digit($n)==1)
  {
    return ("0".$n);
  }
  else
  {
    return((string)$n);
  }
}
  else
  {
    return (string)12;
  }
}
$propur=array();
$arr1=array("no","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$ty=(int)date("Y");
$tm=(int)date("m");
$tmi=(string)date("m");
for($i=0;$i<6;$i++)
{
    if($tm==1)
    {
      $ty=--$ty;
      $tm=12;
      $tmi=convert1($tmi,2);
    }
    else{
      $tm--;
      $tmi=convert1($tmi,1);
    }
    $thisd=$ty."-".$tmi;
    $thisdate=date($thisd);
    $money=0.0;
    $sql="SELECT * FROM purchase WHERE pur_date LIKE '%$thisdate%' ORDER BY pur_date ASC";
    $result=$conn->query($sql);
    if($result->num_rows>0)
    {
      while($row=$result->fetch_assoc())
      {
      $money=$money+$row['gtotal'];
      }
      ?>
      <input type="hidden" id="<?='monthp'.$i?>" value="<?=$arr1[$tm]." ".$ty?>">
      <input type="hidden" id="<?='moneyp'.$i?>" value="<?=$money?>">
      <?php
			$propur[$i]=$money;
    }
    else
    {
      $money=0;?>
      <input type="hidden" id="<?='monthp'.$i?>" value="<?=$arr1[$tm]." ".$ty?>">
      <input type="hidden" id="<?='moneyp'.$i?>" value="<?=$money?>">
      <?php
			$propur[$i]=$money;
    }
}
?>
</body>
<script>
var  arr1=[],arr2=[],arrpm=[];
for(var i=0;i<6;i++)
{
  arr1[i]=document.getElementById('monthp'+i).value;
	arrpm[i]=document.getElementById('monthp'+i).value;
  arr2[i]=document.getElementById('moneyp'+i).value;
}
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myChart1");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: arr1,
    datasets: [{
      label: "Purchase",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: arr2,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rs.' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rs.' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
// Set new default font family and font color to mimic Bootstrap's default styling

</script>
