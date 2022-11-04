<?php
session_start();
error_reporting(0);
include('includes/dbconnect.php');

if (isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $password = $_POST['password'];

    $ret = "SELECT email from users where email=:email";
    $query = $dbh->prepare($ret);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() == 0) {
        $sql = "INSERT INTO users(fname,lname,phone,email,country,password) VALUES (:firstname,:lastname,:phone,:email,:country,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':country', $country, PDO::PARAM_STR);
        $query->execute();

        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "<div style='background:green;padding:1em;border-radius:1em;color:white;font-size: 1.2rem;font-weight:900'><i class='fa fa-spinner fa-spin'></i> Account Created. Redirecting To Login</div>";
            echo ("<script type='text/javascript'>  
 setTimeout(function(){
    window.location.href = 'login';
 }, 3000);
</script>");
        } else {
            $msg = "<p class='text-danger bg-warning text-center font-weight-bold px-2 py-2 rounded stat3'>Something went wrong.Please try again</p>";
        }
    } else {

        $msg = "<p class='text-danger bg-warning text-center font-weight-bold px-2 py-2 rounded stat3'>This Email is already taken. Use another email</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Elite Capital | Get Started </title>
	<!--Favicon add-->
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">
	<!--bootstrap Css-->
	<link href="auth-assets/front/css/bootstrap.min.css" rel="stylesheet">
	<!--font-awesome Css-->
	<link href="auth-assets/front/css/icofont.min.css" rel="stylesheet">
	<!--owl.carousel Css-->
	<link href="auth-assets/front/css/owl.carousel.min.css" rel="stylesheet">
	<!--Slick Nav Css-->
	<link href="auth-assets/front/css/slicknav.min.css" rel="stylesheet">
	<!--Animate Css-->
	<link href="auth-assets/front/css/animate.css" rel="stylesheet">
	<!--Style Css-->
	<link href="auth-assets/front/css/style.css" rel="stylesheet">
	<!--Responsive Css-->
	<link href="auth-assets/front/css/responsive.css" rel="stylesheet">
	<link href="maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.html" rel="stylesheet">
	<style>
		.form-control {
			border-radius: 0 !important;
		}
	</style>
	<script src="code.jquery.com/jquery-3.3.1.min.html" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.html">
	<script src="cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min-2.html"></script>

	<link href="auth-assets/front/css/color535a535a535a.css?color=009933" rel="stylesheet">


</head>

<body>
	<nav class="navbar-area" style="background-color: #ff9f1a;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 ">
					<a href="." class="logo"><img src="auth-assets/images/logo/logo.png" alt="logo image"
							style="max-height: 44px;"></a>
				</div>
				<div class="col-lg-9 text-right ">
					<ul id="main-menu">
						<li><a href=".">Home</a></li>
						<li><a href="login">Login</a></li>
						<li><a href="register">Register</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<div class="content-for-template  content-template-bg ">
		<div class="row justify-content-center register-page">
			<div class="col-lg-4 col-md-12  ml-auto mr-auto">
				<div class="card text-white bg-dark"
					style="margin-top:50px;margin-bottom:50px;background-color: #ff9f1a!important;">
					<div class="card-header text-center">
						Register
					</div>
					<div class="card-body">
						<center>
						<?php if ($msg) {
                                echo $msg;
                            }  ?> 
							<div class="alert" style="display: none;margin: 5px;" id="errorshow">

							</div>
						</center>

						<form method=post name=mainform id="register"
							action="register">

							<div class="form-group">
								<input type="text" name="firstname" placeholder="Enter First Name"
									title="Please enter you firstname" required="" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="lastname" placeholder="Enter Last Name"
									title="Please enter you lastname" required="" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="phone" placeholder="Enter Phone Number"
									title="Please enter your phone number" required="" class="form-control">

							</div>
							<div class="form-group">
								<select class="form-control" name="country">
									<option value="None">Select Country</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
									<option value="Botswana">Botswana</option>
									<option value="Bouvet Island">Bouvet Island</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Territory">British Indian Ocean Territory
									</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic
										of the</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote d&#039;Ivoire">Cote d&#039;Ivoire</option>
									<option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="East Timor">East Timor</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="France Metropolitan">France Metropolitan</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="French Southern Territories">French Southern Territories</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
									<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Korea, Democratic People&#039;s Republic of">Korea, Democratic
										People&#039;s Republic of</option>
									<option value="Korea, Republic of">Korea, Republic of</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Lao, People&#039;s Democratic Republic">Lao, People&#039;s Democratic
										Republic</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macau">Macau</option>
									<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former
										Yugoslav Republic of</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia, Federated States of">Micronesia, Federated States of
									</option>
									<option value="Moldova, Republic of">Moldova, Republic of</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Niue">Niue</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="Northern Mariana Islands">Northern Mariana Islands</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Pitcairn">Pitcairn</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Reunion">Reunion</option>
									<option value="Romania">Romania</option>
									<option value="Russian Federation">Russian Federation</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines
									</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Georgia and the South Sandwich Islands">South Georgia and the
										South Sandwich Islands</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="St. Helena">St. Helena</option>
									<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands
									</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syrian Arab Republic">Syrian Arab Republic</option>
									<option value="Taiwan, Province of China">Taiwan, Province of China</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
									<option value="Thailand">Thailand</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States">United States</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying
										Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands (British)">Virgin Islands (British)</option>
									<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
									<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
									<option value="Western Sahara">Western Sahara</option>
									<option value="Yemen">Yemen</option>
									<option value="Yugoslavia">Yugoslavia</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
								</select>
							</div>
							<div class="form-group">

								<input name="email" type="email" placeholder="Enter Email Address"
									title="Please enter you email address" required="" class="form-control">

							</div>


							<div class="form-group">

								<input type="password" name="password" title="Please enter your password"
									placeholder="Enter Password" required="" class="form-control">
							</div>
							<div class="form-group">

								<input type="password" name="confirm_password" title="Please retype your password"
									placeholder="Confirm Password" required="" class="form-control">

							</div>
							<div class="terms_upline">
								<div class="check-text">
									<div class="check-box">

									</div>

								</div>

							</div>
							<div>

								<button type="submit" name="register" id="btnReg"
									class="btn btn-own btn-lg btn-block">Register</button>


							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="row">


							<div class="col-md-6 col-sm-12  text-center">
								Have an account? <br> <a href="login" class="btn btn-primary btn-sm">Sign In</a>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

	<footer style="background-color: #ff9f1a;">
		<!--footer area start-->
		<div class="copyright-area" style="background-color: #ff9f1a;">
			<div class="container">
				<div class="row text-center">
					<div class="col-lg-6 col-md-7 ">
						<p class="copyright-text">©
							<script> document.write(new Date().getFullYear());</script> Elite Capital. All
							Rights Reserved.
						</p>
					</div>
				</div>
			</div>
		</div>
		<!--footer area end-->
	</footer>


	<!--back to top start-->
	<div class="back-to-top">
		<i class="icofont icofont-simple-up"></i>
	</div>
	<!--back to top end-->

	<!--jquery script load-->
	<script src="auth-assets/front/js/jquery.js"></script>
	<!--Owl carousel script load-->
	<script src="auth-assets/front/js/owl.carousel.min.js"></script>
	<!--Propper script load here-->
	<script src="auth-assets/front/js/popper.min.js"></script>
	<!--Bootstrap v4 script load here-->
	<script src="auth-assets/front/js/bootstrap.min.js"></script>
	<!--Slick Nav Js File Load-->
	<script src="auth-assets/front/js/jquery.slicknav.min.js"></script>
	<!--Scroll Spy File Load-->
	<script src="auth-assets/front/js/scrollspy.min.js"></script>
	<!--Wow Js File Load-->
	<script src="auth-assets/front/js/wow.min.js"></script>
	<!--Main js file load-->
	<script src="auth-assets/front/js/main.js"></script>
	<!-- <script src="auth-assets/js/register.js"></script> -->
	<script>
		$("#reg-form").on("submit", function (e) {

			let pass = $(".reg-password").val();
			let repass = $(".reg-repassword").val();
			let errMessage = $("#err-regform");

			if (pass.length <= 6) {
				errMessage.text("Password must be greater than 6");
				return false;
			}
			if (pass !== repass) {
				errMessage.text("Password mismatched");
				return false;
			}

		})

	</script>
</body>

</html>