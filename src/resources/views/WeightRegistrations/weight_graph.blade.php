<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>グラフ</title>
</head>
<body>
		<h1 >グラフ</h1>
		<button onclick="history.back()">戻る</button>

    <canvas id="myChart"></canvas>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>

	<!-- グラフを描画 -->
  <script>
    //ラベル
  var labels = @json($label);

  //最大体重ログ
  var $weight_log = @json($weight_log);

  //グラフを描画
  var ctx = document.getElementById("myChart");
  var myChart = new Chart(ctx, {
		type: 'line',
		data : {
			labels: labels, //var labels を指定
			datasets: [
				{
					label: '体重',
					data: $weight_log,
					borderColor: "rgba(0,255,0,1)",
          backgroundColor: "rgba(0,0,0,0)"
				}
			]
		},
		options: {
			title: {
				display: true,
				text: '~さんの体重ログ（６ヶ月平均）'
			}
		}
  });
  </script>
  <!-- グラフを描画ここまで -->

  </body>
</html>