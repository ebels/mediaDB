<?php
 include("header.html");
?>

<!DOCTYPE html>
<html>
	<head>  
    <link rel="stylesheet" type="text/css" href="../styles/form.css" />
	</head>
    <body>

<!-- -------------------------------------------------------------------------- -->
<!-- FORM HEADLINE -->
        <table>
            <tr class="th form-headline">
                <th class="th form-headline">
                    Neuer Film hinzuf&uuml;gen
                </th>
                
                <!-- BUTTON BACK TO MAIN -->
                <th class="th form-buttonback">
                    <a class="button-back" href="../index.php">zur&uuml;ck zur Hauptseite</a>
                </th>
            </tr>
        </table>
        
        <div class="div-formheadline-line">
            <hr>
        </div>
        
<!-- -------------------------------------------------------------------------- -->        
        <!-- FORM NEW FILM ENTRY -->
        <form action="addentry.php" method="post" enctype="multipart/form-data">
            <!-- FORM BOXES -->
            <div class="div-container-form">
                <br>

                <!-- FORM FILMTITLE/COVER -->
                <div class="div-title-cover">      
                    <!-- FORM FILMTITLE -->
                    <div class="div-filmtitle">
                        <label class="label-filmtitle">Filmtitel</label><br>
                        <input class="input-filmtitle" type="text" name="filmtitle" value="" size="70" maxlength="255" required/>
                    </div>
                    <!-- FORM COVER -->
                    <div class="div-cover">
                        <label class="label-cover">Upload a Cover Picture</label><br>
                        <input class="button-cover" type="file" name="cover" value="Upload file" />
                    </div>
                </div>
                
<!-- -------------------------------------------------------------------------- -->
                <!-- FORM ORIGINALTITLE -->
                <div class="div-origtitle">
                    <label class="label-origtitle">Originaltitel</label><br>
                    <input class="input-origtitle" type="text" name="origtitle" value="" size="70" maxlength="255"/>
                </div>
                
<!-- -------------------------------------------------------------------------- -->
                <!-- FORM DATE/COUNTRY -->
                <div class="div-datecountry">      
                    <!-- FORM DATE -->
                      <div class="div-date">
                         <label class="label-date">Erscheinungsjahr</label><br>
                         <select name="date">
                            <?php
                                for($i = 1900; $i < date("Y")+1; $i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                          </select>
                     </div>
                    <!-- FORM COUNTRY -->
                    <div class="div-country">
                        <label class="label-country">Land</label><br>
                        <select name="country">
                            <option value=""></option>
                            <option value="AF">Afghanistan</option>
                            <option value="AX">&Aring;land Islands</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">C&ocirc;te d'Ivoire</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Cura&ccedil;ao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran, Islamic Republic of</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestinian Territory, Occupied</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">R&eacute;union</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="BL">Saint Barth&eacute;lemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands, British</option>
                            <option value="VI">Virgin Islands, U.S.</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </div>
                </div>
                
<!-- -------------------------------------------------------------------------- -->
                <!-- FORM LENGTH -->
                <div class="div-length">
                    <label class="label-length">Filml&auml;nge (Minuten)</label><br>
                    <input class="input-length" type="number" name="length" value="" size="30" maxlength="10" required/>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM FSK -->
                <div class="div-fsk">
                    <label class="label-fsk">Altersfreigabe (FSK)</label><br>
                    <select required name="fsk">
                        <option value=""></option>
                        <option value="FSK 0">FSK 0</option>
                        <option value="FSK 6">FSK 6</option>
                        <option value="FSK 12">FSK 12</option>
                        <option value="FSK 18">FSK 18</option>
                    </select>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM GENRE -->
                <div class="div-genre">
                    <label class="label-genre">Genre</label><br>
                    <select required name="genre">
                        <option value=""></option>
                        <option value="action">Action</option>
                        <option value="drama">Drama</option>
                        <option value="drama">Dokumentation</option>
                        <option value="erotik">Erotik</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="kinder">Kinder</option>
                        <option value="komoedie">Kom&ouml;die</option>
                        <option value="horror">Horror</option>
                        <option value="liebe">Liebe</option>
                        <option value="sciencefiction">Science-Fiction</option>
                        <option value="thriller">Thriller</option>
                    </select>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM ACTORS/DIRECTOR -->
                <div class="div-actordirector">      
                    <!-- FORM ACTORS -->
                    <div class="div-actors">
                        <label class="label-actors">Darsteller</label><br>
                        <textarea class="textarea-actors" type="text" name="actors" value="" cols="40" rows="10"></textarea>
                    </div>
                    <!-- FORM DIRECTOR -->
                    <div class="div-director">
                        <label class="label-director">Regisseur</label><br>
                        <input class="input-director" type="text" name="director" value="" size="50" maxlength="255"/>
                    </div>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM SUMMERY -->
                <div class="div-summery">
                    <label class="label-summery">Zusammenfassung</label><br>
                    <textarea class="textarea-summery" type="text" name="summery" value="" cols="50" rows="20"></textarea>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM LOCATION -->
                <div class="div-location">
                    <label class="label-location">Standort / Speicherort</label><br>
                    <input class="input-location" type="text" name="location" value="" size="40" maxlength="40" required/>
                    <br>
                    <br>
                </div>

<!-- -------------------------------------------------------------------------- -->
                <!-- FORM BUTTON -->
                <input class="button-addentry" type="submit" name="submit" value="Film eintragen!" />
            </div>
        </form>
        
<!-- -------------------------------------------------------------------------- -->
    </body>
</html>
