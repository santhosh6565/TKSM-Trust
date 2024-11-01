<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trust</title>
        <!-- Google Fonts: Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="style.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous">
        <!-- Tailwind CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            /* Apply Poppins font globally */
            body {
                font-family: 'Poppins', sans-serif;
            }

            /* Styling for active link */
            .active {
                color: #ff5733;
            }

            /* section {
            padding: 50px;
        } */
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    </head>
    <body class="">
        <!-- Navbar -->
        <div class="navbar ">
            <nav class="bg-white fixed w-full top-0 shadow-md z-50 p-3 lg:px-[120px]">
                <div class="container mx-auto px-4  flex justify-between items-center">
                    <a href="#" class="text-xl  font-semibold">
                        <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo.webp" class="w-[120px] lg:w-[160px]" alt="">
                    </a>
                    <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <div class="hidden lg:flex space-x-[70px]" id="menu">
                        <a href="#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                        <a href="#contributions" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                        <!-- <a href="index.html#members"
                        class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Members</a> -->
                        <a href="#contact" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
                        <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Gallery</a>
                        <a href="{{ route('donations') }}" class="block text-white bg-orange-400 px-8 py-2 rounded-full transition duration-300  hover:bg-orange-500">Donate</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Mobile Menu -->
        <div class="lg:hidden hidden fixed bg-white w-full pt-[90px] z-10" id="mobile-menu">
            <div class="text-center">
                <a href="index.html#about" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">About</a>
                <a href="index.html#contributions" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contributions</a>
                <!-- <a href="index.html#members" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Members</a> -->
                <a href="index.html#contact" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contact</a>
                <a href="donate.html" class="block text-gray-700 py-2 pl-4 bg-orange-400 text-white py-3 hover:bg-orange-500">Donate</a>
            </div>
        </div>
        </nav>
        </div>
        <!-- Sections for navigation -->
        <div class="z-10 bottom-[40px] left-[30px] fixed flex">
            <a href="https://wa.me/919940700250" target="_blank">
                <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/wapp.png" class="w-[60px] lg:w-[80px] " alt="">
            </a>
            <h1 class="mt-2 bg-gray-100 h-fit px-4 py-2 rounded-full text-[9px] lg:text-[15px] shadow-lg">Chat with us on WhatsApp !</h1>
        </div>
        <section id="home" class="bg-white text-white">
            <!-- <h1 class="text-4xl mt-10">Home Section</h1> -->
            <div>
                <div class="container mt-20 mx-auto flex flex-col lg:flex-row items-center lg:items-start justify-between h-fit lg:p-8 rounded-lg">
                    <!-- Text Div -->
                    <div class="text-left  w-full lg:w-3/5 mb-8 lg:mb-0 ">
                        <div class="" data-aos="fade-up" data-aos-duration="2000">
                            <div>
                                <h2 class="text-center lg:text-start text-4xl  lg:text-[70px] lg:w-[630px] font-semibold text-black  leading-tight"> Lets Ensure A Better Future For The Ones In Need </h2>
                                <p class=" text-center text-[15px] lg:text-lg pt-7 lg:text-start lg:pt-[40px] lg:pr-[100px] text-gray-600"> Your Support Today Can Bring Lasting Change and Hope to Those in Need Tomorrow. </p>
                                <div class="lg:pt-[50px] flex justify-center items-center lg:justify-start">
                                    <div class="px-2 py-6 rounded-full hover:bg-orange-200">
                                        <a href="donate.html" class="lg:text-[20px] mt-[30px] lg:mt-0 text-center lg:text-start font-medium bg-orange-400 px-6 py-4 rounded-full">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Image Div -->
                    <div class="w-full lg:w-2/5" data-aos="fade-up" data-aos-duration="2000">
                        <div class="">
                            <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/hero.webp" alt="Sample Image" class="w-full shadow-lg h-auto rounded-lg ">
                        </div>
                    </div>
                </div>
                <div class="container mx-auto mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:pt-[120px] gap-8" id="counter-section">
                    <!-- Total Events Counter -->
                    <div class="bg-white  md:border-r-2 p-4 text-center">
                        <p class="text-[50px] lg:text-4xl xl:text-[55px] font-bold text-black" id="total-events">0+</p>
                        <p class="mt-2 text-lg lg:text-2xl font-medium text-orange-400">Total Events</p>
                    </div>
                    <!-- Total Money Raised Counter -->
                    <div class="bg-white    md:border-r-2 p-4 text-center">
                        <p class="text-[50px] lg:text-4xl xl:text-[55px] font-bold text-black" id="total-money">0+</p>
                        <p class="mt-2 text-lg lg:text-2xl font-medium text-orange-400">Money Raised</p>
                    </div>
                    <!-- People Helped Counter -->
                    <div class="bg-white    md:border-r-2  p-4 text-center">
                        <p class="text-[50px] lg:text-4xl xl:text-[55px] font-bold text-black" id="people-helped">0+</p>
                        <p class="mt-2 text-lg lg:text-2xl font-medium text-orange-400">People Helped</p>
                    </div>
                    <!-- Years in Service Counter -->
                    <div class="bg-white p-4 text-center">
                        <p class="text-[50px] lg:text-4xl xl:text-[55px] font-bold text-black" id="years-service">0+</p>
                        <p class="mt-2 text-lg lg:text-2xl font-medium text-orange-400">Months in Service</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="px-4">
            <a href="{{ route('Event') }}">
                <div class="flex items-center justify-between p-4 bg-orange-400 rounded-lg shadow-md shadow-orange-500">
                    <h2 class="text-2xl font-semibold text-orange-700">Upcoming Events:</h2>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-16 h-16 bg-orange-200 text-orange-700 rounded-full mr-4">
                            <span class="text-2xl font-bold">{{ $upcomingEventCount }}</span>
                        </div>
                        <div class="animate-bounce">
                            <i class="fas fa-arrow-up w-8 h-8 text-orange-500"></i>
                        </div>
                    </div>
                </div>
            </a>
        </section>
        <section id="about" class="bg-white mb-10">
            <div class="lg:mx-10 lg:mt-20 lg:flex " data-aos="fade-up" data-aos-duration="2000">
                <div class="lg:w-1/2 flex justify-center items-center">
                    <div class="w-[400px] h-[270px] lg:w-[600px] lg:h-[500px] bg-gray-100 rounded-xl flex justify-center items-center relative">
                        <!-- <a href="https://player.vimeo.com/external/488076225.hd.mp4?s=9cf4808c4e76c0a9267abb75dbec48bc451a138f&amp;profile_id=175"
                            class="glightbox_video"><svg width="131" height="131" viewBox="0 0 131 131" fill="none"
												xmlns="http://www.w3.org/2000/svg"><path class="inner-circle"
                                    d="M65 21C40.1488 21 20 41.1488 20 66C20 90.8512 40.1488 111 65 111C89.8512 111 110 90.8512 110 66C110 41.1488 89.8512 21 65 21Z"
                                    fill="white"></path><circle class="outer_circle" cx="65.5" cy="65.5" r="64" stroke="white"></circle><path class="play" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M60 76V57L77 66.7774L60 76Z" fill="#BF2428"></path></svg></a> -->
                        <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/about-1.webp" alt="">
                    </div>
                </div>
                <div class="lg:w-1/2 lg:px-10">
                    <h1 class="font-semibold  md:mx-[10px] border-b-[5px] border-orange-400  text-3xl w-fit mt-7 lg:mt-0 md:text-[50px]"> About Us</h1>
                    <p class="text-justify lg:text-start py-6 lg:py-10 text-lg"> Thirukulandhai Sri Mayan Charitable Trust is a non-profit organization dedicated to uplifting and supporting underprivileged communities. Our mission is to provide essential services such as healthcare, education, and disaster relief to those in need, empowering individuals and families to build a brighter and more secure future. We believe in creating sustainable change by addressing both immediate needs and long-term development. Through various initiatives, we strive to offer hope, care, and opportunities to those who are often left behind. By working together with generous donors and compassionate volunteers, we can make a meaningful difference in the lives of many. <br />
                        <br /> Join us in our journey of making the world a better place, one step at a time. Together, we can transform lives and communities for the better.
                    </p>
                    <div class="lg:mt-4">
                        <a href="./Trust-book.pdf" class="bg-orange-400 px-5 lg:text-xl py-3 text-white" download="Thirukulandhai_Charitable_Trust_About.pdf">Know More</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="contributions" class="bg-white mb-10 p-4">
            <!-- <h2 class="text-3xl text-center font-semibold mb-8">Our Contributions</h2> -->
            <div class="flex justify-center items-center my-10 lg:my-20" data-aos="fade-up" data-aos-duration="2000">
                <h1 class="font-semibold border-b-[5px] border-orange-400 text-3xl w-fit mt-7 lg:mt-0 md:text-[50px] ">Our Contributions</h1>
            </div>
            <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Contribution Box 1: Education -->
                <div class=" rounded-lg shadow-md flex flex-col items-center p-4" data-aos="fade-up" data-aos-duration="2000">
                    <h3 class="text-3xl font-semibold mb-4" style="color: #272c49;">Education</h3>
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/edu.webp" alt="Education" class="w-full h-auto lg:h-[400px] object-cover rounded-md mb-4">
                    <p class="text-center">We provide educational resources and support to children in need.</p>
                </div>
                <!-- Contribution Box 2: Food Donation -->
                <div class="rounded-lg shadow-md flex flex-col items-center p-4" data-aos="fade-up" data-aos-duration="2000">
                    <h3 class="text-3xl font-semibold mb-4 text-orange-400" style="color: #272c49;">Food Donation</h3>
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/food.webp" alt="Food Donation" class="w-full h-auto lg:h-[400px] object-cover rounded-md mb-4">
                    <p class="text-center">Our team ensures that no one goes hungry by distributing food to those in need.</p>
                </div>
                <!-- Contribution Box 3: Helping Elderly -->
                <div class=" rounded-lg shadow-md flex flex-col items-center p-4" data-aos="fade-up" data-aos-duration="2000">
                    <h3 class="text-3xl font-semibold mb-4 text-orange-400" style="color: #272c49;">Helping Elderly</h3>
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/elderly.webp" alt="Helping Elderly" class="w-full h-auto lg:h-[400px] object-cover rounded-md mb-4">
                    <p class="text-center">We assist the elderly with care and companionship, enhancing their quality of life.</p>
                </div>
            </div>
        </section>
        <section class="carousel mt-20 bg-[#272c49]">
            <div class="flex justify-center items-center mb-10" data-aos="fade-up" data-aos-duration="2000">
                <h1 class="font-semibold border-b-[5px] border-orange-400 text-3xl w-fit mt-7 text-white lg:mt-0 md:text-[50px]"> Our Works </h1>
            </div>
            <div class="relative overflow-hidden w-full">
                <div class="flex transition-transform duration-500 ease-in-out" id="carouselSlides">
                    @foreach($events as $event)
                        <div class="w-full flex-shrink-0 lg:flex items-center justify-center">
                            <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" alt="{{ $event->title }}" class="w-full lg:w-[1000px] rounded-lg h-80 lg:h-[500px] object-cover">
                        </div>
                    @endforeach
                </div>
                <button class="absolute top-1/2 left-1 lg:left-[150px] transform -translate-y-1/2 lg:w-[50px] bg-white text-black p-2 rounded-full lg:text-2xl" id="prevButton"> &#10094; </button>
                <button class="absolute top-1/2 right-1 lg:right-[150px] transform -translate-y-1/2 lg:w-[50px] bg-white text-black p-2 rounded-full lg:text-2xl" id="nextButton"> &#10095; </button>
            </div>
            <div class="flex justify-center mt-4 space-x-3">
                @foreach($events as $index => $event)
                    <span class="w-3 h-3 bg-gray-400 rounded-full cursor-pointer" data-slide="{{ $index + 1 }}"></span>
                @endforeach
            </div>
            <p class="text-center text-lg lg:text-xl lg:px-20 text-gray-700 text-white mt-6">
                Thirukulandhai Sri Mayan Charitable Trust is dedicated to helping those in need through various initiatives. Our mission is to provide essential services such as healthcare, education, and support to underprivileged communities. Together, we strive to make a positive impact and uplift those who need it the most.
            </p>
        </section>
        <section class="events"><div class="flex justify-center items-center my-20" data-aos="fade-up" data-aos-duration="2000"><h1 class="font-semibold border-b-[5px] border-orange-400 text-3xl w-fit mt-7 lg:mt-0 md:text-[50px]">
                    Upcoming Events
                </h1></div><div class="grid gap-8 md:px-4 md:grid-cols-2 lg:grid-cols-3"><div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/contact-bg.webp" alt="Event 1" class="w-full h-40 lg:h-[300px] object-cover"><div class="p-4"><h2 class="text-xl font-semibold mb-2">Event Title 1</h2><p class="text-gray-600">Short description of the event goes here. It could be an exciting overview of what the event is about.</p><div class="flex justify-between items-center py-5"><p class=" text-orange-400  font-semibold">Date: 15th October 2024</p><div class="px-2 py-4 rounded-full hover:bg-orange-200"><a href="donate.html" class="px-4 lg:px-8 text-sm lg:text-[17px] py-2 border-2 border-orange-400 text-medium rounded-full bg-orange-400 text-white">Donate</a></div></div></div></div><div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/contact-bg.webp" alt="Event 2" class="w-full h-40 lg:h-[300px] object-cover"><div class="p-4"><h2 class="text-xl font-semibold mb-2">Event Title 2</h2><p class="text-gray-600">A short description about the second event. Make it engaging and informative.</p><div class="flex justify-between items-center py-5"><p class=" text-orange-400  font-semibold">Date: 15th October 2024</p><div class="px-2 py-4 rounded-full hover:bg-orange-200"><a href="donate.html" class="px-4 lg:px-8 text-sm lg:text-[17px] py-2 border-2 border-orange-400 text-medium rounded-full bg-orange-400 text-white">Donate</a></div></div></div></div><div class="bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/contact-bg.webp" alt="Event 3" class="w-full h-40 lg:h-[300px] object-cover"><div class="p-4"><h2 class="text-xl font-semibold mb-2">Event Title 3</h2><p class="text-gray-600">This event is going to be amazing! Include relevant details about it here.</p><div class="flex justify-between items-center py-5"><p class=" text-orange-400  font-semibold">Date: 15th October 2024</p><div class="px-2 py-4 rounded-full hover:bg-orange-200"><a href="donate.html" class="px-4 lg:px-8 text-sm lg:text-[17px] py-2 border-2 border-orange-400 text-medium rounded-full bg-orange-400 text-white">Donate</a></div></div></div></div></div></section>
        <section class="founders my-10"><div class="flex justify-center items-center" data-aos="fade-up" data-aos-duration="2000"><h1 class="font-semibold border-b-[5px] border-orange-400 text-2xl w-fit mt-7 lg:mt-0 md:text-[50px]">
                    Meet the Founders
                </h1></div><div class="grid gap-8 px-4 mt-12 md:grid-cols-2 lg:grid-cols-3"><div class="text-center bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/edu.webp" alt="Founder 1" class="w-full h-60 lg:h-[380px] object-cover"><div class="p-6"><h2 class="text-xl font-semibold mb-2">John Doe</h2><p class="text-gray-600">John is the visionary leader with over 15 years of experience in the tech industry.</p></div></div><div class="text-center bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/edu.webp" alt="Founder 2" class="w-full h-60 lg:h-[380px]  object-cover"><div class="p-6"><h2 class="text-xl font-semibold mb-2">Jane Smith</h2><p class="text-gray-600">Jane is the creative force behind our design and product strategies, making innovation a priority.</p></div></div><div class="text-center bg-white shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105"><img src="./images/edu.webp" alt="Founder 3" class="w-full h-60 lg:h-[380px]  object-cover"><div class="p-6"><h2 class="text-xl font-semibold mb-2">Mike Johnson</h2><p class="text-gray-600">Mike brings unparalleled expertise in software development and leads our engineering team.</p></div></div></div></section>
        <section id="contact" class="p-0">
            <!-- <h1 class="text-4xl">Contact Section</h1> -->
            <!-- <div class="flex items-center justify-center "><h1 class="text-white border-b-2 border-blue-900  w-fit">Contact Us</h1></div> -->
            <div class="lg:flex">
                <!-- Contact Form Div -->
                <div class="w-full lg:w-3/5 h-auto bg-coverbg-center " style="background-image: url('https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/contact-bg.webp');">
                    <div class="bg-orange-400/80 flex justify-center items-center p-8 pt-[50px] div1">
                        <form action="#" class="w-full lg:px-10" data-aos="fade-up" data-aos-duration="2000">
                            <h1 class="text-6xl text-white font-bold  pb-2   w-fit">Let's Get In Touch !</h1>
                            <p class="text-white mb-10">Fill in the form to connect with us.</p>
                            <input type="text" placeholder="Your Name" class="w-full h-[60px] mb-5 p-3 bg-transparent border-2 shadow-lg border-white text-white placeholder:text-white rounded-lg">
                            <br>
                            <input type="email" placeholder="Your Email" class="w-full h-[60px] mb-5 p-3 bg-transparent border-2 shadow-lg border-white text-white placeholder:text-white rounded-lg">
                            <br>
                            <textarea name="" id="" class="w-full h-[300px] bg-transparent border-2 shadow-lg border-white text-white placeholder:text-white rounded-lg"></textarea>
                            <div class="flex justify-center items-center">
                                <button class="bg-white w-full px-4 py-5 rounded-full my-5 text-black shadow-lg text-center hover:bg-black hover:text-white">SEND MESSAGE</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Google Maps Div -->
                <div class="w-full lg:w-2/5 div2 flex">
                    <!-- For large screens -->
                    <div class="hidden lg:flex w-full h-full">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3886.973042397882!2d80.21939247507761!3d13.037387887284032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDAyJzE0LjYiTiA4MMKwMTMnMTkuMSJF!5e0!3m2!1sen!2sin!4v1728558512179!5m2!1sen!2sin" class="w-full h-full" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- For small screens -->
                    <div class="flex h-[450px] lg:h-auto lg:hidden w-full">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3886.973042397882!2d80.21939247507761!3d13.037387887284032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDAyJzE0LjYiTiA4MMKwMTMnMTkuMSJF!5e0!3m2!1sen!2sin!4v1728558512179!5m2!1sen!2sin" class="w-full h-full" width="600" height="750" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
        <footer class="w-full h-auto bg-[#272c49]">
            <div class="lg:flex lg:justify-between lg:items-start p-4">
                <div class="lg:w-1/4 h-full flex justify-center items-center">
                    <img src="./images/logo-w.webp" class="h-full mt-14" alt="">
                </div>
                <div class="lg:w-1/4 pl-0 lg:pl-20">
                    <div class="flex justify-start items-start">
                        <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Quick Links</h2>
                    </div>
                    <div class="flex justify-start items-center py-4">
                        <ul class="text-white">
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="#about">> About</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="#our-works">> Our Works</a>
                            </li>
                            <!-- <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="index.html#members">> Members</a></li> -->
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="#contact">> Contact</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="#">> Donate</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="lg:w-1/4 h-full mt-4 lg:mt-0">
                    <div class="flex justify-start items-start">
                        <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Location</h2>
                    </div>
                    <div class="flex justify-start items-center py-4">
                        <p class="text-white text-start">No.30, Ramakrishnapuram 3rd street, west mambalam, chennai - 600033.</p>
                    </div>
                    <div class="flex justify-start items-center">
                        <a class="text-orange-400 cursor-pointer" href="https://www.google.com/maps/place/13%C2%B002'14.6%22N+80%C2%B013'19.1%22E/@13.0373879,80.2193925,17z/data=!3m1!4b1!4m4!3m3!8m2!3d13.0373879!4d80.2219674?entry=ttu&g_ep=EgoyMDI0MTAwNy4xIKXMDSoASAFQAw%3D%3D">View On Map</a>
                    </div>
                </div>
                <div class="lg:w-1/4 pl-0 lg:pl-20 mt-4 lg:mt-0">
                    <div class="flex justify-start items-start">
                        <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Contact</h2>
                    </div>
                    <div class="flex justify-start items-center py-4">
                        <ul class="text-white">
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">mayakoothan84@gmail.com</li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="tel:+916383024837" class="text-white hover:text-orange-400 ">+91 6383024837</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="tel:+919940700250" class="text-white hover:text-orange-400 ">+91 9940700250</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="tel:+918015360121" class="text-white hover:text-orange-400 ">+91 8015360121</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-center text-white text-md py-8  bg-[#272c49]">Copyrights © 2024 <span style="color:orange ;">Thirukulanthai Sri Mayan Charitable Trust</span>. All Rights Reserved. <br> Designed by <a href="https://nexglimpse.in/" style="color:orange ;">nexglimpse</a>
                </h1>
            </div>
        </footer>
        </div>
        <!-- Script for navbar behavior -->
        <script src="script.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');
