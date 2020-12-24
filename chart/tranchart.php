<script src="vendor/chart.js/Chart.min.js"></script>
<?php
function convert11($str,$j){
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
$protran=array();
$arr11=array("no","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
$ty1=(int)date("Y");
$tm1=(int)date("m");
$tmi1=(string)date("m");
for($i=0;$i<6;$i++)
{
    if($tm1==1)
    {
      $ty1=--$ty1;
      $tm1=12;
      $tmi1=convert11($tmi1,2);
    }
    else{
      $tm1--;
      $tmi1=convert11($tmi1,1);
    }
    $thisd1=$ty1."-".$tmi1;
    $thisdate1=date($thisd1);
    $money1=0.0;
    $sql1="SELECT * FROM tran WHERE tran_date LIKE '%$thisdate1%' ORDER BY tran_date ASC";
    $result1=$conn->query($sql1);
    if($result1->num_rows>0)
    {
      while($row1=$result1->fetch_assoc())
      {
      $money1=$money1+$row1['gtotal'];
      }
      ?>
      <input type="hidden" id="<?='monthp1'.$i?>" value="<?=$arr11[$tm1]." ".$ty1?>">
      <input type="hidden" id="<?='moneyp1'.$i?>" value="<?=$money1?>">
      <?php
      $protran[$i]=$money;
    }
    else
    {
      $money1=0.0;?>
      <input type="hidden" id="<?='monthp1'.$i?>" value="<?=$arr11[$tm1]." ".$ty1?>">
      <input type="hidden" id="<?='moneyp1'.$i?>" value="<?=$money1?>">
      <?php
      $protran[$i]=$money;
    }
}
?>
<script>
var  arr3=[],arr4=[];
for(var i=0;i<6;i++)
{
  arr3[i]=document.getElementById('monthp1'+i).value;
  arr4[i]=document.getElementById('moneyp1'+i).value;
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
var ctx2 = document.getElementById("myChart2");
var myLineChart = new Chart(ctx2, {
  type: 'line',
  data: {
    labels: arr3,
    datasets: [{
      label: "Transaction",
      lineTension: 0.3,
      backgroundColor: "rgba(0,255,0, 0.05)",
      borderColor: '#1cc88a',
      pointRadius: 3,
      pointBackgroundColor: "#1cc88a",
      pointBorderColor: "#1cc88a",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "#1cc88a",
      pointHoverBorderColor: "#1cc88a",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: arr4,
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
</script>
