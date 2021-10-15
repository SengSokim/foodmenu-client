@extends('home.main')
@section('content')
<main id="register">
    <div class="hero-wrap js-fullheight" id="home" style="background-color: rgb(247, 170, 54);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
          <div class="col-md-7 ftco-animate">
            <span class="subheading">Welcome to Emenu</span>
            <h1 class="mb-4">We Are Online Platform For Make Learn</h1>
            <p class="caps">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            <p class="mb-0">
              <a href="{{ route('auth.login') }}" class="btn btn-primary">Log In</a>
              <a href="#" class="btn btn-white">Guideline</a></p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt" id="home">
      <div class="container">
        <div class="row">
          <div class="col-md-7"></div>
          <div class="col-md-5 order-md-last">
            <div class="login-wrap p-4 p-md-5">
              <h3 class="mb-4">Register Now</h3>
              <form @submit.prevent="" action="{{ url('auth/register') }}" class="signup-form" method="POST">
                @csrf
                @php $error = session()->get('error'); @endphp

              <div class="form-group">
                <label class="required">Restaurant Name</label>
                <input type="text" class="form-control" :class="{'is-invalid' : errors.first('restaurant_name')}" v-validate="'required'" v-model="data.restaurant_name" data-vv-as="restaurant name"  name="restaurant_name">
                <span class="invalid-feedback">@{{ errors.first('restaurant_name') }}</span>
              </div>
              <div class="form-group">
                <label class="required">Phone Number</label>
                <input type="text" class="form-control" :class="{'is-invalid' : errors.first('phone_number')}" v-validate="'required'" v-model="data.phone_number" data-vv-as="phone number"  name="phone_number">
                <span class="invalid-feedback">@{{ errors.first('phone_number') }}</span>
              </div>
              <div class="form-group">
                <label class="required">Password</label>
                <input type="password" class="form-control" :class="{'is-invalid' : errors.first('password')}" v-validate="'required'" v-model="data.password" name="password">
                <span class="invalid-feedback">@{{ errors.first('password') }}</span>
              </div>
                <div class="form-group d-flex justify-content-end mt-4">
                  <button type="button" class="btn btn-primary submit" @click="submitVerify()">Register</button>
                </div>
              </form>
              <p class="text-center">Already have an account? <a href="{{ route('auth.login') }}">Login Here</a></p>
            </div>
            <div class="modal fade" id="modalVerify" tabindex="-1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Verify Code</h5>
                  </div>
                  <div class="modal-body">
                    <input type="text" class="form-control" :class="{'is-invalid' : errors.first('verify_code')}" v-model="data.verify_code" class="form-control" name="verify_code" placeholder="Code">
                    <span class="invalid-feedback">@{{ errors.first('verify_code') }}</span>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="button" @click="submitRegister()" class="btn btn-primary btn-sm">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="modalLogin" tabindex="-1" aria-hidden="true" data-keyboard="false" data-backdrop="static">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Already Registered</h5>
                  </div>
                  <div class="modal-body">
                    This phone is already registered. please login instead
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('auth.login') }}" class="btn btn-primary btn-sm">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-about img" id="about">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-12 about-intro">
            <div class="row">
              <div class="col-md-6 d-flex">
                <div class="d-flex about-wrap">
                  <div style=" width: 100%;height: 100%;">
                    <iframe width="100%" height="400px" src="https://www.youtube.com/embed/30Jeg25bClc"
                      title="YouTube video player" frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen>
                    </iframe> 
                  </div>
                  <div class="img-2 d-flex align-items-center justify-content-center"></div>
                </div>
              </div>

              <div class="col-md-6 pl-md-5 py-5">
                <div class="row justify-content-start pb-3">
                  <div class="col-md-12 heading-section ftco-animate">
                    <span class="subheading">About Us</span>
                    <h2 class="mb-4">What Is E-Menu ?</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and
                      Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                      right at the coast of the Semantics, a large language ocean. A small river named
                      Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn btn-primary">Get in touch with us</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section services-section" id="features">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 heading-section pr-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100 mb-4 mb-md-0">
                        <span class="subheading">Features</span>
                        <h2 class="mb-4">Why Choose E-Menu?</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.
                            It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                            Semantics, a large language ocean.</p>
                        <!-- <div class="d-flex video-image align-items-center mt-md-4">
              <a href="#" class="video img d-flex align-items-center justify-content-center" style="background-image: url(images/about.jpg);">
                  <span class="fa fa-play-circle"></span>
              </a>
              <h4 class="ml-4">Learn anything from StudyLab, Watch video</h4> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="flaticon-tools"></span></div>
                            <div class="media-body">
                                <h3 h3 class="heading mb-3">Top Quality Content</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon icon-2 d-flex align-items-center justify-content-center"><span
                                    class="flaticon-instructor"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Highly Skilled Instructor</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div class="icon icon-3 d-flex align-items-center justify-content-center"><span
                                    class="flaticon-quiz"></span></div>
                            <div class="media-body">
                                <h3 class="heading mb-3">World Class &amp; Quiz</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="services">
                            <div><img src="images/1076182.png" alt=""
                                    style="width: 60px;border-radius: 360px;padding: 15px;background-color: rgb(250, 81, 2);">
                            </div>
                            <div class="media-body">
                                <h3 class="heading mb-3">Secure stornge</h3>
                                <p>A small river named Duden flows by their place and supplies</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url(images/about-img2.png);">
        <p style="text-align: center;font-size: 50px;font-weight: bold; color: #fff;">Ready to start your online
            Restaurant? </p>
        <div class="overlay"></div>
    </section>

    <section class="ftco-section bg-light" id="home">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Start Learning Today</span>
                    <h2 class="mb-4">Pick Your Course</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <!-- <a href="#" class="img" style="background-image: url(images/work-1.jpg);"> -->

                        <iframe src="https://www.youtube.com/embed/3vJ6kN5H7FA" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <!-- <span class="price">Software</span> -->
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                        <li><span class="flaticon-shower"></span>2300</li>
                        <li class="price">$199</li>
                    </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY?playlist=tgbNymZ7vqY&loop=1">
                        </iframe>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                    <li><span class="flaticon-shower"></span>2300</li>
                    <li class="price">$199</li>
                </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <iframe src="https://www.youtube.com/embed/3vJ6kN5H7FA" title="YouTube video player"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
            </ul> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(images/work-4.jpg);">
                            <!-- <span class="price">Software</span> -->
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(images/work-5.jpg);">
                            <!-- <span class="price">Software</span> -->
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
            </ul> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url(images/work-6.jpg);">
                            <!-- <span class="price">Software</span> -->
                        </a>
                        <div class="text p-4">
                            <h3><a href="#">Design for the web with adobe photoshop</a></h3>
                            <!-- <p class="advisor">Advisor <span>Tony Garret</span></p> -->
                            <!-- <ul class="d-flex justify-content-between">
                <li><span class="flaticon-shower"></span>2300</li>
                <li class="price">$199</li>
            </ul> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="ftco-section testimony-section bg-light" id="about">
        <div class="overlay" style="background-image: url(images/about-img2.png);"></div>
        <div class="container">
            <div class="row pb-4">
                <div class="col-md-7 heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-4">What Buyers Says About Us</h2>
                </div>
            </div>
        </div>
        <div class="container container-2">
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
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

    <section class="ftco-intro ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url(images/banner3.png);">
                        <div class="overlay"></div>
                        <h2>We Are StudyLab An Online Learning Center</h2>
                        <p>We can manage your dream building A small river named Duden flows by their place</p>
                        <p class="mb-0"><a href="#" class="btn btn-primary px-4 py-3">Enroll Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-warpper" id="pricing">
        <div class="col-md-12 heading-section text-center ftco-animate ">
            <h2 class="mb-4">PRICING</h2>
            <span class="pricing-subheading">Emenu powers teams all around the world. <br>
                Explore which option is right for you.</span>

        </div>
        <center>
            <div class="wrapper ">
                <div class="pricing-table gprice-single ftco-animate">
                    <div class="head">
                        <h4 class="title">Basic</h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <h1>FREE</h1>
                        </div>
                        <ul>
                            <li>5 GB Ram</li>
                            <li>40GB SSD Cloud Storage</li>
                            <li>Month Subscription</li>
                            <li>Responsive Framework</li>
                            <li> <del>Monthly Billing Software</del> </li>
                            <li> <del>1 Free Website</del></li>

                        </ul>
                        <div class="sign-up">
                            <a href="#" class="btn bordered radius">Signup Now</a>
                        </div>
                    </div>
                </div>
                <div class="pricing-table gprice-single ftco-animate">
                    <div class="head">
                        <h4 class="title">Standard</h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <h1>$70</h1>
                        </div>
                        <ul>
                            <li>5 GB Ram</li>
                            <li>40GB SSD Cloud Storage</li>
                            <li>Month Subscription</li>
                            <li>Responsive Framework</li>
                            <li>Monthly Billing Software</li>
                            <li><del>1 Free Website</del></li>

                        </ul>
                        <div class="sign-up">
                            <a href="#" class="btn bordered radius">Signup Now</a>
                        </div>
                    </div>
                </div>
                <div class="pricing-table gprice-single ftco-animate">
                    <div class="head">
                        <h4 class="title">Premium</h4>
                    </div>
                    <div class="content">
                        <div class="price">
                            <h1>$120</h1>
                        </div>
                        <ul>
                            <li>5 GB Ram</li>
                            <li>40GB SSD Cloud Storage</li>
                            <li>Month Subscription</li>
                            <li>Responsive Framework</li>
                            <li>Monthly Billing Software</li>
                            <li>1 Free Website</li>
                        </ul>
                        <div class="sign-up">
                            <a href="#" class="btn bordered radius">Signup Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </section>
</main>

@endsection
