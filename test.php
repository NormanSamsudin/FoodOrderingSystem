<html>
<head>
</head>
<body>
<!-- offcanvas for cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

      <label>OrderID: </label>
        <?php echo '1111'; ?><br>
      <label>Username: </label>
        <?php echo 'Undertaker'; ?><br>
      <label>Table No: </label>
        <?php echo '19'; ?><br><br>
      <label>Item </label><br>

      <?php
      $list = array();

      $myfile = fopen("order.txt", "r") or die("Unable to open file!");
      // Output one line until end-of-file
      while(!feof($myfile)) {
        array_push($list, fgets($myfile));
      }
      fclose($myfile);

      $size = count($list) - 1;

      echo '<div class="row">';
      for($i=0; $i<$size; $i++) {
        echo '<div class="col-md-4">';
        echo $list[$i];
        echo '</div>';
      }
      echo '</div>';

      ?>
</body>
</html>
