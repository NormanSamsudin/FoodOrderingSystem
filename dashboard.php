<?php
 require_once ("pdo.php");
 require_once("userConfig.php");
 $var1 = new userConfig();

 if($_SESSION['username'] != 'admin'){
  header("Location: index.php");
 }

?>

<!doctype html>
<html lang="en">
  <head>
    <link href="assets/img/flavicon.png" rel="icon">
    <link href="assets/img/flavicon.png" rel="apple-touch-icon">
    <title>dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/Yummy/assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Ayam Geprek Dahsyat</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Log out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#paymentStat">
              <span data-feather="home" class="align-text-bottom"></span>
              Payment status
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#todayOrders">
              <span data-feather="home" class="align-text-bottom"></span>
              Today Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#MenuSales">
              <span data-feather="file" class="align-text-bottom"></span>
              Sales By Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#users">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#popularMenu">
              <span data-feather="users" class="align-text-bottom"></span>
              Popular Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#mealMenu">
              <span data-feather="users" class="align-text-bottom"></span>
              Meal Menu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#beverageMenu">
              <span data-feather="users" class="align-text-bottom"></span>
              Beverage Menu
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

            <!-- ======= payment stat ========== -->
            <h2>Payment status</h2>
      <div class="table-responsive" id="todayOrders">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">order id</th>
              <th scope="col">status</th>
              <th scope="col">update</th>
            </tr>
          </thead>
            <tbody>
              
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT DISTINCT(orders.order_id), orders.status FROM orders 
                  JOIN order_menu_users 
                 on orders.order_id = order_menu_users.order_id
                 WHERE DATE(order_menu_users.date) = CURRENT_DATE()");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo(htmlentities($row['order_id']));
                    echo("</td><td>");
                    echo(htmlentities($row['status']));
                    echo("</td><td>");
                    if ($row['status'] == 'Pending'){
                      $tag = "<a class= 'btn btn-dark' href='updateOrderProcessing.php?order_id=". htmlentities($row['order_id'])  ."' ". ">Update</a> " ;
                    }else{
                      $tag = '<input type="submit" class="btn btn-dark" disabled value="updated">';
                    }
                    echo($tag);
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
                  
            </tbody>
        </table>
      </div>
      
      <!-- ======= customers order section ========== -->
      <h2>Customer's Orders By Today</h2>
      <div class="table-responsive" id="todayOrders">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">order id</th>
              <th scope="col">menu name</th>
              <th scope="col">quantity</th>
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT order_menu_users.order_id, menus.name, order_menu_users.quantity
                  FROM order_menu_users
                  LEFT JOIN menus ON order_menu_users.menu_id = menus.menu_id
                  WHERE DATE(order_menu_users.date) = CURRENT_DATE()
                  ORDER BY order_menu_users.menu_id");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo(htmlentities($row['order_id']));
                    echo("</td><td>");
                    echo(htmlentities($row['name']));
                    echo("</td><td>");
                    echo(htmlentities($row['quantity']));
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
            </tbody>
        </table>
      </div>

            <!-- ======= Total sales today section ========== -->
            <h2>Sales By Menu</h2>
      <div class="table-responsive" id="MenuSales">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Menu id</th>
              <th scope="col">Menu name</th>
              <th scope="col">Sales</th>
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT order_menu_users.menu_id, menus.name, COUNT(order_menu_users.quantity), menus.price FROM `order_menu_users` 
                  LEFT JOIN menus ON order_menu_users.menu_id = menus.menu_id
                  GROUP BY menu_id;");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo( htmlentities($row['menu_id']) );
                    echo("</td><td>");
                    echo( htmlentities($row['name']));
                    echo("</td><td>");
                    echo( htmlentities( $row['COUNT(order_menu_users.quantity)'] * $row['price'] ));
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
            </tbody>
        </table>
      </div>

      <!-- ======= users section ========== -->
      <h2>Users</h2>
      <div class="table-responsive" id="users">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">username</th>
              <th scope="col">password</th>
              <th scope="col">phone</th>
 
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT username, password, phone FROM users");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo( htmlentities($row['username']));
                    echo("</td><td>");
                    echo( htmlentities($row['password']));
                    echo("</td><td>");
                    echo( htmlentities($row['phone']));
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
            </tbody>
        </table>
      </div>
      
      <!--========= menus popular ==========-->
      <h2>Popular Menu</h2>
      <div class="table-responsive" id="popularMenu">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">menu_id</th>
              <th scope="col">name</th>
              <th scope="col">price</th>
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT menus.menu_id, menus.name, menus.price, menu_types.menu_type
                  FROM menus
                  LEFT JOIN menu_types ON menus.menu_id = menu_types.menu_id
                  WHERE menu_types.menu_type = 'popular'
                  ORDER BY menus.menu_id;");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo( htmlentities($row['menu_id']));
                    echo("</td><td>");
                    echo( htmlentities($row['name']));
                    echo("</td><td>");
                    echo( htmlentities($row['price']));
                    echo("</td></tr>\n");
                  
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
          </tbody>
        </table>
      </div>

            <!--========= menus meal ==========-->
            <h2>Meal Menu</h2>
      <div class="table-responsive" id="mealMenu">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">menu_id</th>
              <th scope="col">name</th>
              <th scope="col">price</th>
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT menus.menu_id, menus.name, menus.price, menu_types.menu_type
                  FROM menus
                  LEFT JOIN menu_types ON menus.menu_id = menu_types.menu_id
                  WHERE menu_types.menu_type = 'meal'
                  ORDER BY menus.menu_id;");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo( htmlentities($row['menu_id']));
                    echo("</td><td>");
                    echo( htmlentities($row['name']));
                    echo("</td><td>");
                    echo( htmlentities($row['price']));
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
          </tbody>
        </table>
      </div>

                  <!--========= menus beverage ==========-->
                  <h2>Beverage Menu</h2>
      <div class="table-responsive" id="beverageMenu">
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">menu_id</th>
              <th scope="col">name</th>
              <th scope="col">price</th>
            </tr>
          </thead>
            <tbody>
              <?php
                try{
                  $stmt = $pdo->prepare("SELECT menus.menu_id, menus.name, menus.price, menu_types.menu_type
                  FROM menus
                  LEFT JOIN menu_types ON menus.menu_id = menu_types.menu_id
                  WHERE menu_types.menu_type = 'beverage'
                  ORDER BY menus.menu_id;");
                  $stmt->execute();
                  while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                    echo "<tr><td>";
                    echo( htmlentities($row['menu_id']));
                    echo("</td><td>");
                    echo( htmlentities($row['name']));
                    echo("</td><td>");
                    echo( htmlentities($row['price']));
                    echo("</td></tr>\n");
                  }
                }catch(Exception $e){
                    return $e->getMessage();
                }
                  
                  ?>
          </tbody>
        </table>
      </div>
           
    </main>
  </div>
</div>


    <script src="/Yummy/assets/js/bootstrapdash.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
