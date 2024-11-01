<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
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
    </style>
</head>
<body>
    <div class="navbar">
        <nav class="bg-white fixed w-full top-0 shadow-md z-50 p-3 lg:p-2 lg:px-[120px]">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <a href="/" class="text-xl font-semibold">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo.webp" class="w-[120px] lg:w-[185px]" alt="">
                </a>
                <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <div class="hidden lg:flex space-x-[70px]" id="menu">
                    <a href="#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                    <a href="#contributions" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                    <a href="#contact" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
                    <a href="{{ route('Gallery') }}" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Gallery</a>
                    <a href="{{ route('donations') }}" class="block text-white bg-orange-400 px-8 py-2 rounded-full transition duration-300 hover:bg-orange-500">Donate</a>
                </div>
            </div>
        </nav>
    </div>

    <section class="px-6 py-10 lg:px-20 mt-20">
        <div class="flex items-center justify-center">
            <h2 class="text-6xl font-semibold text-center text-black w-fit border-b-[5px] border-orange-400 mb-8">Gallery</h2>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">
            @foreach($events as $index => $event)
                <div class="relative group overflow-hidden shadow-md">
                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->title }}" class="rounded-lg w-full h-full object-cover transition-transform duration-300 group-hover:scale-110 lightbox-trigger" data-index="{{ $index }}">
                </div>
            @endforeach
        </div>
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
                <img src="./images/logo-w.webp" class="h-full mt-14" alt="">
            </div>
            <div class="lg:w-1/4 pl-0 lg:pl-20">
                <div class="flex justify-start items-start">
                    <h2 class="text-2xl text-white pt-10 border-b-2 border-orange-400">Quick Links</h2>
                </div>
                <div class="flex justify-start items-center py-4">
                    <ul class="text-white">
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="#about">> About</a></li>
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="#our-works">> Our Works</a></li>
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="#contact">> Contact</a></li>
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="#">> Donate</a></li>
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
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="tel:+916383024837" class="text-white hover:text-orange-400">+91 6383024837</a></li>
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="tel:+919940700250" class="text-white hover:text-orange-400">+91 9940700250</a></li>
                        <li class="pb-2 hover:text-orange-400 cursor-pointer"><a href="tel:+918015360121" class="text-white hover:text-orange-400">+91 8015360121</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <h1 class="text-center text-white text-md py-8 bg-[#272c49]">Copyrights © 2024 <span style="color:orange;">Thirukulanthai Sri Mayan Charitable Trust</span>. All Rights Reserved. <br> Designed by <a href="https://nexglimpse.in/" style="color:orange;">nexglimpse</a></h1>
        </div>
    </footer>
</body>
</html>
