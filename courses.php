<?php

session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to the error page
    header("Location: error-403.php");
    exit;
}

?>

<?php include "inc/head.php"; ?>

  <!-- ***** Preloader Start ***** -->
<?php include "inc/preloader.php"; ?>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <?php include "inc/header2.php"; ?>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-banner">
            <div class="item item-1">
              <div class="header-text">
                <span class="category">Best Result</span>
                <h2>With Helpmanscs, Everything Is Easier</h2>
                <p>With our programs, from beginner-friendly introductions to advanced specialties, we've curated a pathway to success in the tech arena</p>
                <div class="buttons">
                  <div class="main-button">
                    <a href="www.helpmanscs.com">visit our site</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item item-2">
              <div class="header-text">
                <span class="category">OUR COURSES</span>
                <h2>Get the best result out of your effort</h2>
                <p>Tech Proficiency Made Easy: Discover Our Featured ICT</p>
                  <div class="buttons">
                      <div class="main-button">
                          <a href="www.helpmanscs.com">visit our site</a>
                      </div>
                  </div>
              </div>
            </div>
            <div class="item item-3">
              <div class="header-text">
                <span class="category">Online Learning</span>
                <h2>Online Learning helps you save the time</h2>
                <p>We offer a wide range of services to cater to the needs of individuals, businesses, and organizations</p>
                  <div class="buttons">
                      <div class="main-button">
                          <a href="www.helpmanscs.com/">visit our site</a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section courses" id="courses" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="section-heading">
            <h6>Courses</h6>
            <h2>Sign Attendance</h2>
          </div>
        </div>
      </div>
        <div class="col-lg-12 text-center mb-3">
        <p class="text-danger fw-bold border-bottom border-dark ">Only Press button if present for todays class</p>
        </div>
      <div class="row event_box">
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-01.jpg" alt=""></a>
              <span class="category">Web Design</span>
            </div>
            <div class="down-content">
              <span class="author">Lanre</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Web Design</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6  development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-02.jpg" alt=""></a>
              <span class="category">Development</span>
            </div>
            <div class="down-content">
              <span class="author">Mr. T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Web Development</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 graphics">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-03.jpg" alt=""></a>
              <span class="category">Graphics</span>
            </div>
            <div class="down-content">
              <span class="author">Femi</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Graphics Design</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-04.jpg" alt=""></a>
              <span class="category">Web Design</span>
            </div>
            <div class="down-content">
              <span class="author">lanre</span>
              <div class="d-flex attend">
                <h4 class="my-auto">UI/UX</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 data">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-05.jpg" alt=""></a>
              <span class="category">Data</span>
            </div>
            <div class="down-content">
              <span class="author">Mr T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Data Analytics</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-06.jpg" alt=""></a>
              <span class="category">Development</span>
            </div>
            <div class="down-content">
              <span class="author">Mr T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">PHP</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 cyber">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-06.jpg" alt=""></a>
              <span class="category">Cyber Security</span>
            </div>
            <div class="down-content">
              <span class="author">Mr T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Hacking</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 cyber">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-06.jpg" alt=""></a>
              <span class="category">Database Admin</span>
            </div>
            <div class="down-content">
              <span class="author">Mr T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">SQL</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 cyber">
          <div class="events_item">
            <div class="thumb">
              <a href="#"><img src="assets/images/course-06.jpg" alt=""></a>
              <span class="category">Power User</span>
            </div>
            <div class="down-content">
              <span class="author">Mr T</span>
              <div class="d-flex attend">
                <h4 class="my-auto">Formarting of Documents</h4>
              <button class="btn attend-button">Present</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="section fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="wrapper">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="150" data-speed="1000"></h2>
                   <p class="count-text ">Happy Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="804" data-speed="1000"></h2>
                  <p class="count-text ">Course Hours</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter">
                  <h2 class="timer count-title count-number" data-to="50" data-speed="1000"></h2>
                  <p class="count-text ">Employed Students</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="counter end">
                  <h2 class="timer count-title count-number" data-to="15" data-speed="1000"></h2>
                  <p class="count-text ">Years Experience</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php include "inc/footer.php"; ?>
<?php include "inc/foot.php"; ?>

