<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trust</title>
        <!-- Google Fonts: Poppins -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="style.css"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous">
        <!-- Tailwind CDN -->
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
            /* section {
            padding: 50px;
        } */
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    </head>

    

<body class="h-full overflow-y-scroll custom-scrollbar">
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
                        <a href="./#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                        <a href="./#contributions" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                        <!-- <a href="index.html#members"
                        class="bl.ock text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Members</a> -->
                        <a href="./#contact" class="block text-gray-700 py-2  border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
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
        <!-- Sections for navigation -->
        <div class="z-10 bottom-[40px] xl:bottom-[20px] left-[30px] fixed flex">
            <a href="https://wa.me/919940700250" target="_blank">
                <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/wapp.png" class="w-[60px] lg:w-[80px] " alt="">
            </a>
            <h1 class="mt-2 bg-gray-100 h-fit px-4 py-2 rounded-full text-[9px] lg:text-[15px] shadow-lg">Chat with us on WhatsApp !</h1>
        </div>
    <section class="px-8 mt-24">@livewire('upcoming-eventsrequirements')</section>
    <footer class="w-full h-auto bg-[#272c49]">
            <div class="lg:flex lg:justify-between lg:items-start p-4">
                <div class="lg:w-1/4 h-full flex justify-center items-center">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/darklogo.webp" class="h-full mt-14" alt="">
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
</body>
</html>