<?php
include 'classes/db-logic.php';
include 'classes/auth.php';
include 'classes/student.php';
#love is God
// Initialize the Student class
$student = new Student($pdo);

// Initialize the Auth class
$auth = new Auth($student);

// Check if the form is submitted
$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Call the login function
    $result = $auth->login($username, $password);

    // Check if login was successful
    if (strpos($result, 'Login successful') !== false) {
        header("Refresh: 3, courses.php");
        exit();
    }
}
?>

<?php include "inc/head.php"; ?>

<!-- ***** Preloader Start ***** -->
<?php include "inc/preloader.php"; ?>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<?php include "inc/header.php"; ?>
<!-- ***** Header Area End ***** -->

<div class="main-banner" id="top">
	<div class="container">
		<div class="row">

		</div>
	</div>
</div>


<div class="contact-us section" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-6  align-self-center">
				<div class="section-heading">
					<h2>Welcome Back</h2>

				</div>
			</div>
			<?php if ($result): ?>
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="toast" class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body"><?php echo $result; ?></div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var toastEl = document.getElementById('toast');
                        var toast = new bootstrap.Toast(toastEl);
                        toast.show();
                    });
                </script>
            <?php endif; ?>
			<div class="col-lg-6">
				<div class="contact-us-content">
					<form id="contact-form" action="login.php" method="post">
						<div class="row">
                            <div class="col-lg-12">
								<fieldset>
									<input type="text" name="username" id="" placeholder="Username" required="">
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset>
									<input type="password" name="password" id="password" placeholder="Password" required="">
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset>
									<button type="submit" id="form-submit" class="orange-button btn-lg">login</button>
								</fieldset>
								<p class="text-white mt-5">Don't have an account? <span><a href="register.php" class="text-white px-3 fw-bold">Sign up</a></span></p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include "inc/footer.php"; ?>
<?php include "inc/foot.php"; ?>
