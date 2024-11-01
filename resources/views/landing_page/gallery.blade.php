<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>