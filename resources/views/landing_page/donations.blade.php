<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate | Thirukulandhai Sri Mayan Charitable Trust</title>

    <!-- Primary Meta Tags -->
    <meta name="description" content="Support the initiatives of Thirukulandhai Sri Mayan Charitable Trust by making a donation. Help us provide healthcare, education, and disaster relief to underprivileged communities. Your donation makes a difference.">
    <meta name="keywords" content="donate, charitable trust donations, healthcare donations, education donations, disaster relief donations, support underprivileged communities, Thirukulandhai Sri Mayan Trust donations, online donations">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Make a Donation | Thirukulandhai Sri Mayan Charitable Trust">
    <meta property="og:description" content="Help us continue our work to provide healthcare, education, and disaster relief to communities in need. Your donation makes a meaningful impact.">
    <meta property="og:image" content="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/poster.webp "> <!-- Replace with a specific image URL for the donation page if available -->
    <meta property="og:url" content="https://thirukkulandhaisrimayan.com/donations">
    <meta property="og:type" content="website">

    <!-- icon link -->
    <link rel="icon" href="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/favicon.webp " type="image/x-icon">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Donate to Thirukulandhai Sri Mayan Charitable Trust">
    <meta name="twitter:description" content="Contribute to causes like healthcare, education, and disaster relief. Your donation helps uplift underprivileged communities.">
    <meta name="twitter:image" content="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/poster.webp ">

    <!-- Google Fonts: Poppins and Additional Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome and Tailwind CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Apply Poppins font globally */
        body {
            font-family: 'Roboto Slab', sans-serif;
        }

        /* Styling for active link */
        .active {
            color: #ff5733;
        }
    </style>
</head>
<body class="custom-scrollbar">
<div class="navbar ">
            <nav class="bg-white fixed w-full top-0 shadow-md z-50 p-3 lg:p-2 lg:px-[120px]">
                <div class="container mx-auto px-4  flex justify-between items-center">
                    <a href="/" class="text-xl  font-semibold">
                        <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo.webp" class="w-[120px] lg:w-[185px]" alt="">
                    </a>
                    <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <div class="hidden lg:flex space-x-[70px]" id="menu">
                        <a href="/home#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                        <a href="/home#contributions" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                        <!-- <a href="index.html#members"
                        class="bl.ock text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Members</a> -->
                        <a href="/#contact" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
                        <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Gallery</a>
                        <a href="{{ route('Event') }}" class="block text-white bg-orange-400 px-8 py-2 rounded-full transition duration-300  hover:bg-orange-500">Donate</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Mobile Menu -->
        <div class="lg:hidden hidden fixed bg-white w-full pt-[90px] z-10" id="mobile-menu">
            <div class="text-center">
                <a href="./#about" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">About</a>
                <a href="./#contributions" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contributions</a>
                <!-- <a href="index.html#members" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Members</a> -->
                <a href="./#contact" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contact</a>
                <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Gallery</a>

                <a href="{{ route('Event') }}"  class="block text-gray-700 py-2 pl-4 bg-orange-400 text-white py-3 hover:bg-orange-500">Donate</a>
            </div>
        </div>
        </nav>
    </div>

    <div class="lg:flex mt-[80px]">
        <!-- Left Section: Background Image with Text -->
        <div class="lg:w-2/5 h-[200px] lg:h-auto" style="background-image: url('./images/contact-bg.png');">
            <div class="bg-blue-950/90 h-[200px] lg:h-full">
                <div class="flex justify-center items-center h-full">
                    <h1 class="font-bold text-2xl lg:text-6xl text-center text-white"> Give the Gift of Hope: Make a Donation! </h1>
                </div>
            </div>
        </div>
        <!-- Right Section: Donation Information -->
        <div class="lg:w-3/5 pb-5">
            <!-- Title -->
            <h1 class="font-bold text-2xl lg:text-4xl text-center pt-[60px]"> Together We Can Make a Change! </h1>
            <!-- Toggle Buttons -->
            <div class="flex justify-center mt-5">
    <button id="upiButton" class="bg-orange-600 text-white py-2 px-4 rounded-lg mx-2" onclick="toggleSection('upi')">UPI</button>
    <button id="bankTransferButton" class="bg-gray-600 text-white py-2 px-4 rounded-lg mx-2" onclick="toggleSection('bank')">Bank Transfer</button>
