<?php
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "book_lawyer_db";

$conn = new mysqli($servername, $username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legion of Law - Lawyer Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="icon.png">
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Unicons CSS -->
 <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script type="text/javascript" src="index1.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/lawyer.css" rel="stylesheet">

  <link rel = "icon" href =  "img/home/icons8-courthouse-48.png" type = "image/x-icon"> 
  <!-- =======================================================
  * Template Name: Gp - v4.9.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script>
    function openPopup() {
      document.getElementById('popupContainer').style.display = 'block';
    }
  
    function closePopup() {
      document.getElementById('popupContainer').style.display = 'none';
    }
  
    function submitForm(event) {
      event.preventDefault();
      const inputValue = document.getElementById('inputField').value;
      alert('Submitted value: ' + inputValue);
      closePopup();
    }
  </script>
<style>
    #popupContainer {
    display: none;
    position: fixed;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 10px;
    border: 1px solid #ffc107;
    box-shadow: 0 0 10px #ffc107;
    background-color: white;
    height: 400px;
    width: 600px;
  }
  #popupContainer::before {
    background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
  }

#popupContainer label {
margin-bottom: 10px;

}

#popupContainer input {
width: 100%;
padding: 8px;
box-sizing: border-box;
position: relative;
margin-bottom: 10px;

}
#popupContainer button {
width: 100%;
padding: 10px;
border: none;

}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">
      
      <h1 class="logo me-auto me-lg-0"><a href="index.html">Legion Of Law<span style="font-size: 11px; font-weight: 600; " ><br>Your Case, Your Choice, Your Victory  </span> </a></h1>
   
      <nav id="navbar" class="navbar order-lg-first order-lg-0">
        <ul>
       
          &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&#160
        
           <div class="dropDown-wrapper">
              <input type="checkbox" id="dropDown-toggle">
              <label for="dropDown-toggle" class="dropDown-toggle-label">Explore</label>
              <div class="dropDown" style="background-color: rgba(0, 0, 0, 0.539);">
       
              <input type="radio" id="option-1" name="options">
              <label for="option-1"><a href="./PROFILE/startbootstrap-resume-gh-pages/profile.html"><div style="color: rgb(255, 255, 255);">Profile</div></a></label>
              <input type="radio" id="option-2" name="options">
              <label for="option-2"><a href="./msg.html" ><div style="color: rgb(255, 255, 255);">Messages </div></a></label>
              <input type="radio" id="option-3" name="options">
              <label for="option-3"><a href="../main.html" ><div style="color: rgb(255, 255, 255);">Log out </div></a></label>
              
            </div>
          </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">
      <br> 
       <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-11 col-lg-8" style="font-size: small;">
            <p style="text-align: center;"><h1 >Law<span>.</span> Connect<span>.</span> Empower<span>.</span></p>  
             </a>
            </h1>
          <div class="col-xl-12  col-lg-6 " style="text-align: center; color: aliceblue;"> <h5>Bridging Legal Expertise.</h5></div>
        <br>
        <div class="input-box">
          <i class="uil uil-search"></i>
          <input type="text" placeholder="Search here..." />
          <button class="button">Search</button>
        </div>
       </div>
</section>

<!-- End Hero -->

  
<main id="main">



<!-- ======= Browse Cases ======= -->
<div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <div class="section-title">
            <h1 class="text-center" style="font-weight: 700;">Browse Cases</h1>
          </div>
        </div>
      </div>

      <?php
function getCasesByCategory($conn, $category) {
  $sql = "SELECT userName, userEmail, userContact, caseCategory, caseTitle, caseDescription FROM book_lawyer_tb WHERE caseCategory = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $category);
  $stmt->execute();

  if ($stmt->error) {
      die("Error: " . $stmt->error);
  }

  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    
      echo '<div class="container mt-5">';
      echo "<h2 class='mb-4'>List of Submitted Cases - $category Lawyer</h2>";

      while ($row = $result->fetch_assoc()) {
          ?>
          <div class="row" data-aos="fade-up">
              <div class="col-md-4">
                  <div class="blog-post">
                      <h2>User: <?php echo isset($row["userName"]) ? $row["userName"] : 'N/A'; ?></h2>
                      <p>Email: <?php echo isset($row["userEmail"]) ? $row["userEmail"] : 'N/A'; ?></p>
                      <p>Contact: <?php echo isset($row["userContact"]) ? $row["userContact"] : 'N/A'; ?></p>
                      <p>Category: <?php echo isset($row["caseCategory"]) ? $row["caseCategory"] : 'N/A'; ?></p>
                      <p>Title: <?php echo isset($row["caseTitle"]) ? $row["caseTitle"] : 'N/A'; ?></p>
                      <p>Description: <?php echo isset($row["caseDescription"]) ? $row["caseDescription"] : 'N/A'; ?></p>
                  </div>
              </div>
          </div>
          <?php
      }

      echo '</div>';
  } else {
      echo "<p>No cases submitted in the '$category' category.</p>";
  }

  $stmt->close();
}

