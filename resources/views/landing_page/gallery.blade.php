<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | Thirukulandhai Sri Mayan Charitable Trust</title>
    <meta name="description" content="Explore the Gallery of Thirukulandhai Sri Mayan Charitable Trust, showcasing our efforts in supporting communities through healthcare, education, and relief work.">
    <meta name="keywords" content="Thirukulandhai Sri Mayan Charitable Trust gallery, community support images, charity work, healthcare initiatives, educational support, disaster relief photos">
    
    <!-- Canonical Tag -->
    <link rel="canonical" href="https://thirukkulandhaisrimayan.com/gallery">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    <!-- icon link -->
    <link rel="icon" href="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/favicon.webp " type="image/x-icon">

    <!-- icon link -->
    <link rel="icon" href="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/favicon.webp " type="image/x-icon">

    <!-- Language and Hreflang Tags -->
    <meta http-equiv="content-language" content="en">
    <link rel="alternate" hreflang="en" href="https://thirukkulandhaisrimayan.com/gallery">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Gallery | Thirukulandhai Sri Mayan Charitable Trust">
    <meta property="og:description" content="Browse our gallery to see impactful work in healthcare, education, and disaster relief for underprivileged communities.">
    <meta property="og:url" content="https://thirukkulandhaisrimayan.com/gallery">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/poster.webp"> <!-- Replace with actual image URL -->

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Gallery | Thirukulandhai Sri Mayan Charitable Trust">
    <meta name="twitter:description" content="Browse our gallery to see impactful work in healthcare, education, and disaster relief for underprivileged communities.">
    <meta name="twitter:image" content="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/poster.webp"> <!-- Replace with actual image URL -->
    <meta name="twitter:url" content="https://thirukkulandhaisrimayan.com/gallery">    

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto Slab', sans-serif;
        }

        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .lightbox img {
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            color: white;
            cursor: pointer;
        }

        .lightbox .left-arrow {
            left: 20px;
        }

        .lightbox .right-arrow {
            right: 20px;
        }

        .lightbox.active {
            display: flex;
        }
        .custom-scrollbar::-webkit-scrollbar {
              width: 8px; /* Vertical scrollbar width */
              height: 8px; /* Horizontal scrollbar height */
            }
      
            .custom-scrollbar::-webkit-scrollbar-track {
              background: #f1f1f1; /* Light background color for the scrollbar track */
            }
      
            .custom-scrollbar::-webkit-scrollbar-thumb {
              background-color: #888; /* Scrollbar thumb color */
              border-radius: 10px;
              border: 2px solid transparent; /* Adds padding inside the thumb */
            }
      
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
              background-color: #555; /* Darker color on hover */
            }
    </style>
</head>
<body class="custom-scrollbar">
<div class="navbar ">
            <nav class="bg-white fixed w-full top-0 shadow-md z-50 p-3 lg:p-2 lg:px-[120px]">
                <div class="container mx-auto px-4  flex justify-between items-center">
                    <a href="/" class="text-xl  font-semibold">
                        <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo.webp" class="w-[135px] lg:w-[185px]" alt="">
                    </a>
                    <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <div class="hidden lg:flex space-x-[70px]" id="menu">
                        <a href="/#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                        <a href="/#contributions" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                        <!-- <a href="index.html#members"
                                class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Members</a> -->
                        <a href="/#contact" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
                        <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Gallery</a>
                        <a href="{{ route('Event') }}" class="block text-white bg-orange-400 px-8 py-2 rounded-full transition duration-300  hover:bg-orange-500">Donate</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Mobile Menu -->
        <div class="lg:hidden hidden fixed bg-white w-full pt-[60px] z-10" id="mobile-menu">
            <div class="text-center">
                <a href="./#about" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">About</a>
                <a href="./#contributions" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contributions</a>
                <!-- <a href="index.html#members" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Members</a> -->
                <a href="./#contact" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contact</a>
                <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Gallery</a>
                <a href="{{ route('Event') }}" class="block text-gray-700 py-2 pl-4 bg-orange-400 text-white py-3 hover:bg-orange-500">Donate</a>
            </div>
        </div>
        </nav>undefined</div>undefined
        <!-- Sections for navigation -->undefined<div class="z-10 bottom-[40px] xl:bottom-[20px] left-[30px] fixed flex">
            <a href="https://wa.me/919940700250" target="_blank">
                <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/wapp.png" class="w-[60px] lg:w-[80px] " alt="">
            </a>
            <h1 class="mt-2 bg-gray-100 h-fit px-4 py-2 rounded-full text-[9px] lg:text-[15px] shadow-lg">Chat with us on WhatsApp !</h1>
        </div>

    <section class="px-6 py-10 lg:px-20 lg:mt-20">
        <div class="flex items-center justify-center">
            <h2 class="text-4xl lg:text-6xl font-semibold text-center text-black w-fit border-b-[5px] border-orange-400 mb-8">Gallery</h2>
        </div>
        
        @if($events->isNotEmpty())
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
                @foreach($events as $index => $event)
                    <div class="relative group overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="rounded-lg w-full h-full object-cover transition-transform duration-300 group-hover:scale-110 lightbox-trigger" data-index="{{ $index }}">
                    </div>
                @endforeach
            </div>
        @else
            <div class="p-8">
                <div class="flex justify-center items-center w-full p-4">
                    <div class="rounded-lg border border-orange-600 shadow-md shadow-orange-400 p-6 text-center">
                        <p class="text-lg font-medium text-gray-800 pb-4">No Images in Gallery</p>
                        <p class="text-sm font-medium text-gray-500 pb-2">Stay tuned for future events! In the meantime, consider visiting our donations page.</p>
                        <div class="mt-4">
                            <a href="/donations" class="text-center border-2 border-orange-500 rounded-full text-orange-500 hover:bg-orange-500 hover:text-white py-2 px-4">
                                Go to Donations
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>    

    <div class="lightbox" id="lightbox">
        <div class="arrow left-arrow" onclick="changeImage(-1)">&#10094;</div>
        <div class="arrow right-arrow" onclick="changeImage(1)">&#10095;</div>
        <img id="lightbox-image" src="" alt="">
    </div>

    <script>
        const images = document.querySelectorAll('.lightbox-trigger');
        const lightbox = document.getElementById('lightbox');
        const lightboxImage = document.getElementById('lightbox-image');
        let currentIndex = 0;

        images.forEach((img, index) => {
            img.addEventListener('click', () => {
                currentIndex = index;
                openLightbox(img.src);
            });
        });

        function openLightbox(src) {
            lightboxImage.src = src;
            lightbox.classList.add('active');
        }

        function changeImage(direction) {
            currentIndex += direction;
            if (currentIndex < 0) {
                currentIndex = images.length - 1; // wrap to last image
            } else if (currentIndex >= images.length) {
                currentIndex = 0; // wrap to first image
            }
            lightboxImage.src = images[currentIndex].src;
        }

        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });
    </script>

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
        </script>
</body>
</html>