</div>


            <!-- QR Code Section -->
             <div id="upiSection" >
            <div class="flex items-center justify-center mt-5">
                <a href="upi://pay?pa=thirukkulandhai@sbi&pn=THIRUKKULANDHAI%20SRI%20MAYAN%20CHARITABLE%20TRUST&mc=8661&tr=&tn=&am=&cu=INR&url=&mode=02">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/qrcode.webp" class="py-8 w-[300px] lg:w-[300px]" alt="QR Code" id="qrCode">
                </a>
            </div>
            <!-- Download Button -->
            <div class="flex justify-center pb-4">
                <button class="bg-orange-600 text-white py-2 px-4 rounded-lg hover:bg-blue-950/90 focus:outline-none" onclick="downloadQRCode()"> Download QR Code </button>
            </div>

            <!-- Scan with any app -->
            <div>
                <h1 class="text-center text-xl lg:text-3xl font-bold">Scan with any app</h1>
                <div class="flex justify-center items-center my-10">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo1.webp" class="w-[70px] lg:w-[120px] mx-5 h-auto" alt="App Logo 1">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo2.webp" class="w-[70px] lg:w-[120px] mx-5 h-auto" alt="App Logo 2">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo3.webp" class="w-[90px] lg:w-[160px] mx-5 h-auto" alt="App Logo 3">
                </div>
                <div class="flex justify-center items-center my-10">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo4.webp" class="w-[100px] lg:w-[120px] mx-5 h-auto" alt="App Logo 4">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo5.webp" class="w-[100px] lg:w-[120px] mx-5 h-auto" alt="App Logo 5">
                </div>
            </div>
            </div>
            <!-- Donation Details -->
            <div id="bankSection" class="flex flex-col items-center justify-center mt-5 px-5 lg:px-10 hidden">
                <h1 class="text-center text-xl lg:text-3xl font-bold mb-5">Donation Details</h1>
                <p class="text-center text-lg lg:text-2xl font-semibold">Thirukkulandhai Sri Mayan Charitable Trust</p>
                <p class="text-center text-lg lg:text-2xl font-semibold">Current A/C No: 42986417781</p>
                <p class="text-center text-lg lg:text-2xl font-semibold">IFSC: SBIN0001683</p>
                <p class="text-center text-lg lg:text-2xl font-semibold">STATE BANK OF INDIA</p>
                <p class="text-center text-lg lg:text-2xl font-semibold">West Mambalam Branch, Chennai</p>
            </div>
        </div>
    </div>

    <footer class="w-full h-auto bg-[#272c49]">
            <div class="lg:flex lg:justify-between lg:items-start p-4">
                <div class="lg:w-1/4 h-full flex justify-center items-center">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logodark.webp" class="h-full mt-14" alt="">
                </div>
                <div class="lg:w-1/4 pl-0 lg:pl-20">
                    <div class="flex justify-start items-start">
                        <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Quick Links</h2>
                    </div>
                    <div class="flex justify-start items-center py-4">
                    <ul class="text-white">
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="/#about">> About</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="/#our-works">> Our Works</a>
                            </li>
                            <!-- <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="index.html#members">> Members</a></li> -->
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="/#contact">> Contact</a>
                            </li>
                            <li class="pb-2 hover:text-orange-400 cursor-pointer">
                                <a href="/Event">> Donate</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="lg:w-1/4 h-full mt-4 lg:mt-0">
                    <div class="flex justify-start items-start">
                        <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Location</h2>
                    </div>
                    <div class="flex justify-start items-center py-4">
                        <p class="text-white text-start">“Sri Mayan Kudil”, Sannadhi Street, Thirukulandhai Perungulam Srivaikundam, Thoothukudi District</p>
                    </div>
                    <div class="flex justify-start items-center">
                        <a class="text-orange-400 cursor-pointer" href="https://maps.app.goo.gl/UguowUGwWcf2ynLe9">View On Map</a>
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
    <script src="script.js"></script>
    <script>
       function toggleSection(section) {
    const upiSection = document.getElementById('upiSection');
    const bankSection = document.getElementById('bankSection');

    if (section === 'upi') {
        upiSection.classList.remove('hidden');
        bankSection.classList.add('hidden');
        document.getElementById('upiButton').classList.add('bg-orange-600');
        document.getElementById('upiButton').classList.remove('bg-gray-600');

        document.getElementById('bankTransferButton').classList.remove('bg-orange-600');
        document.getElementById('bankTransferButton').classList.add('bg-gray-600');

    } else {
        bankSection.classList.remove('hidden');
        upiSection.classList.add('hidden');
        document.getElementById('bankTransferButton').classList.add('bg-orange-600');
        document.getElementById('bankTransferButton').classList.remove('bg-gray-600');
        document.getElementById('upiButton').classList.add('bg-gray-600');
        document.getElementById('upiButton').classList.remove('bg-orange-600');
    }
}

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
        document.addEventListener("DOMContentLoaded", function() {
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
                animateCounter('total-events', 0, 10, totalDuration); // Small numbers count one by one
                animateCounter('total-money', 0, 500000, totalDuration, 10000); // Count in 10,000s
                animateCounter('people-helped', 0, 1000, totalDuration, 1000); // Count in 1,000s
                animateCounter('years-service', 0, 10, totalDuration); // Small numbers count one by one
                observer.unobserve(counterSection); // Stop observing once triggered
                }
            });
            }, observerOptions);
            observer.observe(counterSection); // Start observing the counter section
        });
        </script>
</body>
</html>
