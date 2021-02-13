<!DOCTYPE html>
<html lang="en">


<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <?php include "css.php"; ?>
  <style>
       
        body {background:url("images/1.jpg") ; }
        </style>
</head>

<body>

  <?php

  include "dbconn.php";
  include "navbar.php";

  if (isset($_GET['startingDate'])) {
    $startingDate = $_GET['startingDate'];
  } else {
    $startingDate = date("Y-m-d", mktime(0, 0, 0, date("m") - 1, 1));

  }

  if (isset($_GET['endingDate'])) {
    $endingDate = $_GET['endingDate'];
  } else {
    $endingDate = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));
  }


  $query = "SELECT SUM(duePrice) FROM dues WHERE paymentStatus = 'paid' AND postDate BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(duePrice)'] > 0){
    $income = $row['SUM(duePrice)'];
  }else{
    $income=0;
  }
  

  $query = "SELECT SUM(duePrice) FROM dues WHERE paymentStatus = 'not paid' AND postDate BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(duePrice)'] > 0){
    $unpaiddues = $row['SUM(duePrice)'];
  }else{
    $unpaiddues=0;
  }
  


  $query = "SELECT SUM(expensePrice) FROM expense WHERE expenseDate BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(expensePrice)'] > 0){
    $expense = $row['SUM(expensePrice)'];
  }else{
    $expense=0;
  }
  
echo'



<div id="chartContainer" style="height: 170px; width: 40% ; margin:auto; margin-top:30px; margin-bottom:10px;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>


window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    title:{
        text: "Seçilen Aralıktaki Gösterim"
    },
    axisY: {
        title: "Toplam Para(TL)",
        titleFontColor: "#4F81BC",
        lineColor: "#4F81BC",
        labelFontColor: "#4F81BC",
        tickColor: "#4F81BC"
    },
    toolTip: {
        shared: true
    },
    legend: {
        cursor:"pointer",
        itemclick: toggleDataSeries
    },
    data: [{
        type: "column",
        name: "Total bekleyen",
        legendText: "Total bekleyen",
        showInLegend: true, 
        dataPoints:[
            { label: "-", y:  '. json_encode($unpaiddues,  JSON_NUMERIC_CHECK) .' },
        ]
    },
    {
        type: "column",
        name: "Total expense",
        legendText: "Total expense",
        
        showInLegend: true,
        dataPoints:[

            { label: "-", y:' . json_encode($expense,  JSON_NUMERIC_CHECK) . '  },

        ]
    },
          {
        type: "column",
        name: "Total income",
        legendText: "Total income",
        
        showInLegend: true,
        dataPoints:[

            { label: "-", y:' . json_encode($income,  JSON_NUMERIC_CHECK) . '  },

        ]
    }]
});
chart.render();

function toggleDataSeries(e) {
    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
        e.dataSeries.visible = false;
    }
    else {
        e.dataSeries.visible = true;
    }
    chart.render();
}

}
</script> '
  
  
  


  ?>

  <div class="container col-md-10">
    

    <div class="row justify-content-center">
      <form class="form-inline py-3 bg-dark" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="form-group mx-2">
          <label for="startingDate"> <p style="background-color:white; "></p> </label>
          <input class="form-control mx-2" type="date" name="startingDate" id="startingDate" value="<?php echo $startingDate; ?>">
        </div>

        <div class="form-group mx-2">
          <label for="endingDate"> </label>
          <input class="form-control mx-2" type="date" name="endingDate" id="endingDate" value="<?php echo $endingDate ?>">
        </div>

        <div class="form-group mx-2">
          <input class="btn btn-primary" type="submit" value=Show>
        </div>

      </form>

    </div>

    <div class="container col-md-8 my-3">
      <div class="col-md-12">
        <div class="accordion mb-5">

          <div class="card">
            <div class="card-header bg-dark">
              <a id="card-link" data-toggle="collapse" href="#general">
              <b>Apartment General Status in the Selected Range </b>
              </a>
            </div>

            <div class="collapse show" id="general">
              <div class="card-body">

                <table class="table table-hover table-striped">
                  <thead class="thead-light">
                    <tr>

                      <th>Total Expense</th>
                      <th>Total Income</th>
                      <th>Total Ödenmeyen</th>
                    

                  </thead>

                  
                    <tr>

                      <td> <?php echo $expense ?> </td>
                      <td> <?php echo $income  ?> </td>
                      <td> <?php echo $unpaiddues ?> </td>
                    

                    </tr>

                  

                </table>

              </div>
            </div>
          </div>

    <div class="row">
      <div class="col-md-12">
        <div class="accordion mb-5">

          <div class="card">
            <div class="card-header bg-dark">
              <a id="card-link" data-toggle="collapse" href="#expenseReport">
              <b> Apartment Expense Details in the Selected Range </b>
              </a>
            </div>

            <div class="collapse" id="expenseReport">
              <div class="card-body">

                <table class="table table-hover table-striped">
                  <thead class="thead-light">
                    <tr>

                      <th>Expense Type</th>
                      <th>Expense Detail</th>
                      <th>Expense Date</th>
                      <th>Expense Price</th>

                  </thead>

                  <?php

                  $query = "SELECT * FROM expense WHERE expenseDate BETWEEN '$startingDate' AND '$endingDate'";
                  $result = mysqli_query($conn, $query);
                  while ($expense = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td> <?php echo $expense["expenseType"]; ?> </td>
                      <td> <?php echo $expense["expenseDetail"]; ?> </td>
                      <td> <?php echo $expense["expenseDate"]; ?> </td>
                      <td> <?php echo $expense["expensePrice"]; ?> </td>

                    </tr>

                  <?php } ?>

                </table>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-dark">
              <a id="card-link" data-toggle="collapse" href="#lifetime">
                <b> All Expense Details </b>
              </a>
            </div>

            <div class="collapse" id="lifetime">
              <div class="card-body">

                <table class="table table-hover table-striped">
                  <thead class="thead-light">
                    <tr>

                      <th>Expense Type</th>
                      <th>Expense Detail</th>
                      <th>Expense Date</th>
                      <th>Expense Price</th>

                  </thead>

                  <?php

                  $query = "SELECT * FROM expense ORDER BY expenseDate DESC";
                  $result = mysqli_query($conn, $query);
                  while ($expense = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td> <?php echo $expense["expenseType"]; ?> </td>
                      <td> <?php echo $expense["expenseDetail"]; ?></td>
                      <td> <?php echo $expense["expenseDate"]; ?> </td>
                      <td> <?php echo $expense["expensePrice"]; ?> </td>

                    </tr>

                  <?php } ?>

                </table>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</body>

</html>