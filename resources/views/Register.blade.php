@extends('Layout.body')
<title>Travio-Home</title>
@section('content')

<!-- Banner Starts Here -->
<div class="heading-page header-text">
  <section class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="text-content">
            <h4>Register</h4>
            <h2>Get an account and start to explore more!</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Banner Ends Here -->
<section class="contact-us" >
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <div class="down-contact">
          <div class="row">

            <div class="col-lg-3">
            </div>
            <div class="col-lg-6 register">

              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item contact-form">
                    <div class="sidebar-heading">
                      <h2>Register</h2>
                    </div>

                    <div class="content">
                      <form id="contact" action="{{ route('register.check') }}" method="post">
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                          <strong>{{ $message }}</strong>
                          <!-- <button type="button"  data-dismiss="alert">×</button> -->
                        </div>
                        @elseif($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <strong>{{ $message }}</strong>                         
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                          <h5>⚠Noted⚠</h5>
                          <ul>
                           @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                         </ul>                  
                       </div>
                       @endif
                       {{ csrf_field() }}
                       <div class="row">

                         <!-- <div class="row"> -->
                           <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Name</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="name" type="text" id="namne" placeholder="Name" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Email</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Email" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Password</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <input name="password" type="password" id="password" placeholder="Password" >
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <h3>Origin Country</h3>
                            </fieldset>
                          </div>
                          <div class="col-md-12 col-sm-12">
                            <fieldset>      
                              <select id="country" name="country">
                               <option value="afg">Afghanistan</option>
                               <option value="alb">Albania</option>
                               <option value="dza">Algeria</option>
                               <option value="asm">American Samoa</option>
                               <option value="and">Andorra</option>
                               <option value="ago">Angola</option>
                               <option value="aia">Anguilla</option>
                               <option value="atg">Antigua & Barbuda</option>
                               <option value="arg">Argentina</option>
                               <option value="arm">Armenia</option>
                               <option value="abw">Aruba</option>
                               <option value="aus">Australia</option>
                               <option value="aut">Austria</option>
                               <option value="aze">Azerbaijan</option>
                               <option value="bhs">Bahamas</option>
                               <option value="bhr">Bahrain</option>
                               <option value="bgd">Bangladesh</option>
                               <option value="brb">Barbados</option>
                               <option value="blr">Belarus</option>
                               <option value="bel">Belgium</option>
                               <option value="blz">Belize</option>
                               <option value="ben">Benin</option>
                               <option value="bmu">Bermuda</option>
                               <option value="btn">Bhutan</option>
                               <option value="bol">Bolivia</option>
                               <option value="bes">Bonaire</option>
                               <option value="bih">Bosnia & Herzegovina</option>
                               <option value="bwa">Botswana</option>
                               <option value="bra">Brazil</option>
                               <option value="iot">British Indian Ocean Ter</option>
                               <option value="brn">Brunei</option>
                               <option value="bgr">Bulgaria</option>
                               <option value="bfa">Burkina Faso</option>
                               <option value="bdi">Burundi</option>
                               <option value="khm">Cambodia</option>
                               <option value="cmr">Cameroon</option>
                               <option value="can">Canada</option>
                               <option value="cai">Canary Islands</option>
                               <option value="Cape Verde">Cape Verde</option>
                               <option value="cym">Cayman Islands</option>
                               <option value="caf">Central African Republic</option>
                               <option value="tcd">Chad</option>
                               <option value="chi">Channel Islands</option>
                               <option value="chl">Chile</option>
                               <option value="chn">China</option>
                               <option value="cxr">Christmas Island</option>
                               <option value="cck">Cocos Island</option>
                               <option value="col">Colombia</option>
                               <option value="com">Comoros</option>
                               <option value="cog">Congo</option>
                               <option value="cok">Cook Islands</option>
                               <option value="cri">Costa Rica</option>
                               <option value="civ">Cote DIvoire</option>
                               <option value="hrv">Croatia</option>
                               <option value="cub">Cuba</option>
                               <option value="cuw">Curacao</option>
                               <option value="cyp">Cyprus</option>
                               <option value="cze">Czech Republic</option>
                               <option value="dnk">Denmark</option>
                               <option value="dji">Djibouti</option>
                               <option value="dma">Dominica</option>
                               <option value="dom">Dominican Republic</option>
                               <option value="tls">East Timor</option>
                               <option value="ecu">Ecuador</option>
                               <option value="egy">Egypt</option>
                               <option value="slv">El Salvador</option>
                               <option value="gnq">Equatorial Guinea</option>
                               <option value="eri">Eritrea</option>
                               <option value="est">Estonia</option>
                               <option value="eth">Ethiopia</option>
                               <option value="flk">Falkland Islands</option>
                               <option value="fro">Faroe Islands</option>
                               <option value="fji">Fiji</option>
                               <option value="fin">Finland</option>
                               <option value="fra">France</option>
                               <option value="guf">French Guiana</option>
                               <option value="pyf">French Polynesia</option>
                               <option value="atf">French Southern Ter</option>
                               <option value="gab">Gabon</option>
                               <option value="gmb">Gambia</option>
                               <option value="geo">Georgia</option>
                               <option value="deu">Germany</option>
                               <option value="gha">Ghana</option>
                               <option value="gib">Gibraltar</option>
                               <option value="gbr">Great Britain</option>
                               <option value="grc">Greece</option>
                               <option value="grl">Greenland</option>
                               <option value="grd">Grenada</option>
                               <option value="glp">Guadeloupe</option>
                               <option value="gum">Guam</option>
                               <option value="gtm">Guatemala</option>
                               <option value="gin">Guinea</option>
                               <option value="guy">Guyana</option>
                               <option value="hti">Haiti</option>
                               <option value="hwi">Hawaii</option>
                               <option value="hnd">Honduras</option>
                               <option value="hkg">Hong Kong</option>
                               <option value="hun">Hungary</option>
                               <option value="isl">Iceland</option>
                               <option value="idn">Indonesia</option>
                               <option value="ind">India</option>
                               <option value="irn">Iran</option>
                               <option value="irq">Iraq</option>
                               <option value="irl">Ireland</option>
                               <option value="imn">Isle of Man</option>
                               <option value="isr">Israel</option>
                               <option value="ita">Italy</option>
                               <option value="jam">Jamaica</option>
                               <option value="jey">Jersey</option>
                               <option value="jpn">Japan</option>
                               <option value="jor">Jordan</option>
                               <option value="kaz">Kazakhstan</option>
                               <option value="ken">Kenya</option>
                               <option value="kir">Kiribati</option>
                               <option value="prk">Korea North</option>
                               <option value="kor">Korea South</option>
                               <option value="kwt">Kuwait</option>
                               <option value="kgz">Kyrgyzstan</option>
                               <option value="lao">Laos</option>
                               <option value="lva">Latvia</option>
                               <option value="lbn">Lebanon</option>
                               <option value="lso">Lesotho</option>
                               <option value="lbr">Liberia</option>
                               <option value="lby">Libya</option>
                               <option value="lie">Liechtenstein</option>
                               <option value="ltu">Lithuania</option>
                               <option value="lux">Luxembourg</option>
                               <option value="mac">Macau</option>
                               <option value="mkd">Macedonia</option>
                               <option value="mdg">Madagascar</option>
                               <option value="mys">Malaysia</option>
                               <option value="mwi">Malawi</option>
                               <option value="mdv">Maldives</option>
                               <option value="mli">Mali</option>
                               <option value="mlt">Malta</option>
                               <option value="mhl">Marshall Islands</option>
                               <option value="mtq">Martinique</option>
                               <option value="mrt">Mauritania</option>
                               <option value="mus">Mauritius</option>
                               <option value="myt">Mayotte</option>
                               <option value="mex">Mexico</option>
                               <option value="mid">Midway Islands</option>
                               <option value="mda">Moldova</option>
                               <option value="mco">Monaco</option>
                               <option value="mng">Mongolia</option>
                               <option value="msr">Montserrat</option>
                               <option value="mar">Morocco</option>
                               <option value="moz">Mozambique</option>
                               <option value="mmr">Myanmar</option>
                               <option value="nam">Nambia</option>
                               <option value="nru">Nauru</option>
                               <option value="npl">Nepal</option>
                               <option value="nat">Netherland Antilles</option>
                               <option value="nld">Netherlands (Holland)</option>
                               <option value="kna">Nevis</option>
                               <option value="ncl">New Caledonia</option>
                               <option value="nzl">New Zealand</option>
                               <option value="nic">Nicaragua</option>
                               <option value="ner">Niger</option>
                               <option value="nga">Nigeria</option>
                               <option value="niu">Niue</option>
                               <option value="nfk">Norfolk Island</option>
                               <option value="nor">Norway</option>
                               <option value="omn">Oman</option>
                               <option value="pak">Pakistan</option>
                               <option value="plw">Palau Island</option>
                               <option value="pse">Palestine</option>
                               <option value="pan">Panama</option>
                               <option value="png">Papua New Guinea</option>
                               <option value="pry">Paraguay</option>
                               <option value="per">Peru</option>
                               <option value="phl">Philippines</option>
                               <option value="pcn">Pitcairn Island</option>
                               <option value="pol">Poland</option>
                               <option value="prt">Portugal</option>
                               <option value="pri">Puerto Rico</option>
                               <option value="qat">Qatar</option>
                               <option value="mne">Republic of Montenegro</option>
                               <option value="kos">Republic of Serbia</option>
                               <option value="reu">Reunion</option>
                               <option value="rou">Romania</option>
                               <option value="rus">Russia</option>
                               <option value="rwa">Rwanda</option>
                               <option value="blm">St Barthelemy</option>
                               <option value="bes">St Eustatius</option>
                               <option value="shn">St Helena</option>
                               <option value="kna">St Kitts-Nevis</option>
                               <option value="lca">St Lucia</option>
                               <option value="maf">St Maarten</option>
                               <option value="spm">St Pierre & Miquelon</option>
                               <option value="vig">St Vincent & Grenadines</option>
                               <option value="spn">Saipan</option>
                               <option value="wsm">Samoa</option>
                               <option value="asm">Samoa American</option>
                               <option value="smr">San Marino</option>
                               <option value="stp">Sao Tome & Principe</option>
                               <option value="sau">Saudi Arabia</option>
                               <option value="sen">Senegal</option>
                               <option value="syc">Seychelles</option>
                               <option value="sle">Sierra Leone</option>
                               <option value="sgp">Singapore</option>
                               <option value="svk">Slovakia</option>
                               <option value="svn">Slovenia</option>
                               <option value="slb">Solomon Islands</option>
                               <option value="som">Somalia</option>
                               <option value="zaf">South Africa</option>
                               <option value="esp">Spain</option>
                               <option value="lka">Sri Lanka</option>
                               <option value="sdn">Sudan</option>
                               <option value="sur">Suriname</option>
                               <option value="swz">Swaziland</option>
                               <option value="swe">Sweden</option>
                               <option value="che">Switzerland</option>
                               <option value="syr">Syria</option>
                               <option value="tht">Tahiti</option>
                               <option value="twn">Taiwan</option>
                               <option value="tjk">Tajikistan</option>
                               <option value="tza">Tanzania</option>
                               <option value="tha">Thailand</option>
                               <option value="tgo">Togo</option>
                               <option value="tkl">Tokelau</option>
                               <option value="ton">Tonga</option>
                               <option value="tto">Trinidad & Tobago</option>
                               <option value="tun">Tunisia</option>
                               <option value="tur">Turkey</option>
                               <option value="tkm">Turkmenistan</option>
                               <option value="tca">Turks & Caicos Island</option>
                               <option value="tuv">Tuvalu</option>
                               <option value="uga">Uganda</option>
                               <option value="gbr">United Kingdom</option>
                               <option value="ukr">Ukraine</option>
                               <option value="are">United Arab Emirates</option>
                               <option value="usa">United States of America</option>
                               <option value="ury">Uruguay</option>
                               <option value="uzb">Uzbekistan</option>
                               <option value="vat">Vanuatu</option>
                               <option value="vct">Vatican City State</option>
                               <option value="ven">Venezuela</option>
                               <option value="vnm">Vietnam</option>
                               <option value="vgb">Virgin Islands (British)</option>
                               <option value="vir">Virgin Islands (USA)</option>
                               <option value="wak">Wake Island</option>
                               <option value="wlf">Wallis & Futana Island</option>
                               <option value="yem">Yemen</option>
                               <option value="zai">Zaire</option>
                               <option value="zmb">Zambia</option>
                               <option value="zwe">Zimbabwe</option>
                             </select>
                           </fieldset>
                         </div>
                         <div class="col-md-12 col-sm-12">
                            <fieldset>
                              <a href="{{ route('login') }}">Already Registered? Login Now</a>
                            </fieldset>
                          </div>
                         <div class="col-lg-12 text-center">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Register</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                  
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
</section>
@endsection