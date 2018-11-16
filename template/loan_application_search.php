<?php
$msg = '';

if (isset($_POST['application-submit'])) {
    if (!empty($_POST)) {
        global $wpdb;
        
        $msg = '<div class="alert alert-success"><b>Thank you for applying for a loan with wonda loans. A summary of your application can be found below.</b></div>';
    }
}
?>

<?php if ($msg) { ?>
    <div class="col-xs-12 text-center">
        <?php echo $msg; ?>
    </div>

    <div class="col-xs-12 col-sm-6">
        <h2>Loan Summary</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Loan Amount Requested</th>
                    <td>£<?php echo $_POST['Loan_Amount']; ?></td>
                </tr>
                <tr class="info">
                    <th>Repayment Period</th>
                    <td><?php echo $_POST['Repayment_Period']; ?> Month</td>
                </tr>
                <tr class="info">
                    <th>Interest Rate</th>
                    <td><?php echo '0.00'; ?></td>
                </tr>
                <tr class="info">
                    <th>Total Amount Repayable</th>
                    <td><?php echo '0.00'; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
} else {
    ?>
    <form id="loanapplication" name="loanApplication" method="post">
        <h2>1. Your Loan Details</h2>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Title">Title:</label>
                <select id="Title" name="Title" class="form-control">
                    <option value="Mr" selected>Mr.</option>
                    <option value="Mrs">Mrs.</option>
                    <option value="Miss">Miss.</option>
                    <option value="Ms">Ms.</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="First_Name">First Name:</label>
                <input type="text" id="First_Name" name="First_Name" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Surname">Surname:</label>
                <input type="text" id="Surname" name="Surname" class="form-control" required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Email">Email Address:</label>
                <input type="email" id="Email" name="Email" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Date_of_Birth">Date of Birth:</label>
                <input type="date" id="Date_of_Birth" name="Date_of_Birth" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Nationality">Nationality:</label>
                <select id="Nationality" name="Nationality" class="form-control" required="required">
                    <option value="">--</option>
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
                    <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
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
                    <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaçao">Curaçao</option>
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
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
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
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
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
                    <option value="Réunion">Réunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russian Federation">Russian Federation</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Barthélemy">Saint Barthélemy</option>
                    <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Martin (French part)">Saint Martin (French part)</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-Leste">Timor-Leste</option>
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
                    <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
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
        </div>

        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-6">
                <label for="Loan_Amount">Loan Amount:</label>
                <select id="Loan_Amount" name="Loan_Amount" class="form-control" required="required">
                    <option value="">--</option>
                    <option value="150">£150</option>
                    <option value="200">£200</option>
                    <option value="250">£250</option>
                    <option value="300">£300</option>
                    <option value="350">£350</option>
                    <option value="400">£400</option>
                    <option value="450">£450</option>
                    <option value="500">£500</option>
                    <option value="550">£550</option>
                    <option value="600">£600</option>
                    <option value="700">£700</option>
                    <option value="800">£800</option>
                    <option value="900">£900</option>
                    <option value="1000">£1000</option>
                    <option value="1100">£1100</option>
                    <option value="1200">£1200</option>
                    <option value="1300">£1300</option>
                    <option value="1400">£1400</option>
                    <option value="1500">£1500</option>
                    <option value="1600">£1600</option>
                    <option value="1700">£1700</option>
                    <option value="1800">£1800</option>
                    <option value="1900">£1900</option>
                    <option value="2000">£2000</option>    
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <label for="Repayment_Period">Repayment Period:</label>
                <select id="Repayment_Period" name="Repayment_Period" class="form-control" required="required">
                    <option value="">Select Month</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>    
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>    
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>    
                    <option value="35">35</option>    
                    <option value="36">36</option>    
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <h2>2. Your Address Details</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="House_Number">House Number/Name:</label>
                <input type="text" id="House_Number" name="House_Number" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Street_Name">Street Name:</label>
                <input type="text" id="Street-Name" name="Street-Name" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Post_Code">Post Code:</label>
                <input type="text" id="Post_Code" name="Post_Code" class="form-control" required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="City">Town/City:</label>
                <input type="text" id="City" name="City" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="County">County:</label>
                <input type="text" id="County" name="County" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Time-at-Current-Address-month">Time at Current Address:</label>
                <div class="col-xs-12 pad0">
                    <div class="col-xs-6 pad0">
                        <select id="Time_at_Current_Address_Month" name="Time_at_Current_Address_Month" class="form-control" required="required">
                            <option value="">Select Month</option>
                            <option value='Janaury'>Janaury</option>
                            <option value='February'>February</option>
                            <option value='March'>March</option>
                            <option value='April'>April</option>
                            <option value='May'>May</option>
                            <option value='June'>June</option>
                            <option value='July'>July</option>
                            <option value='August'>August</option>
                            <option value='September'>September</option>
                            <option value='October'>October</option>
                            <option value='November'>November</option>
                            <option value='December'>December</option>
                        </select>
                    </div>
                    <div class="col-xs-6 pad0">
                        <select id="Time_at_Current_Address_Year" name="Time_at_Current_Address_Year" class="form-control" required="required">
                            <option value="">Select Year</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                            <option value="2016">2016</option>
                            <option value="2015">2015</option>
                            <option value="2014">2014</option>
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Home_Type">Home Type:</label>
                <select id="Home_Type" name="Home_Type" class="form-control" required="required">
                    <option value="" selected>--</option>
                    <option value="Rented–Private">Rented–Private</option>
                    <option value="Rented–Council">Rented–Council</option>
                    <option value="Living with Parents">Living with Parents</option>
                    <option value="Owned Mortgage">Owned Mortgage</option>
                    <option value="Owned Outright">Owned Outright</option>
                </select>
            </div>
            <div id="Previous_Address_field" class="form-group col-xs-12 col-sm-8">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <h2>3. Your Employment Details</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Primary_Income">Primary Income:</label>
                <select id="Primary_Income" name="Primary_Income" class="form-control" required="required">
                    <option value="" selected>--</option>
                    <option value="Salary">Salary</option>
                    <option value="Pension">Pension</option>
                    <option value="Student Loan">Student Loan</option>
                    <option value="Benefits">Benefits</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Employer_Name">Employer Name:</label>
                <input type="text" id="Employer_Name" name="Employer_Name" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Job_Title">Job Title:</label>
                <input type="text" name="Job_Title" class="form-control" id="Job_Title"  required="required">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Monthly_Pay">Monthly Pay (after tax):</label>
                <select id="Monthly_Pay" name="Monthly_Pay" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Pay_Frequency">Pay Frequency:</label>
                <select id="Pay_Frequency" name="Pay_Frequency" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Time_with_Employer">Time with Employer:</label>
                <select id="Time_with_Employer" name="Time_with_Employer" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Next_Pay_Date">Next Pay Date:</label>
                <input type="text" id="Next_Pay_Date" name="Next_Pay_Date" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Following_Pay_Date">Following Pay Date:</label>
                <input type="text" id="Following_Pay_Date" name="Following_Pay_Date" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Paid_into_Bank_Account">Paid into Bank Account:</label>
                <select id="Paid_into_Bank_Account" name="Paid_into_Bank_Account" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Employment_Industry">Employment Industry:</label>
                <select id="Employment_Industry" name="Employment_Industry" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="NI_Number">NI Number (optional):</label>
                <input type="text" id="NI_Number" name="NI_Number" class="form-control" required="required">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Work_Phone">Work Phone:</label>
                <input type="text" id="Work_Phone" name="Work_Phone" class="form-control" required="required">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <h2>4. Your Bank Details</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Debit_Card_Type">Debit Card Type:</label>
                <select id="Debit_Card_Type" name="Debit_Card_Type" class="form-control">
                    <option value="" selected>--</option>
                    <option value="Dummy Text" selected>Dummy Text</option>
                </select>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Bank_Account_Number">Bank Account Number:</label>
                <input type="text" id="Bank_Account_Number" name="Bank_Account_Number" class="form-control" max="8" required="required" placeholder="Enter 8 digit number">
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <label for="Bank_Short_Code">Bank Sort Code:</label>
                <input type="text" id="Bank_Short_Code" name="Bank_Short_Code" class="form-control" required="required">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12">
            <h2>Please Read and Confirm</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.
                    </label>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <button type="submit" name="application-submit" class="btn btn-primary">Sign in</button>
        </div>    
    </form>
    <script>
        jQuery('#time-at-current-address-year').change(function () {
            var cYear = (new Date()).getFullYear();
            var cValue = jQuery(this).val();
            var final = parseInt(cYear) - parseInt(cValue);
            if (final < 3)
            {
                jQuery('#Previous_Address_field').html('<label for="Previous_Address">Previous Address:</label><input type="text" id="Previous_Address" name="Previous_Address" class="form-control" required="required" >');
            }
            else
            {
                jQuery('#Previous_Address_field').html('');
            }
        });
    </script>
<?php } ?>