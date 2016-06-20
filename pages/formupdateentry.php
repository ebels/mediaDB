<?php
/*********************************************************************
Modulename: formupdateentry.php
Project:    mediaDB
Author:     Sarah Ebelsheiser <sarah.ebel@outlook.com>

Formular to update movie values

Version 1.0.0
2016-06-20
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
$format=$details['format'];

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
                                <option value=""></option>
                                <option value="AF">Afghanistan</option>
                                <option value="EG">Ägypten</option>
                                <option value="AL">Albanien</option>
                                <option value="DZ">Algerien</option>
                                <option value="AD">Andorra</option>
                                <option value="AO">Angola</option>
                                <option value="AI">Anguilla</option>
                                <option value="AQ">Antarktis</option>
                                <option value="AG">Antigua und Barbuda</option>
                                <option value="GQ">Äquatorial Guinea</option>
                                <option value="AR">Argentinien</option>
                                <option value="AM">Armenien</option>
                                <option value="AW">Aruba</option>
                                <option value="AZ">Aserbaidschan</option>
                                <option value="ET">Äthiopien</option>
                                <option value="AU">Australien</option>
                                <option value="BS">Bahamas</option>
                                <option value="BH">Bahrain</option>
                                <option value="BD">Bangladesh</option>
                                <option value="BB">Barbados</option>
                                <option value="BE">Belgien</option>
                                <option value="BZ">Belize</option>
                                <option value="BJ">Benin</option>
                                <option value="BM">Bermudas</option>
                                <option value="BT">Bhutan</option>
                                <option value="MM">Birma</option>
                                <option value="BO">Bolivien</option>
                                <option value="BA">Bosnien-Herzegowina</option>
                                <option value="BW">Botswana</option>
                                <option value="BV">Bouvet Inseln</option>
                                <option value="BR">Brasilien</option>
                                <option value="IO">Britisch-Indischer Ozean</option>
                                <option value="BN">Brunei</option>
                                <option value="BG">Bulgarien</option>
                                <option value="BF">Burkina Faso</option>
                                <option value="BI">Burundi</option>
                                <option value="CL">Chile</option>
                                <option value="CN">China</option>
                                <option value="CX">Christmas Island</option>
                                <option value="CK">Cook Inseln</option>
                                <option value="CR">Costa Rica</option>
                                <option value="DK">Dänemark</option>
                                <option value="DE">Deutschland</option>
                                <option value="DJ">Djibuti</option>
                                <option value="DM">Dominika</option>
                                <option value="DO">Dominikanische Republik</option>
                                <option value="EC">Ecuador</option>
                                <option value="SV">El Salvador</option>
                                <option value="CI">Elfenbeinküste</option>
                                <option value="ER">Eritrea</option>
                                <option value="EE">Estland</option>
                                <option value="FK">Falkland Inseln</option>
                                <option value="FO">Färöer Inseln</option>
                                <option value="FJ">Fidschi</option>
                                <option value="FI">Finnland</option>
                                <option value="FR">Frankreich</option>
                                <option value="GF">französisch Guyana</option>
                                <option value="PF">Französisch Polynesien</option>
                                <option value="TF">Französisches Süd-Territorium</option>
                                <option value="GA">Gabun</option>
                                <option value="GM">Gambia</option>
                                <option value="GE">Georgien</option>
                                <option value="GH">Ghana</option>
                                <option value="GI">Gibraltar</option>
                                <option value="GD">Grenada</option>
                                <option value="GR">Griechenland</option>
                                <option value="GL">Grönland</option>
                                <option value="UK">Großbritannien</option>
                                <option value="GB">Großbritannien (UK)</option>
                                <option value="GP">Guadeloupe</option>
                                <option value="GU">Guam</option>
                                <option value="GT">Guatemala</option>
                                <option value="GN">Guinea</option>
                                <option value="GW">Guinea Bissau</option>
                                <option value="GY">Guyana</option>
                                <option value="HT">Haiti</option>
                                <option value="HM">Heard und McDonald Islands</option>
                                <option value="HN">Honduras</option>
                                <option value="HK">Hong Kong</option>
                                <option value="IN">Indien</option>
                                <option value="ID">Indonesien</option>
                                <option value="IQ">Irak</option>
                                <option value="IR">Iran</option>
                                <option value="IE">Irland</option>
                                <option value="IS">Island</option>
                                <option value="IL">Israel</option>
                                <option value="IT">Italien</option>
                                <option value="JM">Jamaika</option>
                                <option value="JP">Japan</option>
                                <option value="YE">Jemen</option>
                                <option value="JO">Jordanien</option>
                                <option value="YU">Jugoslawien</option>
                                <option value="KY">Kaiman Inseln</option>
                                <option value="KH">Kambodscha</option>
                                <option value="CM">Kamerun</option>
                                <option value="CA">Kanada</option>
                                <option value="CV">Kap Verde</option>
                                <option value="KZ">Kasachstan</option>
                                <option value="KE">Kenia</option>
                                <option value="KG">Kirgisistan</option>
                                <option value="KI">Kiribati</option>
                                <option value="CC">Kokosinseln</option>
                                <option value="CO">Kolumbien</option>
                                <option value="KM">Komoren</option>
                                <option value="CG">Kongo</option>
                                <option value="CD">Kongo, Demokratische Republik</option>
                                <option value="HR">Kroatien</option>
                                <option value="CU">Kuba</option>
                                <option value="KW">Kuwait</option>
                                <option value="LA">Laos</option>
                                <option value="LS">Lesotho</option>
                                <option value="LV">Lettland</option>
                                <option value="LB">Libanon</option>
                                <option value="LR">Liberia</option>
                                <option value="LY">Libyen</option>
                                <option value="LI">Liechtenstein</option>
                                <option value="LT">Litauen</option>
                                <option value="LU">Luxemburg</option>
                                <option value="MO">Macao</option>
                                <option value="MG">Madagaskar</option>
                                <option value="MW">Malawi</option>
                                <option value="MY">Malaysia</option>
                                <option value="MV">Malediven</option>
                                <option value="ML">Mali</option>
                                <option value="MT">Malta</option>
                                <option value="MP">Marianen</option>
                                <option value="MA">Marokko</option>
                                <option value="MH">Marshall Inseln</option>
                                <option value="MQ">Martinique</option>
                                <option value="MR">Mauretanien</option>
                                <option value="MU">Mauritius</option>
                                <option value="YT">Mayotte</option>
                                <option value="MK">Mazedonien</option>
                                <option value="MX">Mexiko</option>
                                <option value="FM">Mikronesien</option>
                                <option value="MZ">Mocambique</option>
                                <option value="MD">Moldavien</option>
                                <option value="MC">Monaco</option>
                                <option value="MN">Mongolei</option>
                                <option value="MS">Montserrat</option>
                                <option value="NA">Namibia</option>
                                <option value="NR">Nauru</option>
                                <option value="NP">Nepal</option>
                                <option value="NC">Neukaledonien</option>
                                <option value="NZ">Neuseeland</option>
                                <option value="NI">Nicaragua</option>
                                <option value="NL">Niederlande</option>
                                <option value="AN">Niederländische Antillen</option>
                                <option value="NE">Niger</option>
                                <option value="NG">Nigeria</option>
                                <option value="NU">Niue</option>
                                <option value="KP">Nord Korea</option>
                                <option value="NF">Norfolk Inseln</option>
                                <option value="NO">Norwegen</option>
                                <option value="OM">Oman</option>
                                <option value="AT">Österreich</option>
                                <option value="PK">Pakistan</option>
                                <option value="PS">Palästina</option>
                                <option value="PW">Palau</option>
                                <option value="PA">Panama</option>
                                <option value="PG">Papua Neuguinea</option>
                                <option value="PY">Paraguay</option>
                                <option value="PE">Peru</option>
                                <option value="PH">Philippinen</option>
                                <option value="PN">Pitcairn</option>
                                <option value="PL">Polen</option>
                                <option value="PT">Portugal</option>
                                <option value="PR">Puerto Rico</option>
                                <option value="QA">Qatar</option>
                                <option value="RE">Reunion</option>
                                <option value="RW">Ruanda</option>
                                <option value="RO">Rumänien</option>
                                <option value="RU">Russland</option>
                                <option value="LC">Saint Lucia</option>
                                <option value="ZM">Sambia</option>
                                <option value="AS">Samoa</option>
                                <option value="SM">San Marino</option>
                                <option value="ST">Sao Tome</option>
                                <option value="SA">Saudi Arabien</option>
                                <option value="SE">Schweden</option>
                                <option value="CH">Schweiz</option>
                                <option value="SN">Senegal</option>
                                <option value="SC">Seychellen</option>
                                <option value="SL">Sierra Leone</option>
                                <option value="SG">Singapur</option>
                                <option value="SKÄ">Slowakei</option>
                                <option value="SI">Slowenien</option>
                                <option value="SB">Solomon Inseln</option>
                                <option value="SO">Somalia</option>
                                <option value="GS">South Georgia, South Sandwich Isl.</option>
                                <option value="ES">Spanien</option>
                                <option value="LK">Sri Lanka</option>
                                <option value="SH">St. Helena</option>
                                <option value="KN">St. Kitts Nevis Anguilla</option>
                                <option value="PM">St. Pierre und Miquelon</option>
                                <option value="VC">St. Vincent</option>
                                <option value="KR">Süd Korea</option>
                                <option value="ZA">Südafrika</option>
                                <option value="SD">Sudan</option>
                                <option value="SR">Surinam</option>
                                <option value="SJ">Svalbard und Jan Mayen Islands</option>
                                <option value="SZ">Swasiland</option>
                                <option value="SY">Syrien</option>
                                <option value="TJ">Tadschikistan</option>
                                <option value="TW">Taiwan</option>
                                <option value="TZ">Tansania</option>
                                <option value="TH">Thailand</option>
                                <option value="TP">Timor</option>
                                <option value="TG">Togo</option>
                                <option value="TK">Tokelau</option>
                                <option value="TO">Tonga</option>
                                <option value="TT">Trinidad Tobago</option>
                                <option value="TD">Tschad</option>
                                <option value="CZ">Tschechische Republik</option>
                                <option value="TN">Tunesien</option>
                                <option value="TR">Türkei</option>
                                <option value="TM">Turkmenistan</option>
                                <option value="TC">Turks und Kaikos Inseln</option>
                                <option value="TV">Tuvalu</option>
                                <option value="UG">Uganda</option>
                                <option value="UA">Ukraine</option>
                                <option value="HU">Ungarn</option>
                                <option value="UY">Uruguay</option>
                                <option value="UZ">Usbekistan</option>
                                <option value="VU">Vanuatu</option>
                                <option value="VA">Vatikan</option>
                                <option value="VE">Venezuela</option>
                                <option value="AE">Vereinigte Arabische Emirate</option>
                                <option value="US">Vereinigte Staaten von Amerika</option>
                                <option value="VN">Vietnam</option>
                                <option value="VG">Virgin Island (Brit.)</option>
                                <option value="VI">Virgin Island (USA)</option>
                                <option value="WF">Wallis et Futuna</option>
                                <option value="BY">Weißrussland</option>
                                <option value="EH">Westsahara</option>
                                <option value="CF">Zentralafrikanische Republik</option>
                                <option value="ZW">Zimbabwe</option>
                                <option value="CY">Zypern</option>
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
                                <option value="FSK 16">FSK 16</option>
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
                    <!-- FORMAT -->
                    <tr>
                        <td class="td-format">Format</td>
                        <td>
                            <label class="label-format"><?php echo"$format"?></label><br>
                        </td>
                        <td>
                            <select name="format">
                                <option value=""></option>
                                <option value="Digitale Kopie">Digitale Kopie</option>
                                <option value="DVD">DVD</option>
                                <option value="Blu-Ray">Blu-Ray</option>
                            </select>
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

