<!doctype html>
<?php
//Step1
 $db = mysqli_connect('3.16.5.73:3306','root','ChensMyFriend1!','TourneyDB')
 or die('Error connecting to MySQL server.');
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Local CSS -->
    <link rel="stylesheet" href="styles/index.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>SSB Tournament</title>
  </head>
  <body>


     <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
      <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      SSB Tournament
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
          <a class="nav-link" href="/leadboard">Leadboard</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/events">Events</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
      </li>
    </ul>
    </div>
    </nav>
     <!-- End of navbar -->
<?php
//Step2
$query = "SELECT * FROM event";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

while ($row = mysqli_fetch_array($result)) {
 echo $row['event_name'] . ' ' . $row['event_start_time'] .'<br />';
}
?>

     <!-- Page Content -->
     <div class="content"> 
      <br /><br /><br />

      <!-- Leadboard -->
      <table class="table">
          <h2>Leadboard</h2>
        <thead>
          <tr>
            <th scope="col">Player</th>
            <th scope="col">Region</th>
            <th scope="col">Rank</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Tim</th>
            <td>US-South</td>
            <td>1</td>
          </tr>
          <tr>
              <th scope="row">Mike</th>
              <td>US-East</td>
              <td>2</td>
          </tr>
          <tr>
              <th scope="row">Mark</th>
              <td>Us-South</td>
              <td>3</td>
          </tr>
        </tbody>
      </table>
      <!-- End of Leadboard -->


      <!-- Tournments-->
      <br />
      <table class="table">
          <h2>Tournaments</h2>
        <thead>
          <tr>
            <th scope="col">Event</th>
            <th scope="col">Location</th>
            <th scope="col">Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">The Comeback</th>
            <td>McAllen, TX</td>
            <td>5:00PM</td>
          </tr>
          <tr>
            <th scope="row">Smash Extravaganza</th>
            <td>Harlingen, TX</td>
            <td>4:00PM</td>
          </tr>
          <tr>
            <th scope="row">Super Smash UTRGV</th>
            <td>Edinburg, TX</td>
            <td>5:00PM</td>
          </tr>
        </tbody>
      </table>
      <!-- End of Leadboard -->

      </div>
    <!-- End of page content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>