// Test the function with different categories
getCasesByCategory($conn, 'Family');
getCasesByCategory($conn, 'PersonalInjury');
getCasesByCategory($conn, 'CyberSecurity');

$conn->close();
?>

    </div>
  </section>

  <!-- End blog section-->
   

<!-- ======= End About Section ======= -->
<section class="header1" id="header">

  <div id="headerCarousel" class="carousel slide carousel-fade" data-ride="carousel">
<!-- Slide Indicators -->
<ol class="carousel-indicators">
  <li data-target="#headerCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#headerCarousel" data-slide-to="1"></li>
  <li data-target="#headerCarousel" data-slide-to="2"></li>
</ol>

<div class="carousel-inner" role="listbox">
  <!-- Slide 1 -->
  <div class="carousel-item active">
    <div class="carousel-background"><img src="img\home\fam1.jpg" alt=""></div>
    <div class="carousel-container">
      <div class="carousel-content">
        <h2>Family Lawyer </h2><p>Case: Complex International Child Custody Dispute</p>
        <span style="font-size: 17px ; color: aliceblue;">User Perspective</span><br><br>
        <p>
            Situation: In the midst of a divorce with my spouse from a different country, the
            distress is overwhelming as we navigate a complex international child custody dispute.
            The legal systems of multiple jurisdictions are complicating matters, leaving me unsure
            about the future relationship with my child. I urgently need a Family Lawyer who
            understands the nuances of international family law, can guide me through the legal
            complexities, and advocate for the best interests of my child across borders.
         </p>
         <!--popup-->
         <button class="input-box" onclick="openPopup()" style="width: 100px; height: 50px; margin-bottom: 40px;">Comment</button>

  
<div id="popupContainer" > 
  <h3 style="color: #ffc107 "><b>Empower the curiosity</b> </h3>
  <form onsubmit="submitForm(event)">
    
    <label >Your solution on there query</label><br>
    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    <br>
    <input type="submit" value="Submit">
  </form>
  <button onclick="closePopup()">Close</button>
</div>

<!--button-->
      </div>
    </div>
  </div>

  <!-- Slide 2 -->
  <div class="carousel-item" >
    <div class="carousel-background"><img src="img\home\mybg.jpg" alt=""></div>
    <div class="carousel-container">
      <div class="carousel-content">
        
        <h2>Cyber Lawyer </h2><p>Case: Corporate Espionage and Stolen Intellectual Property</p>
        <span style="font-size: 17px ; color: aliceblue;">User Perspective</span><br><br>
        <p>
          Situation: As the CEO of a tech startup, the distress is profound as we uncover a
          sophisticated cyberattack that has led to the theft of our company's most valuable
          intellectual property. This includes proprietary algorithms and innovative designs that
          were the result of years of research and development. The potential implications for our
          competitiveness and future growth are alarming. I urgently need a Cyber Lawyer to assess
          the full extent of the breach, identify the cybercriminals responsible, and take swift
          legal action to protect our intellectual assets.”</p>
       
      </div>
    </div>
  </div>

  <!-- Slide 3 -->
  <div class="carousel-item">
    <div class="carousel-background"><img src="img\home\law12.jpg" alt=""></div>
    <div class="carousel-container">
      <div class="carousel-content">
        <h2>Personal Injury Lawyer </h2><p>Case: Catastrophic Injuries in a Multi-Vehicle
          Collision</p>
        <span style="font-size: 17px ; color: aliceblue;">User Perspective</span><br><br>
        <p>
          
          Situation: A catastrophic multi-vehicle collision has left me with severe injuries,
          including paralysis. The distress is profound as the physical pain is coupled with the
          uncertainty about my future quality of life. The mounting medical expenses and loss of
          income are overwhelming. I urgently need a Personal Injury Lawyer to not only assess the
          details of the accident but also collaborate with medical experts to understand the
          long-term impact of my injuries. The legal strategy should encompass immediate medical
          expenses, ongoing rehabilitation, and compensation for the loss of future earnings.
        </p>
       
      </div>
    </div>
  </div>
</div>

<!-- Carousel pre and next arrow -->
<a class="carousel-control-prev" href="#headerCarousel" role="button" data-slide="prev">
  <i class="fas fa-arrow-circle-left"></i>
</a>

<a class="carousel-control-next" href="#headerCarousel" role="button" data-slide="next">
  <i class="fas fa-arrow-circle-right"></i>
</a>
</div>
<!-- End header -->
</section>
  
  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  

</body>

</html>