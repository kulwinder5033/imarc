<?php
// Start the session
session_start();
if (!isset($_SESSION['input_data'])) {
    $_SESSION['input_data'] = '1.1
1.2
1.3.1
1.3.1.1
1.3.1.3
1.3.2
1.3.2.1
1.3.2.2
2.1
2.2
2.3.1
2.3.2
2.3.3';
}

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
    <div class="container">
        <h4 class="mt-5">Assignment: PHP Developer – Automatic Sequence Correction & Visualization</h4>
        <form action="submit.php" method="post">
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Please Provide Input</label>
            <textarea class="form-control" id="text-area" rows="12" name="sequence"><?php echo $_SESSION['input_data']; ?></textarea>
         <span class="text-danger">
            <?php
                if (isset($_SESSION['success'])) {
                    unset($_SESSION['success']);
                }
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
            ?>
         
        </div>
        <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" id="reset">Reset</button>
              </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
<script>
     $(document).ready(function(){
        $('#reset').click(function(){
           $('#text-area').val('');
        });
      });
</script>