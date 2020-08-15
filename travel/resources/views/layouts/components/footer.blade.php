<footer class="up">
    <div class="container margin_80_0">
        <section class="noborder-bottom padding-bottom-20 padding-top-40">
            <div class="container">
                <p class="lead"><b></b>Would You like one of our <strong>Xpertz</strong> to contact you about your
                    next travel <strong>Xperience</strong>? Fill out the form below and one of our
                    <strong>Xpertz</strong> will ensure your next trip is the <strong>Xperience</strong> of a
                    <strong>Lifetime!</strong>
                </p>
                <div class="divider divider-center divider-color">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <form action="/leads" method="post">
                {{csrf_field()}}
                <fieldset>
                    <input type="hidden" name="action" value="contact_send">
                    <input type="hidden" name="prev" value="{{ Request::url() }}">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="username">First Name <span class="hide-on text-danger">*</span></label>
                            <input required="" type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lastname">Last Name <span class="hide-on text-danger">*</span></label>
                            <input required="" type="text" class="form-control" name="lastname">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="phone">Phone <span class="hide-on text-danger">*</span></label>
                            <input type="text" class="form-control required" name="phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email <span class="hide-on text-danger">*</span></label>
                            <input required="" type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="code">Postal/Zip Code <span class="hide-on text-danger">*</span></label>
                            <input required="" type="text" class="form-control" name="code">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Province/State <span class="hide-on text-danger">*</span></label>
                            <select class="form-control pointer" name="city" required="">
                                <option value="">--- Select ---</option>
                                <option value="AB">Alberta</option>
                                <option value="BC">British Columbia</option>
                                <option value="MB">Manitoba</option>
                                <option value="NB">New Brunswick</option>
                                <option value="NL">Newfoundland and Labrador</option>
                                <option value="NT">Northwest Territories</option>
                                <option value="NS">Nova Scotia</option>
                                <option value="NU">Nunavut</option>
                                <option value="ON">Ontario</option>
                                <option value="PE">Prince Edward Island</option>
                                <option value="QC">Quebec</option>
                                <option value="SK">Saskatchewan</option>
                                <option value="YT">Yukon</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <div class="divider divider-center divider-color">
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <p class="lead">Tell us about your trip? (<strong>Optional</strong>)</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Destination</label>
                            <input type="text" class="form-control required" name="destination" id="field10">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">No. of Passengers </label>
                            <input type="number" class="form-control required" name="num_passengers" id="field9">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Budget (Per Passenger) </label>
                            <input type="text" class="form-control required" name="budget" id="field11">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="username">Departure Date</label>
                            <input type="text" class="form-control datepicker required" name="departure" id="field8">
                        </div>
                    </div>
                    <div>
                        <div class="col-md-12">
                            <div class="divider divider-center divider-color">
                                <i class="fa fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="g-recaptcha"
                                     data-sitekey="6LfWpz8UAAAAAHMt4A28TRSm-FOgwpL-kAAEx8i_"></div>
                            </div>
                            <br>

                        </div>
                    </div>
                </fieldset>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>CONTACT ME</button>
                    </div>
                </div>
            </form>
        </section>
    </div>

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-5 col-md-12 p-r-5">
                <p><img src="{{ str_replace("travel-files.s3.amazonaws.com", "d2wg9vs674sg0m.cloudfront.net",$destination->logo) }}" height="40" data-retina="true" alt=""> A Division of Trip Xpertz</p>
                <p>#1003-55 York Street, Toronto, ON, M5J 1R7</p>
                    <p>TICO registration number #: 50021282</p>
                <div class="follow_us">
                    <ul>
                        <li>FOLLOW US</li>
                        <li><a href="https://www.facebook.com/usaxpertz"><i class="ti-facebook"></i></a></li>
                        <li><a href="http://www.twitter.com/usaxpertz"><i class="ti-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UChe1Gvgoi_D2vT0KC77XpRg"><i class="ti-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ml-lg-auto">
                <h5>EXPLORE US</h5>
                <ul class="links">
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/privacy">Privacy Policy</a></li>
                    <li><a href="/terms">Terms & Conditions </a></li>

                    <!--
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="blog.html">News &amp; Events</a></li>
                    <li><a href="contacts.html">Contacts</a></li>
                    -->
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Contact with Us</h5>
                <ul class="contacts">
                    <li><a href=""><i class="ti-mobile"></i> 1855 212 8263</a></li>
                    <li><a href="mailto:{{$destination->email}}"><i class="ti-email"></i>{{$destination->email}}</a></li>
                </ul>
            </div>

        </div>
        <!--/row-->
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <ul>
                    <li><a>© All Rights Reserved, {{$destination->name}}Xpertz.com</a></li>
                </ul>
            </div>

            <div class="col-lg-6">
                <ul id="additional_links">
                    <li><a href="">Terms and conditions</a></li>
                    <li><a href="">Privacy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
