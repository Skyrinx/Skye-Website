<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST["submit"])){
        $LastName = $_POST["LastName"];
        $FirstName = $_POST["FirstName"];
        $Email = $_POST["Email"];
        $Lot = $_POST["Lot"];
        $Street = $_POST["Street"];
        $Subdivision = $_POST["Subdivision"];
        $Barangay = $_POST["Barangay"];
        $City = $_POST["City"];
        $Province = $_POST["Province"];
        $country = $_POST["country"];
        $countryCode = $_POST["countryCode"];
        $contactNumber = $_POST["contactNumber"];
        $password = $_POST["password"];
        $RepeatPassword = $_POST["repeat_password"];
        $errors = array();

	    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
 
        // validate if all fields are empty
        if (empty($LastName) OR empty($FirstName) OR empty($Email) OR empty($password) OR empty($RepeatPassword) OR empty($Barangay) OR empty($City) OR empty($Province) OR empty($country) OR empty($countryCode) OR empty($contactNumber)) {
            array_push($errors,"All fields are required");
        }
        // validate if the email is not validated
        if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
            array_push($errors,"Email is not valid");
        }
        // password should not be less than 8
        if (strlen($password)<8) {
            array_push($errors,"Password must be atleast 8 characters long");
        }
         // check if password is the same
         if($password!= $RepeatPassword){
            array_push($errors,"Password does not match");          
        }
        require_once "database.php";
        $sql = "SELECT * FROM user_tbl WHERE email = '$Email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount > 0){
            array_push($errors, "Email Already Exist!");
        }
        if (count($errors)> 0){
                foreach($errors as $error) {
                    echo"<div class='alert alert-danger'>$error</div>";
                }
             } else {
                require_once "database.php";
                $sql ="INSERT INTO user_tbl (Last_Name, First_Name, email, password, Lot, Street, Subdivision, Barangay, City, Province, country, countryCode, countryNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
            if ($preparestmt) {
                mysqli_stmt_bind_param($stmt, "sssssssssssss", $LastName, $FirstName, $Email, $passwordHash, $Lot, $Street, $Subdivision, $Barangay, $City, $Province, $country, $countryCode, $contactNumber);
                mysqli_stmt_execute($stmt);
                echo "<div class = 'alert alert-success'> You are Registered Successfully! </div>";
            } else {
                die("Something went wrong!");
            }
             }
            }
             ?>
        <form action="registration.php" method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="LastName" placeholder="Last Name: ">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="FirstName" placeholder="First Name: ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Email" placeholder="Email: ">
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Lot" placeholder="Lot/Blk ">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Street" placeholder="Street ">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Subdivision" placeholder="Phase/Subdivision ">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Barangay" placeholder="Barangay ">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="City" placeholder="City/Municipality ">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Province" placeholder="Province ">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <select class="form-select" name="country">
            <option value="" id="Country" disabled="" selected="">Select Country</option>
            <option value="Afghanistan">Afghanistan</option>
            <option value="Åland Islands">Åland Islands</option>
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
            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
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
            <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cote D'ivoire">Cote D'ivoire</option>
            <option value="Croatia">Croatia</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
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
            <option value="Guernsey">Guernsey</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-bissau">Guinea-bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Isle of Man">Isle of Man</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jersey">Jersey</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
            <option value="Korea, Republic of">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon">Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macao">Macao</option>
            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
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
            <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
            <option value="Moldova, Republic of">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montenegro">Montenegro</option>
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
            <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
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
            <option value="Saint Helena">Saint Helena</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
            <option value="Saint Lucia">Saint Lucia</option>
            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
            <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Serbia">Serbia</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra Leone">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
            <option value="Spain">Spain</option>
            <option value="Sri Lanka">Sri Lanka</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
            <option value="Taiwan">Taiwan</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Timor-leste">Timor-leste</option>
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
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet Nam">Viet Nam</option>
            <option value="Virgin Islands, British">Virgin Islands, British</option>
            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
            <option value="Wallis and Futuna">Wallis and Futuna</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
        </select>
        </div>
            <div class="input-group mb-3">
            <select class="form-select" id="countryCode" name="countryCode">
            <option value="" id="PhoneNumber" disabled="" selected="">Phone Number</option>
            <option value="AF (+93)">AF (+93)</option>
            <option value="AX (+358)">AX (+358)</option>
            <option value="AL (+355)">AL (+355)</option>
            <option value="DZ (+213)">DZ (+213)</option>
            <option value="AS (+1-684)">AS (+1-684)</option>
            <option value="AD (+376)">AD (+376)</option>
            <option value="AO (+244)">AO (+244)</option>
            <option value="AI (+1-264)">AI (+1-264)</option>
            <option value="AG (+1-268)">AG (+1-268)</option>
            <option value="AR (+54)">AR (+54)</option>
            <option value="AM (+374)">AM (+374)</option>
            <option value="AW (+297)">AW (+297)</option>
            <option value="AU (+61)">AU (+61)</option>
            <option value="AT (+43)">AT (+43)</option>
            <option value="AZ (+994)">AZ (+994)</option>
            <option value="BS (+1-242)">BS (+1-242)</option>
            <option value="BH (+973)">BH (+973)</option>
            <option value="BD (+880)">BD (+880)</option>
            <option value="BB (+1-246)">BB (+1-246)</option>
            <option value="BY (+375)">BY (+375)</option>
            <option value="BE (+32)">BE (+32)</option>
            <option value="BZ (+501)">BZ (+501)</option>
            <option value="BJ (+229)">BJ (+229)</option>
            <option value="BM (+1-441)">BM (+1-441)</option>
            <option value="BT (+975)">BT (+975)</option>
            <option value="BO (+591)">BO (+591)</option>
            <option value="BQ (+599)">BQ (+599)</option>
            <option value="BA (+387)">BA (+387)</option>
            <option value="BW (+267)">BW (+267)</option>
            <option value="BR (+55)">BR (+55)</option>
            <option value="BN (+673)">BN (+673)</option>
            <option value="BG (+359)">BG (+359)</option>
            <option value="BF (+226)">BF (+226)</option>
            <option value="BI (+257)">BI (+257)</option>
            <option value="CV (+238)">CV (+238)</option>
            <option value="KH (+855)">KH (+855)</option>
            <option value="CM (+237)">CM (+237)</option>
            <option value="CA (+1)">CA (+1)</option>
            <option value="KY (+1-345)">KY (+1-345)</option>
            <option value="CF (+236)">CF (+236)</option>
            <option value="TD (+235)">TD (+235)</option>
            <option value="CL (+56)">CL (+56)</option>
            <option value="CN (+86)">CN (+86)</option>
            <option value="CX (+61)">CX (+61)</option>
            <option value="CC (+61)">CC (+61)</option>
            <option value="CO (+57)">CO (+57)</option>
            <option value="KM (+269)">KM (+269)</option>
            <option value="CG (+242)">CG (+242)</option>
            <option value="CD (+243)">CD (+243)</option>
            <option value="CK (+682)">CK (+682)</option>
            <option value="CR (+506)">CR (+506)</option>
            <option value="CI (+225)">CI (+225)</option>
            <option value="HR (+385)">HR (+385)</option>
            <option value="CU (+53)">CU (+53)</option>
            <option value="CW (+599)">CW (+599)</option>
            <option value="CY (+357)">CY (+357)</option>
            <option value="CZ (+420)">CZ (+420)</option>
            <option value="DK (+45)">DK (+45)</option>
            <option value="DJ (+253)">DJ (+253)</option>
            <option value="DM (+1-767)">DM (+1-767)</option>
            <option value="DO (+1-809)">DO (+1-809)</option>
            <option value="EC (+593)">EC (+593)</option>
            <option value="EG (+20)">EG (+20)</option>
            <option value="SV (+503)">SV (+503)</option>
            <option value="GQ (+240)">GQ (+240)</option>
            <option value="ER (+291)">ER (+291)</option>
            <option value="EE (+372)">EE (+372)</option>
            <option value="SZ (+268)">SZ (+268)</option>
            <option value="ET (+251)">ET (+251)</option>
            <option value="FK (+500)">FK (+500)</option>
            <option value="FO (+298)">FO (+298)</option>
            <option value="FJ (+679)">FJ (+679)</option>
            <option value="FI (+358)">FI (+358)</option>
            <option value="FR (+33)">FR (+33)</option>
            <option value="GF (+594)">GF (+594)</option>
            <option value="PF (+689)">PF (+689)</option>
            <option value="GA (+241)">GA (+241)</option>
            <option value="GM (+220)">GM (+220)</option>
            <option value="GE (+995)">GE (+995)</option>
            <option value="DE (+49)">DE (+49)</option>
            <option value="GH (+233)">GH (+233)</option>
            <option value="GI (+350)">GI (+350)</option>
            <option value="GR (+30)">GR (+30)</option>
            <option value="GL (+299)">GL (+299)</option>
            <option value="GD (+1-473)">GD (+1-473)</option>
            <option value="GP (+590)">GP (+590)</option>
            <option value="GU (+1-671)">GU (+1-671)</option>
            <option value="GT (+502)">GT (+502)</option>
            <option value="GG (+44-1481)">GG (+44-1481)</option>
            <option value="GN (+224)">GN (+224)</option>
            <option value="GW (+245)">GW (+245)</option>
            <option value="GY (+592)">GY (+592)</option>
            <option value="HT (+509)">HT (+509)</option>
            <option value="VA (+379)">VA (+379)</option>
            <option value="HN (+504)">HN (+504)</option>
            <option value="HK (+852)">HK (+852)</option>
            <option value="HU (+36)">HU (+36)</option>
            <option value="IS (+354)">IS (+354)</option>
            <option value="IN (+91)">IN (+91)</option>
            <option value="ID (+62)">ID (+62)</option>
            <option value="IR (+98)">IR (+98)</option>
            <option value="IQ (+964)">IQ (+964)</option>
            <option value="IE (+353)">IE (+353)</option>
            <option value="IM (+44-1624)">IM (+44-1624)</option>
            <option value="IL (+972)">IL (+972)</option>
            <option value="IT (+39)">IT (+39)</option>
            <option value="JM (+1-876)">JM (+1-876)</option>
            <option value="JP (+81)">JP (+81)</option>
            <option value="JE (+44-1534)">JE (+44-1534)</option>
            <option value="JO (+962)">JO (+962)</option>
            <option value="KZ (+7)">KZ (+7)</option>
            <option value="KE (+254)">KE (+254)</option>
            <option value="KI (+686)">KI (+686)</option>
            <option value="KP (+850)">KP (+850)</option>
            <option value="KR (+82)">KR (+82)</option>
            <option value="KW (+965)">KW (+965)</option>
            <option value="KG (+996)">KG (+996)</option>
            <option value="LA (+856)">LA (+856)</option>
            <option value="LV (+371)">LV (+371)</option>
            <option value="LB (+961)">LB (+961)</option>
            <option value="LS (+266)">LS (+266)</option>
            <option value="LR (+231)">LR (+231)</option>
            <option value="LY (+218)">LY (+218)</option>
            <option value="LI (+423)">LI (+423)</option>
            <option value="LT (+370)">LT (+370)</option>
            <option value="LU (+352)">LU (+352)</option>
            <option value="MO (+853)">MO (+853)</option>
            <option value="MG (+261)">MG (+261)</option>
            <option value="MW (+265)">MW (+265)</option>
            <option value="MY (+60)">MY (+60)</option>
            <option value="MV (+960)">MV (+960)</option>
            <option value="ML (+223)">ML (+223)</option>
            <option value="MT (+356)">MT (+356)</option>
            <option value="MH (+692)">MH (+692)</option>
            <option value="MQ (+596)">MQ (+596)</option>
            <option value="MR (+222)">MR (+222)</option>
            <option value="MU (+230)">MU (+230)</option>
            <option value="YT (+262)">YT (+262)</option>
            <option value="MX (+52)">MX (+52)</option>
            <option value="FM (+691)">FM (+691)</option>
            <option value="MD (+373)">MD (+373)</option>
            <option value="MC (+377)">MC (+377)</option>
            <option value="MN (+976)">MN (+976)</option>
            <option value="ME (+382)">ME (+382)</option>
            <option value="MS (+1-664)">MS (+1-664)</option>
            <option value="MA (+212)">MA (+212)</option>
            <option value="MZ (+258)">MZ (+258)</option>
            <option value="MM (+95)">MM (+95)</option>
            <option value="NA (+264)">NA (+264)</option>
            <option value="NR (+674)">NR (+674)</option>
            <option value="NP (+977)">NP (+977)</option>
            <option value="NL (+31)">NL (+31)</option>
            <option value="NC (+687)">NC (+687)</option>
            <option value="NZ (+64)">NZ (+64)</option>
            <option value="NI (+505)">NI (+505)</option>
            <option value="NE (+227)">NE (+227)</option>
            <option value="NG (+234)">NG (+234)</option>
            <option value="NU (+683)">NU (+683)</option>
            <option value="NF (+672)">NF (+672)</option>
            <option value="MK (+389)">MK (+389)</option>
            <option value="MP (+1-670)">MP (+1-670)</option>
            <option value="NO (+47)">NO (+47)</option>
            <option value="OM (+968)">OM (+968)</option>
            <option value="PK (+92)">PK (+92)</option>
            <option value="PW (+680)">PW (+680)</option>
            <option value="PS (+970)">PS (+970)</option>
            <option value="PA (+507)">PA (+507)</option>
            <option value="PG (+675)">PG (+675)</option>
            <option value="PY (+595)">PY (+595)</option>
            <option value="PE (+51)">PE (+51)</option>
            <option value="PH (+63)">PH (+63)</option>
            <option value="PN (+64)">PN (+64)</option>
            <option value="PL (+48)">PL (+48)</option>
            <option value="PT (+351)">PT (+351)</option>
            <option value="PR (+1-787)">PR (+1-787)</option>
            <option value="QA (+974)">QA (+974)</option>
            <option value="RE (+262)">RE (+262)</option>
            <option value="RO (+40)">RO (+40)</option>
            <option value="RU (+7)">RU (+7)</option>
            <option value="RW (+250)">RW (+250)</option>
            <option value="BL (+590)">BL (+590)</option>
            <option value="SH (+290)">SH (+290)</option>
            <option value="KN (+1-869)">KN (+1-869)</option>
            <option value="LC (+1-758)">LC (+1-758)</option>
            <option value="MF (+590)">MF (+590)</option>
            <option value="PM (+508)">PM (+508)</option>
            <option value="VC (+1-784)">VC (+1-784)</option>
            <option value="WS (+685)">WS (+685)</option>
            <option value="SM (+378)">SM (+378)</option>
            <option value="ST (+239)">ST (+239)</option>
            <option value="SA (+966)">SA (+966)</option>
            <option value="SN (+221)">SN (+221)</option>
            <option value="RS (+381)">RS (+381)</option>
            <option value="SC (+248)">SC (+248)</option>
            <option value="SL (+232)">SL (+232)</option>
            <option value="SG (+65)">SG (+65)</option>
            <option value="SX (+1-721)">SX (+1-721)</option>
            <option value="SK (+421)">SK (+421)</option>
            <option value="SI (+386)">SI (+386)</option>
            <option value="SB (+677)">SB (+677)</option>
            <option value="SO (+252)">SO (+252)</option>
            <option value="ZA (+27)">ZA (+27)</option>
            <option value="SS (+211)">SS (+211)</option>
            <option value="ES (+34)">ES (+34)</option>
            <option value="LK (+94)">LK (+94)</option>
            <option value="SD (+249)">SD (+249)</option>
            <option value="SR (+597)">SR (+597)</option>
            <option value="SJ (+47)">SJ (+47)</option>
            <option value="SE (+46)">SE (+46)</option>
            <option value="CH (+41)">CH (+41)</option>
            <option value="SY (+963)">SY (+963)</option>
            <option value="TW (+886)">TW (+886)</option>
            <option value="TJ (+992)">TJ (+992)</option>
            <option value="TZ (+255)">TZ (+255)</option>
            <option value="TH (+66)">TH (+66)</option>
            <option value="TL (+670)">TL (+670)</option>
            <option value="TG (+228)">TG (+228)</option>
            <option value="TK (+690)">TK (+690)</option>
            <option value="TO (+676)">TO (+676)</option>
            <option value="TT (+1-868)">TT (+1-868)</option>
            <option value="TN (+216)">TN (+216)</option>
            <option value="TR (+90)">TR (+90)</option>
            <option value="TM (+993)">TM (+993)</option>
            </select>
            <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter contact number">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password: ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password: ">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary key" name="submit" placeholder="Submit ">
            </div>
            <div id="chuchu"><p> Already Logged in? <a id="chuchu2" href="login.php"> Login Here</a></div>
        </form>
    </div>
</body>
 
</html>