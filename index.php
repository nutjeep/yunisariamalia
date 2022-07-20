<?php
require 'connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1f3b13c969.js" crossorigin="anonymous"></script>

    <!-- Local CSS -->
    <link rel="stylesheet" href="css/main.css?version=<?php echo filemtime('css/main.css'); ?>">

    <?php
      $list = "SELECT * FROM `tb_setting`"; 
      $list = mysqli_query($conn, $list);
      while($data = mysqli_fetch_array($list)){
    ?>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
    <title><?= $data['website_title']; ?></title>
    <?php } ?>
  </head>
  <body>

    <!-- Navigation Bar -->
    <nav class="nav fixed-top" id="nav">
      <div class="nav-logo">
        <img src="img/logo-nav.png" alt="nav-logo">
      </div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#publication">Publication</a></li>
        <li><a href="#awards">Award</a></li>
        <li><a href="admin/login.php"><i class="bi bi-person" style="font-size: 1.2rem;"></i></a></li>
      </ul>
  
     <div class="toggle-menu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero container d-flex" id="hero">
      <?php
        $list = "SELECT * FROM `tb_setting`"; 
        $list = mysqli_query($conn, $list);
        while($data = mysqli_fetch_array($list)){
      ?>
      <div class="col col-left col-lg-8">
        <div class="website-title" data-aos="fade-right">
          <h1><?= $data['website_name']; ?></h1>
          <h4><?= $data['description']; ?></h4>
        </div>
      </div>
      <div class="col col-right col-lg-4">
        <div class="website-img" data-aos="fade-left">
          <img src="img/profile.png" alt="profile photo">
        </div>
      </div>
      <?php } ?>
    </header>


    <!-- About Section -->
    <div class="section about container" id="about">
      <div id="title">
        <h2></h2>
      </div>
        <?php
          $list = "SELECT * FROM `tb_about_desc`"; 
          $list = mysqli_query($conn, $list);
          while($data = mysqli_fetch_array($list)){
        ?>
      <div class="row row-description" data-aos="zoom-in">
        <p><?= $data['about_me']; ?></p>
      </div>
      <?php } ?>


      <div class="row">
        <div class="col-sm-12 col-lg-8">
          <div class="accordion" data-aos="fade-right">
            <div class="subtitle">
              <h4></h4> <!-- work experience -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_about` INNER JOIN `tb_ctgy_about` ON `tb_about`.category = `tb_ctgy_about`.`category` WHERE `tb_ctgy_about`.`category_name` = 'Work Experience' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="work-experience"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['description']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="accordion" data-aos="fade-left">
            <div class="subtitle">
              <h4></h4> <!-- Social and Organization -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_about` INNER JOIN `tb_ctgy_about` ON `tb_about`.category = `tb_ctgy_about`.`category` WHERE `tb_ctgy_about`.`category_name` = 'Social and Organization' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="work-experience"><h5><?= $data['title']; ?></h5></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="accordion"  data-aos="fade-right">
            <div class="subtitle">
              <h4></h4> <!-- education -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_about` INNER JOIN `tb_ctgy_about` ON `tb_about`.category = `tb_ctgy_about`.`category` WHERE `tb_ctgy_about`.`category_name` = 'Education' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><h5><?= $data['title']; ?></h5></div>
                <div class="study-program"><p><?= $data['description']; ?></p></div>
                <div class="campus"><p><?= $data['year']; ?></p></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Experience Section -->
    <div class="section experience container" id="experience">
      <div id="title">
        <h2></h2>
      </div>
      <div class="row">
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-down">
            <div class="subtitle"> 
              <h4></h4> <!-- Research-->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Research' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['description']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-down">
            <div class="subtitle">
              <h4></h4> <!-- Roles in project-->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Roles in project' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['description']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-down">
            <div class="subtitle">
              <h4></h4> <!-- Invited Speaker-->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Invited Speaker' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Reviewer experience -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Reviewer experience' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year'] ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Presentation -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Presentation' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year'] ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['description']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 ">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Paper presented in converence and event -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category` WHERE `tb_ctgy_experience`.`category_name` = 'Paper presented in converence and event' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="year"><?= $data['year']; ?></div>
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['description']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Publication Section -->
    <div class="section publication container" id="publication">
      <div id="title">
        <h2></h2> 
      </div>
      <div class="row">
        <div class="col-sm-12 col-lg-6">
          <div class="accordion" data-aos="fade-right">
            <div class="subtitle">
              <h4></h4> <!-- Written book & book chapter -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_publication` INNER JOIN `tb_ctgy_publication` ON `tb_publication`.category = `tb_ctgy_publication`.`category` WHERE `tb_ctgy_publication`.`category_name` = 'Written book & book chapter' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['year']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-6">
          <div class="accordion" data-aos="fade-left">
            <div class="subtitle">
              <h4></h4> <!-- Scientific articles -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_publication` INNER JOIN `tb_ctgy_publication` ON `tb_publication`.category = `tb_ctgy_publication`.`category` WHERE `tb_ctgy_publication`.`category_name` = 'Scientific articles' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="placement"><?= $data['year']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Award Section -->
    <div class="section award container" id="awards">
      <div id="title">
        <h2></h2>
      </div>
      <div class="row">
        <div class="col-sm-12 col-lg-4">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Scholarships -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_awards` INNER JOIN `tb_ctgy_awards` ON `tb_awards`.category = `tb_ctgy_awards`.`category` WHERE `tb_ctgy_awards`.`category_name` = 'Scholarships' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="year"><?= $data['year']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Honors -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_awards` INNER JOIN `tb_ctgy_awards` ON `tb_awards`.category = `tb_ctgy_awards`.`category` WHERE `tb_ctgy_awards`.`category_name` = 'Honors' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="year"><?= $data['year']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="accordion" data-aos="fade-up">
            <div class="subtitle">
              <h4></h4> <!-- Awards -->
            </div>
            <div class="content">
              <?php
                $list = "SELECT * FROM `tb_awards` INNER JOIN `tb_ctgy_awards` ON `tb_awards`.category = `tb_ctgy_awards`.`category` WHERE `tb_ctgy_awards`.`category_name` = 'Awards' ORDER BY `id` DESC"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
              ?>
              <div class="description">
                <div class="event-name"><h5><?= $data['title']; ?></h5></div>
                <div class="year"><?= $data['year']; ?></div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer" id="footer">
      <div class="logo">
        <a href="#"><img src="img/logo-footer.png" alt=""></a>
      </div>
      <div class="social-media">
        <div class="icon"><a href=""><i class="bi bi-linkedin"></i></a></div>
        <div class="icon"><a href=""><i class="bi bi-envelope"></i></a></div>
        <div class="icon"><a href=""><i class="bi bi-instagram"></i></a></i></div>
        <div class="icon"><a href=""><i class="bi bi-facebook"></i></a></i></div>
      </div>
      <div class="copyright">
        <p>Created with <i class="far fa-heart"></i> by M Najib 'Abdulloh</p>
      </div>
    </footer>


    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Animation on Scroll -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
        duration: 1000
      });
    </script>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Local JS -->
    <script src="script.js?version=<?php echo filemtime('script.js'); ?>"></script>

  </body>
</html>