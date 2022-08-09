<!DOCTYPE html>
<html lang="en">

<head>
  <title>Marriot Hotel</title>
  <link rel="shortcut icon" type="image/png" href="img/mlogo1.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="admin/css/main_page.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-sm bg-light navbar-light content-center fixed-top" style="height : 100px">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="img/mlogo2.png" style="width: 20%"></a>
      <ul class="navbar-nav" style="font-size: 20px">
        <li class="nav-item">
          <a class="nav-link" href="index.php" style="padding-right: 35px">Home</a>
        </li>
        <?php if (isset($_SESSION["USERNAME"])) : ?>
          <li class="nav-item">
            <a class="nav-link" href="formGuestHistory.php">History</a>
          </li>
        <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php endif ?>
      </ul>
    </div>

  </nav>

  <header class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        </div>
      </div>
    </div>
  </header>

  <div class="container">

    <div class="row">
      <div class="col-sm-8" style="margin-right: 50px">
        <h2 class="mt-4">About Us</h2>
        <p style="text-align: justify">The hotel offers well-appointed guest rooms and suites,
          each room are remarkably spacious, complete with premium amenities that are essential to
          both business and leisure travelers. All the facilities and services at The Trans Luxury Hotel
          have been designed to set the property in a class of its own. The panoramic restaurant and
          lounge on level 18 with sweeping views of the city, the open-air sandy beach pool with sun
          lounges, the elegant day spa, the high tech fitness centre, the luxurious room amenities,
          all ensure the most memorable stay for an extraordinary escape or an impeccable run event
          at Bandung's most iconic luxury hotel.</p>
        <p>
          <a class="btn btn-danger btn-lg" href="formInsertGuest.php">Book Now</a>
        </p>
      </div>

      <div class="col-sm-3">
        <h2 class="mt-4">Contact Us</h2>
        <address>
          <strong>Marriot Hotel</strong>
          <br>aminasaeed@gmail.com
        </address>
      </div>

    </div>

    <br><br>

    <?php
    include 'helper/connection.php';

    $sql = "select room_name, picture from tb_room where room_code = 'R001'";

    $query = oci_parse($con, $sql);
    $r1 = oci_execute($query);

    if ($row = oci_fetch_array($query)) {
      $image = $row["PICTURE"];
      $room = $row["ROOM_NAME"];

    ?>
      <div style="text-align: center">
        <h3>Explore Our Rooms</h3>
      </div>
      <div class="row">
        <div class="col-sm-4 my-4 float-right">
          <div class="card">
            <?php
            echo "<img class='card-img-top float-right' src='img/" . $image . "'>"
            ?>
            <div class="card-body">
              <h4 class="card-title"><?php echo $room ?></h4>
              <p class="card-text" style="text-align: justify">A modern room with luxury touch
                in every corner. Our Premier Room offers the most exclusive room and bathroom design
                with separated standing high pressure rain shower cabin and bath tub. This room also
                equipped with a 46’ LED interactive high definition television with more than 60 channels,
                I-Home docking station, electric power curtain, and to ensure your comfort, we also provide
                exclusively customized luxury linen with Egyptian cotton bed sheet, duvet, pillows,
                all stuffed with down feathers which were selected only from the gooses’ neck to get
                you through the night.</p>
            </div>
            <div class="card-footer text-center">
              <a href="login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
      <?php
    }
      ?>
      <?php

      $sql = "select room_name, picture from tb_room where room_code = 'R002'";
      $query = oci_parse($con, $sql);
      $r1 = oci_execute($query);

      if ($row = oci_fetch_array($query)) {
        $image = $row["PICTURE"];
        $room = $row["ROOM_NAME"];
      ?>
        <div class="col-sm-4 my-4 float-right">
          <div class="card">
            <?php
            echo "
            <img class='card-img-top float-right' src='img/" . $image . "'>
            "
            ?>
            <div class="card-body">
              <h4 class="card-title"><?php echo $room ?></h4>
              <p class="card-text" style="text-align: justify">An elegant and luxurious suite with
                separate bedroom, spacious living room and dining area, Celebrity Suite is ideal for
                you who desire extra space. Not only you will have the access to experience our Private
                Reception services and access to The Club Lounge, this 95sqm room will surely escalate
                your stay with all the luxury things that you need including a 24 hours personal butler service.</p>
            </div>
            <div class="card-footer text-center">
              <a href="login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
      <?php

      $sql = "select room_name, picture from tb_room where room_code = 'R003'";
      $query = oci_parse($con, $sql);
      $r1 = oci_execute($query);
      if ($row = oci_fetch_array($query)) {
        $image = $row["PICTURE"];
        $room = $row["ROOM_NAME"];
      ?>
        <div class="col-sm-4 my-4 float-right">
          <div class="card">
            <?php
            echo "
        <img class='card-img-top float-right' src='img/" . $image . "'>
        "
            ?>
            <div class="card-body">
              <h4 class="card-title"><?php echo $room ?></h4>
              <p class="card-text" style="text-align: justify">Inspired by the perfection of the
                real luxury experience, the Presidential Suite is a perfect choice for you who always
                have the winner of its class. This 200sqm room will certainly complete your definition
                of luxury. Completed with a separate bedroom and expansive working area, luxurious
                marble bathroom with private Jacuzzi and shower, spacious living room and dining room
                with well-equipped pantry, yes, a truly unparalleled luxury!</p>
            </div>
            <div class="card-footer text-center">
              <a href="login.php" class="btn btn-primary">Book Now</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

      </div>
  </div>

</body>

</html>