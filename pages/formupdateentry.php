<?php
/*********************************************************************
Modulename: formupdateentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

Formular to update movie values

Version 1.0.0
2016-06-16
**********************************************************************/

include("header.html");

// -------------------------------------------------------------------------- //
// CONNECT TO DATABASE //
$database = new PDO('mysql:host=localhost;dbname=mediadb', 'root', '');

// -------------------------------------------------------------------------- //
// GET VALUES //
$sql = $database->query("SELECT * FROM movies WHERE id = '$_GET[id]'");
$details = $sql->fetch(\PDO::FETCH_ASSOC);
$titel=$details['title'];
$origtitle=$details['origtitle'];
$coverimg=$details['cover'];
$date=$details['date'];
$country=$details['country'];
$length=$details['length'];
$fsk=$details['fsk'];
$genre=$details['genre'];
$actors=$details['actors'];
$director=$details['director'];
$summery=$details['summery'];
$location=$details['location'];

?>

<!DOCTYPE html>
<html>
	<head>  
    <link rel="stylesheet" type="text/css" href="../css/formupdate.css" />
	</head>
    <body>

<!-- -------------------------------------------------------------------------- -->
<!-- FORM HEADLINE -->
        <table class="table-form">
            <tr class="tr-form-headline">
                <th class="th-form-headline">
                    Filmattribute &auml;ndern
                </th>
                
                <!-- BUTTON BACK TO MAIN -->
                <th class="th-form-buttonback">
                    <a class="button-back" href="../index.php">zur&uuml;ck zur Hauptseite</a>
                </th>
            </tr>
        </table>
        
        <div class="div-formheadline-line">
            <hr>
        </div>
        
