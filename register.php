<?php
include 'classes/db-logic.php';
include 'classes/auth.php';
include 'classes/student.php';

// Initialize the Student class
$student = new Student($pdo);

// Initialize the Auth class
$auth = new Auth($student);

// Check if the form is submitted
$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Call the register function
    $result = $auth->register($fName, $lName, $username, $email, $password);

	if ($result === "Registration successful.") {
        $message = "Your registration was successful";
		header("Refresh: 3, login.php");
    } else {
        $message = $result;
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

<?php if ($result): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"><?php echo $message; ?>.</div>
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
					<h6>Register Now</h6>
					<h2>Onboard to attend lectures</h2>
					<p>This is to onboard all students who are undergoing any course in HelpmanSCS. Monitoring of student's progress will provide more insight to how well the students are performing.</p>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="contact-us-content">
					<form id="contact-form" action="register.php" method="post">
						<div class="row">
							<div class="col-lg-6">
								<fieldset>
									<input type="text" name="fName" id="fName" placeholder="First Name" autocomplete="on" required>
								</fieldset>
							</div>
							<div class="col-lg-6">
								<fieldset>
									<input type="text" name="lName" id="lName" placeholder="Last Name" autocomplete="on" required>
								</fieldset>
							</div>

							<div class="col-lg-12">
								<fieldset>
									<input type="text" name="username" id="username" placeholder="Username" required="">
								</fieldset>
							</div>

							<div class="col-lg-12">
								<fieldset>
									<input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your E-mail" required="">
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset>
									<input type="password" name="password" id="password" placeholder="Password" required="">
								</fieldset>
							</div>
							<div class="col-lg-12">
								<fieldset>
									<button type="submit" name="submit" id="form-submit" class="orange-button">Register Now!</button>
								</fieldset>
								<p class="text-white mt-5">Already have an account? <span><a href="login.php" class="text-white px-3 fw-bold">login Now</a></span></p>
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