menuBtn.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

// Function to update active link on scroll
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('.nav-link');
    let current = "";

    sections.forEach((section) => {
        const sectionTop = section.offsetTop - 70; // Adjust for navbar height
        if (window.scrollY >= sectionTop) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach((link) => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });
});




const slides = document.getElementById('carouselSlides');
const dots = document.querySelectorAll('[data-slide]');
let currentIndex = 0;

const updateCarousel = (index) => {
    slides.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach(dot => dot.classList.remove('bg-orange-400'));
    dots[index].classList.add('bg-orange-400');
};

document.getElementById('prevButton').addEventListener('click', () => {
    currentIndex = (currentIndex === 0) ? dots.length - 1 : currentIndex - 1;
    updateCarousel(currentIndex);
});

document.getElementById('nextButton').addEventListener('click', () => {
    currentIndex = (currentIndex === dots.length - 1) ? 0 : currentIndex + 1;
    updateCarousel(currentIndex);
});

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentIndex = index;
        updateCarousel(index);
    });
});

// Auto slide functionality (Optional)
setInterval(() => {
    currentIndex = (currentIndex === dots.length - 1) ? 0 : currentIndex + 1;
    updateCarousel(currentIndex);
}, 5000); // Slide every 5 seconds









            function animateCounter(id, start, end, duration, stepSize = 1) {
                let obj = document.getElementById(id),
                  current = start,
                  increment = stepSize,
                  range = end - start,
                  step = Math.abs(Math.floor(duration / (range / increment)));
            
                let timer = setInterval(() => {
                  current += increment;
                  if (current >= end) {
                    current = end;
                    clearInterval(timer);
                  }
                  obj.textContent = current.toLocaleString() + "+"; // Add commas to large numbers and append "+"
                }, step);
              }
            
              // Intersection Observer to trigger counters when the section is in view
              document.addEventListener("DOMContentLoaded", function () {
                const counterSection = document.getElementById('counter-section');
                let hasCounted = false; // Ensure counters run only once
            
                // Intersection observer options
                const observerOptions = {
                  root: null, // viewport
                  threshold: 0.3 // Trigger when 30% of the section is visible
                };
            
                const observer = new IntersectionObserver((entries, observer) => {
                  entries.forEach(entry => {
                    if (entry.isIntersecting && !hasCounted) {
                      hasCounted = true;
            
                      // Start counters when the section becomes visible
                      const totalDuration = 2500; // Total duration for all counters (in milliseconds)
            
                      animateCounter('total-events', 0, 10, totalDuration);            // Small numbers count one by one
                      animateCounter('total-money', 0, 500000, totalDuration, 10000);   // Count in 10,000s
                      animateCounter('people-helped', 0, 1000, totalDuration, 1000);   // Count in 1,000s
                      animateCounter('years-service', 0, 10, totalDuration);            // Small numbers count one by one
                      
                      observer.unobserve(counterSection); // Stop observing once triggered
                    }
                  });
                }, observerOptions);
            
                observer.observe(counterSection); // Start observing the counter section
              });
        </script>
    </body>
</html>