<!-- -------------------------------------------------------------------------- -->        
        <!-- FORM NEW FILM ENTRY -->
        <form action="../modules/updateentry.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value=<?php echo " $_GET[id] "?>>
            <!-- FORM BOXES -->
            <div class="div-container-form">
                <table class="table-editmovie">
                    <tr>
                        <!-- TABLE HEADER -->
                        <th></th>
                        <th>Current</th>
                        <th>New</th>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->         
                    <!-- FILMTITLE -->
                    <tr>
                        <td class="td-title">Filmtitel</td>
                        <td>
                            <label class="label-filmtitle"><?php echo"$titel"?></label><br>
                        </td>   
                        <td>
                            <input class="input-filmtitle" type="text" name="filmtitle" value="" size="70" maxlength="255"/>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- ORIG. FILMTITLE -->
                    <tr>
                        <td class="td-title">Originaltitel</td>
                        <td>
                            <label class="label-origtitle"><?php echo"$origtitle"?></label><br>
                        </td>
                        <td>
                            <input class="input-origtitle" type="text" name="origtitle" value="" size="70" maxlength="255"/>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- COVER IMAGE -->
                    <tr>
                        <td class="td-cover">Cover</td>
                        <td>
                            <?php echo "<img style='border-width: 0px;' src='../$coverimg' width='80' height='114'/><br>"?>
                        </td>
                        <td>
                            <input class="button-cover" type="file" name="cover" value="Upload file" />
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- DATE -->
                    <tr>
                        <td class="td-cover">Erscheinungsjahr</td>
                        <td>
                            <label class="label-date"><?php echo"$date"?></label><br>
                        </td>
                        <td>
                            <select name="date">
                            <?php
                                for($i = 1900; $i < date("Y")+1; $i++){
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            ?>
                          </select>
                        </td>
                    </tr>

<!-- -------------------------------------------------------------------------- -->  
                    <!-- COUNTRY -->
                    <tr>
                        <td class="td-country">Produktionsland</td>
                        <td>
                            <label class="label-country"><?php echo"$country"?></label><br>
                        </td>
                        <td>
                            <select name="country">
                                <option value=""></option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
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
                                <option value="Bonaire">Bonaire</option>
                                <option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                <option value="Brunei">Brunei</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Canary Islands">Canary Islands</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Channel Islands">Channel Islands</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Island">Cocos Island</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Curacao">Curacao</option>
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
                                <option value="Falkland Islands">Falkland Islands</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Ter">French Southern Ter</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Great Britain">Great Britain</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran">Iran</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea North">Korea North</option>
                                <option value="Korea South">Korea South</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Laos">Laos</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libya">Libya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macau">Macau</option>
                                <option value="Macedonia">Macedonia</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Midway Islands">Midway Islands</option>
                                <option value="Moldova">Moldova</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Nambia">Nambia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherland Antilles">Netherland Antilles</option>
                                <option value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
                                <option value="Nevis">Nevis</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau Island">Palau Island</option>
                                <option value="Palestine">Palestine</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn Island">Pitcairn Island</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Republic of Montenegro">Republic of Montenegro</option>
                                <option value="Republic of Serbia">Republic of Serbia</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russia">Russia</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="St Barthelemy">St Barthelemy</option>
                                <option value="St Eustatius">St Eustatius</option>
                                <option value="St Helena">St Helena</option>
                                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                <option value="St Lucia">St Lucia</option>
                                <option value="St Maarten">St Maarten</option>
                                <option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
                                <option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
                                <option value="Saipan">Saipan</option>
                                <option value="Samoa">Samoa</option>
                                <option value="Samoa American">Samoa American</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syria">Syria</option>
                                <option value="Tahiti">Tahiti</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States of America">United States of America</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Vatican City State">Vatican City State</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                <option value="Wake Island">Wake Island</option>
                                <option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zaire">Zaire</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- LENGTH -->
                    <tr>
                        <td class="td-length">Filmlänge</td>
                        <td>
                            <label class="label-length"><?php echo"$length Minuten"?></label><br>
                        </td>
                        <td>
                            <input class="input-length" type="number" name="length" value="" size="30" maxlength="10"/>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- FSK -->
                    <tr>
                        <td class="td-fsk">Alterfreigabe (FSK)</td>
                        <td>
                            <label class="label-fsk"><?php echo"$fsk"?></label><br>
                        </td>
                        <td>
                            <select name="fsk">
                                <option value=""></option>
                                <option value="FSK 0">FSK 0</option>
                                <option value="FSK 6">FSK 6</option>
                                <option value="FSK 12">FSK 12</option>
                                <option value="FSK 18">FSK 18</option>
                            </select>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- GENRE -->
                    <tr>
                        <td class="td-genre">Genre</td>
                        <td>
                            <label class="label-genre"><?php echo"$genre"?></label><br>
                        </td>
                        <td>
                            <select name="genre">
                                <option value=""></option>
                                <option value="Action">Action</option>
                                <option value="Drama">Drama</option>
                                <option value="Dokumentation">Dokumentation</option>
                                <option value="Erotik">Erotik</option>
                                <option value="Fantasy">Fantasy</option>
                                <option value="Kinder">Kinder</option>
                                <option value="Komoedie">Kom&ouml;die</option>
                                <option value="Horror">Horror</option>
                                <option value="Liebe">Liebe</option>
                                <option value="Sciencefiction">Science-Fiction</option>
                                <option value="Thriller">Thriller</option>
                            </select>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- ACTORS -->
                    <tr>
                        <td class="td-actors">Darsteller</td>
                        <td>
                            <label class="label-actors"><?php echo"$actors"?></label><br>
                        </td>
                        <td>
                            <textarea class="textarea-actors" type="text" name="actors" value="" cols="40" rows="10"></textarea>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- DIRECTOR -->
                    <tr>
                        <td class="td-actors">Regisseur</td>
                        <td>
                            <label class="label-director"><?php echo"$director"?></label><br>
                        </td>
                        <td>
                            <input class="input-director" type="text" name="director" value="" size="50" maxlength="255"/>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- SUMMERY -->
                    <tr>
                        <td class="td-actors">Zusammenfassung</td>
                        <td>
                            <label class="label-summery"><?php echo"$summery"?></label><br>
                        </td>
                        <td>
                            <textarea class="textarea-summery" type="text" name="summery" value="" cols="50" rows="20"></textarea>
                        </td>
                    </tr>
                    
<!-- -------------------------------------------------------------------------- -->  
                    <!-- LOCATION -->
                    <tr>
                        <td class="td-location">Standort / Speicherort</td>
                        <td>
                            <label class="label-location"><?php echo"$location"?></label><br>
                        </td>
                        <td>
                            <input class="input-location" type="text" name="location" value="" size="40" maxlength="40" />
                        </td>
                    </tr>
                </table>
                
            
                
                
<!-- -------------------------------------------------------------------------- -->
                <!-- FORM BUTTON -->
                <input class="button-editentry" type="submit" name="submit" value="Film ändern!" />
            </div>
        </form>
        
<!-- -------------------------------------------------------------------------- -->
    </body>
</html>

?>