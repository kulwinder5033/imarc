<?php
// Start the session
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Assignment: PHP Developer – Automatic Sequence Correction & Visualization</title>
  </head>
  <body>
    <div class="container" style="margin-bottom: 50px;">
        <h4 class="mt-5">Assignment: PHP Developer – Automatic Sequence Correction & Visualization</h4>
        <div class="card" style="margin-bottom: 30px;">
            <div class="card-header">
                <h5 class="card-title">Corrected Sequence</h5>
                <button class="btn btn-primary" style="position:absolute; top:13px; right:14px;" id="download-csv">Back</button>
            <div class="card-body">
                <?php
                    if (isset($_SESSION['success'])) {
                        echo "<p class='card-text'>";
                        foreach ($_SESSION['success'] as $key => $value) {
                            echo $value . "<br>";
                        }
                        echo "</p>";
                    } else {
                        echo "<h5 class='card-title'>No sequence provided</h5>";
                    }
                ?>
            </div>
        </div>
        <div style="margin-top: 30px;">
            <h5 class="card-title">Graphical Representation</h5>
            <canvas id="myChart"></canvas>
        </div>
       
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </body>
</html>
<script>
    $(document).ready(function(){
        $('#download-csv').on('click', function(){
           window.location.href = 'index.php';
        });
        let data = [];
        const data_show  = '<?php echo json_encode($_SESSION['success']) ?>';
        data = JSON.parse(data_show);
        let custom_value = 0;
          console.log(data);
        data = data.map((item, index) => {
             custom_value = item.replaceAll('.','');
             console.log(custom_value);

             item = item.split('.');
            //  console.log(Math.pow(10, item.length-1));
             custom_value /= (Math.pow(10, item.length-1));
             return custom_value;

        })
        console.log(data);
        const ctx = document.getElementById('myChart');
         new Chart(ctx, {
            type: 'bar',
            data: {
            labels: data,
            datasets: [{
                label: 'Squences',
                data: data,
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    });
</script>
    
