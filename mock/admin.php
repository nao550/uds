<!DOCTYPE html>
<html lang="ja">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>{$page_title}</title>

   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

   <!-- Optional theme -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="./css/base.css" />
   <script src="./js/common.js"></script>
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="header">
            <div class="pagetitle"><h1>理解度調査アンケート結果</h1></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="resultpage">
            <div class="btnmenu">
              <button class="btn btn-default gakububtn">全学部</button>
              <button class="btn btn-default gakububtn">学部1</button>
              <button class="btn btn-default gakububtn">学部2</button>
              <button class="btn btn-default gakububtn">学部3</button><br />
              <button class="btn btn-default gakububtn">学部4</button>
              <button class="btn btn-default gakububtn">学部5</button>
              <button class="btn btn-default gakububtn">学部6</button>
              <button class="btn btn-default gakububtn">学部7</button><br />
              <button class="btn btn-default gakububtn">学部8</button>
              <button class="btn btn-default gakububtn">学部9</button>
              <button class="btn btn-default gakububtn">学部10</button>
              <button class="btn btn-default gakububtn">学部11</button>
            </div>
            <div class="row">
              <div class="col-md-12">
                <form class="form-inline" action="#">
                  <div class="form-group">
                    <select class="form-control">
                      <option>全ての受講者</option>
                      <option>情報倫理合格者</option>
                      <option>情報倫理不合格者</option>
                      <option>未解答者</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-default">CSVデータダウンロード</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="row resgraph">
              <div class="col-md-6">
                <canvas id="raderChart" width="200" height="200"></canvas>

              </div>
              <div class="col-md-6">
                <canvas id="barChart" width="200" height="200"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script>
     var ctx = document.getElementById("raderChart");
     var myChart = new Chart(ctx, {
         type: 'radar',
         data: {
             labels: ["情報倫理", "コンピュータ基本操作", "ワープロソフト", "表計算ソフト", "インターネットの利用"],
             datasets: [{
                 label: '成績',
                 data: [87, 95, 81, 72, 91],
                 "fill":true,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.9)',
                 ],
                 borderColor: [
                     'rgba(255,99,132,1)',
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             scaleShowLine: false,
             scaleLineWidth: 1,
             scaleOverride: true,
             scaleSteps: 5,
             scaleStepWidth: 20,
             scaleStartValue: 0,
         }
     });
     var barctx = document.getElementById("barChart");
     var barChart = new Chart( barctx, {
         type: 'bar',
         data: {
             labels: ["合格", "不合格"],
             datasets: [{
                 label: '情報倫理合格者',
                 data: [83, 21],
                 backgroundColor: [
                     'rgba(255, 206, 86, 0.9)',
                     'rgba(75, 192, 192, 0.9)',
                 ],
                 borderColor: [
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                 ],
                 borderWidth: 1
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
   </script>

  </body>
</html>
