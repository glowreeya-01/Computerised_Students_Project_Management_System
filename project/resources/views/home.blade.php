<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="assets/css/index1.css">
    {{-- <link rel="fal" href="assets/css/index1.css"> --}}
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="css/style2.css"> -->
    <title>CSPMA</title>
</head>

<body>
    <div class="performance">
        <nav>
            <div class="logo">CSPMS</div>
            @if (session('error'))
                <div class="alert alert-danger" style="
                background: red;
                border-radius: 10px;
                padding: 10px;
            ">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success" style="
                background: green;
                border-radius: 10px;
                padding: 10px;
            ">
                    {{ session('status') }}
                </div>
            @endif
            <div class="menu">
                <button class="hamburger">&#9783</button>
                <!-- <li><a href="">Home</a></li> -->
                <li><a href="{{ route('about') }}">About</a></li>
                <!-- <li><a href="">Contact</a></li> -->
                @auth
                    
                <li><a class="btnd " href="{{ route('dash') }}">My Account</a></li>
                <li>
                    <a class="btnd" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>  
                </li>
                @else
                <li><a class="btnd " href="{{ route('login') }}">Login</a></li>
                <li><a class="btnd" href="{{ route('register') }}">Sign Up</a></li>

                @endauth

            </div>
        </nav>


        <div class="performance__wrap">
            <div class="performance__text">
                <h1>A PERFORMANCE-DRIVEN PROJECT MANAGEMENT AGENCY For Instutitions </h1>
                <p class="">the Project was created by Gloria - 2016/324245 </p>
                <p class="performance__text--paragraph">Start Academic Collaboration with Confidence</p>
                <div class="performance__button">
                     <a class="get-start" href="{{ route('register') }}">Let's get Started</a>
                        
                    <!-- <button>Contact Sales</button> -->
                </div>

            </div>
            <img src="assets/img/Group 16.svg" alt="">
        </div>
    </div>


    <div class="we">
        <span class="we-circle"></span>
        <img class="we__circle" src="assets/img/Ellipse 3.svg" alt="">
        <div class="whatwe">
            <div class="allocate">
                <img src="assets/img/Group 6.svg" alt="">
                <span>Project Allocation</span>
            </div>
            <div class="allocate">
                <img src="assets/img/Group 7.svg" alt="">
                <span>Registration</span>
            </div>
            <div class="allocate">
                <img src="assets/img/Group 4.svg" alt="">
                <span>Submission and Grading</span>
            </div>
            <div class="allocate">
                <img src="assets/img/Group 5.svg" alt="">
                <span>Allows Communication</span>
            </div>
            <div class="allocate">
                <img src="assets/img/Group 3 (1).svg" alt="">
                <span>Uploads and Downloads</span>
            </div>
            <div class="allocate">
                <img src="assets/img/Group 8.svg" alt="">
                <span>Sharing of Files</span>
            </div>
        </div>
        <!-- Mobile view -->
        <div class="wemobile">
            <div class="group1">
                <div class="allocate">
                    <img src="assets/img/Group 6.svg" alt="">
                    <span>Project Allocation</span>
                </div>
                <div class="allocate">
                    <img src="assets/img/Group 7.svg" alt="">
                    <span>Registration</span>
                </div>
            </div>
            <div class="group2">
                <div class="allocate">
                    <img src="assets/img/Group 4.svg" alt="">
                    <span>Submission and Grading</span>
                </div>
                <div class="allocate">
                    <img src="assets/img/Group 5.svg" alt="">
                    <span>Allows Communication</span>
                </div>
            </div>
            <div class="group3">
                <div class="allocate">
                    <img src="assets/img/Group 3 (1).svg" alt="">
                    <span>Uploads and Downloads</span>
                </div>
                <div class="allocate">
                    <img src="assets/img/Group 8.svg" alt="">
                    <span>Sharing of Files</span>
                </div>
            </div>
        </div>

    </div>


    <div class="container">


        <div class="client">
            <h2>UNIVERSITIES AND INSTUTITIONS WE WORK WITH</h2>
            <div class="client__btn">
                <img class="client__logo" src="{{ asset('assets/img/covenant.png') }}" alt="">
                <img class="client__logo" src="{{ asset('assets/img/images (1).png') }}" alt="">
                <img class="client__logo" src="{{ asset('assets/img/images (2).png') }}" alt="">
                <img class="client__logo" src="{{ asset('assets/img/images.png') }}" alt="">

            </div>
        </div>


        <h2 class="studies">CASE STUDIES</h2>
        <section id="testim" class="testim">
            <!--         <div class="testim-cover"> -->
            <div class="wrap">

                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
                <ul id="testim-dots" class="dots">
                    <li class="dot active"></li>
                    <!--
                        -->
                    <li class="dot"></li>
                    <!--
                        -->
                    <li class="dot"></li>
                    <!--
                        -->
                    <li class="dot"></li>
                    <!--
                        -->
                    <li class="dot"></li>
                </ul>
                <div id="testim-content" class="cont">

                    <div class="active">
                        <div class="img"><img src="https://image.ibb.co/hgy1M7/5a6f718346a28820008b4611_750_562.jpg"
                                alt=""></div>
                        <h2>Lorem P. Ipsum</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/cNP817/pexels_photo_220453.jpg" alt=""></div>
                        <h2>Mr. Lorem Ipsum</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/iN3qES/pexels_photo_324658.jpg" alt=""></div>
                        <h2>Lorem Ipsum</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/kL6AES/Top_SA_Nicky_Oppenheimer.jpg" alt="">
                        </div>
                        <h2>Lorem De Ipsum</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                    </div>

                    <div>
                        <div class="img"><img src="https://image.ibb.co/gUPag7/image.jpg" alt=""></div>
                        <h2>Ms. Lorem R. Ipsum</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.
                        </p>
                    </div>

                </div>

            </div>
        </section>



        <div class="about">
            <div class="about__paragraph">
                <h2>ABOUT US</h2>
                <p>CSPMS is an academic project management system that enables communication and team work between
                    academic supervisors and students.</p>
                <button class="about__button">More</button>
            </div>
            <div class="about__img">
                <img src="{{ asset('assets/img/blackpeople.PNG')}}" alt="">
            </div>
        </div>
        <!-- closing div for container -->
    
        <div class="about">
            <div class="about__paragraph">
                <h2>ABOUT ME</h2>
                <p>CSPMS is an academic project management system that enables communication and team work between
                    academic supervisors and students.</p>
                {{-- <button class="about__button">More</button> --}}
            </div>
            <div class="about__img">
                <img src="{{ asset('assets/img/gloria.png')}}" alt="">
            </div>
        </div>
        <!-- closing div for container -->
    </div>

    <footer>
        <div class="footertext">
            <div class="locate">
                <h2>CONTACT US</h2>
                <p class="locate__title">Locate Us</p>
                <p>3 Birrel Avenue,Sabo. Yaba, Lagos State, Nigeria</p>
            </div>

            <div class="hear">
                <p class="hear__title">Hear from Us</p>
                <p class="hear__paragraph">hello@hng.tech</p>
                <p class="hear__number">+234 (0) 812 345 6789</p>
            </div>

            <div class="footer__icons">

            </div>
        </div>

        <div class="footerform">
            <h2>Message Us</h2>
            <input type="name" placeholder="Name">
            <input type="email" placeholder="Email">
            <input type="message" placeholder="Message">


            <button>Send Message</button>

        </div>

    </footer>
    <script src="https://use.fontawesome.com/1744f3f671.js"></script>
    <script src="js/index.js"></script>
</body>

</html>