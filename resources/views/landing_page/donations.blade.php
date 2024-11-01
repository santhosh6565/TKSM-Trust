<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trust</title>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">


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
    </style>
</head>
<body>
    <div class="navbar ">
        <nav class="bg-white fixed w-full top-0 shadow-md z-50 p-3 lg:px-[120px]">
            <div class="container mx-auto px-4 flex justify-between items-center">
                <a href="/" class="text-xl font-semibold">
                    <img src="https://raw.githubusercontent.com/santhosh6565/catering-service/main/uploads/logo.webp" class="w-[120px] lg:w-[160px]" alt="">
                </a>
                <button class="block lg:hidden text-gray-700 focus:outline-none" id="menu-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <div class="hidden lg:flex space-x-[70px]" id="menu">
                    <a href="{{ route('landing') }}" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Home</a>
                    <a href="{{ route('landing') }}#about" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">About</a>
                    <a href="{{ route('landing') }}#contributions" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contributions</a>
                    <a href="{{ route('landing') }}#contact" class="block text-gray-700 py-2 border-b-[3px] border-transparent hover:border-orange-400 transition duration-300">Contact</a>
                    <a href="{{ route('donations') }}" class="block text-white bg-orange-400 px-8 py-2 rounded-full transition duration-300 hover:bg-orange-500">Donate</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile Menu -->
    <div class="lg:hidden hidden fixed bg-white w-full pt-[90px] z-10" id="mobile-menu">
        <div class="text-center">
            <a href="{{ route('landing') }}" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Home</a>
            <a href="{{ route('landing') }}#about" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">About</a>
            <a href="{{ route('landing') }}#contributions" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contributions</a>
            <a href="{{ route('landing') }}#contact" class="block text-gray-700 py-2 pl-4 hover:bg-gray-100">Contact</a>
            <a href="{{ route('donations') }}" class="block text-gray-700 py-2 pl-4 bg-orange-400 text-white py-3 hover:bg-orange-500">Donate</a>
        </div>
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
</body>
</html>
