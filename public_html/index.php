<?php
session_start();

$root = $_SERVER["DOCUMENT_ROOT"] . '/';
$pageTitle = "Home";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $message = "";
  $className = "green";

  if (isset($_POST["email"])) {

    require_once $_SERVER["DOCUMENT_ROOT"] . '/../connection.php';

    if ($conn) {

      $email = $_POST["email"];
      $query = $conn->query("SELECT * FROM mailing_list WHERE email = \"{$email}\";");
      $emailAlreadyExsists = !!$query->fetchAll(PDO::FETCH_ASSOC);

      if ($emailAlreadyExsists) {
        $message =  "You have already subscribed.";
      } else {
        $conn->query("INSERT INTO mailing_list (email) VALUES (\"{$email}\");");
        $message = "Thank for subscribing :)";
      }

    } else {
      $className = "red";
      $message = "Error. Try again later.";
    }

  }

  echo "<p class=\"message u-text-center padding {$className} white-text\">{$message}</p>";

}

include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/header.php';

 ?>
    <div class="page-header page-header white padding-vertical x2 black-text">
      <div class="container">
        <h1 class="big-title white-text margin-none">MCTV</h1>
        <p class="white-text">Ireland's leading media distributor</p>
      </div>
    </div>

    <div class="black--light white-text">
      <div class="container padding-vertical x3">
        <div class="grid">
          <div class="u-text-center grid__col grid__col--4-of-12">
            <h2 class="">Televisons</h2>
            <p class="h3">We have a wide range of premium and modern televisions</p>
            <a class="btn-primary" href="/products.php?type=tv">Explore</a>
          </div>
          <div class="u-text-center grid__col grid__col--4-of-12">
            <h2 class="u-text-center">Media Players</h2>
            <p>Experience your favourite media with our extensive range of media players</p>
            <a class="btn-primary" href="/products.php?type=media_player">Explore</a>
          </div>
          <div class="u-text-center grid__col grid__col--4-of-12">
            <h2 class="u-text-center">Accessories</h2>
            <p>Enhance your viewing experince with our diverse range of televison accessories.</p>
            <a class="btn-primary" href="/products.php?type=accessory">Explore</a>
          </div>
        </div>
      </div>
    </div>

    <div class="feature padding-vertical x3 white">
      <div class="container">
        <div class="grid">
          <div class="u-text-center grid__col grid__col--6-of-12">
            <img src="http://www.did.ie/media/catalog/product/cache/1/small_image/500x/9df78eab33525d08d6e5fb8d27136e95/u/e/ue43ku6500_samsung_43inch_1.jpg" alt="">
          </div>
          <div class="grid__col grid__col--5-of-12 grid__col--push-1-of-12">
            <br><br><br><br>
            <h1 class="black-text">Samsung 43" Curved Smart UHD LED TV</h1>
            <p>Take 4K UHD picture resolution to the next stage, with the stunning HDR-equipped Samsung curved smart TV.</p>
            <a href="/prodouct.php?id=1" class="btn-primary">Find out More</a>
          </div>
        </div>
      </div>
    </div>

    <div class="feature padding-vertical x3 white">
      <div class="container">
        <div class="grid">
          <div class="grid__col grid__col--6-of-12">
            <br><br><br><br>
            <h1 class="black-text">Samsung 49" Curved Smart UHD LED TV</h1>
            <p>Take 4K UHD picture resolution to the next stage, with the stunning HDR-equipped Samsung curved smart TV.</p>
            <a href="#" class="btn-primary">Find out More</a>
          </div>
          <div class="u-text-center grid__col grid__col--5-of-12 grid__col--push-1-of-12">
            <img src="/img/tvs/tv-large1.jpg" alt="">
          </div>
        </div>
      </div>
      <br><br>
    </div>

    <div class="newsletter lightgray white-text padding-vertical x4">
      <div class="container">
        <form class="subscribe" action="/index.php" method="POST">
          <h2 class="u-text-center black-text h1">Subscribe to our Newsletter</h2>
          <p class="black-text u-text-center">To find out about the latest offers and deals signup to our newseltter</p>
          <input required placeholder="Email" class="input" type="email" name="email" value="">
          <input type="submit" class="btn" name="" value="Submit">
          <br><br><br><br><br><br>
        </form>
      </div>
    </div>
<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/../inc/footer.php';
