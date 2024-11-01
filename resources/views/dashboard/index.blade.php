@extends('layouts.app')

@section('title', 'Home Page')

@section('scripts')

@endsection

@section('content')
  <div>
    <div class="container px-4  mx-auto grid">
        <h2 class="my-6 text-2xl sm:text-md font-semibold text-gray-700 dark:text-gray-200">
            👋 Hi, {{ Auth::user()->name }}! Welcome to the Dashboard
        </h2>
        <!-- CTA -->
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple" href="{{ route('admin.logs') }}">
          <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
            </svg>
            <span>Today Activity</span>
          </div>
          <span> View Log &RightArrow;</span>
        </a>
        @livewire('total-component')
        {{-- @livewire('upcoming-events') --}}
        @livewire('user-announcements')
        @livewire('monthly-charts')
        {{-- @livewire('upcoming-eventsrequirements') --}}
    </div>
  </div>

  {{-- <button id="confettiBtn">popup button</button> --}}

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
{{-- <script>
  document.getElementById('confettiBtn').addEventListener('click', function() {
    let duration = 15 * 1000;
    let animationEnd = Date.now() + duration;
    let defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 1000 };

    function randomInRange(min, max) {
      return Math.random() * (max - min) + min;
    }

    let interval = setInterval(function() {
      let timeLeft = animationEnd - Date.now();

      if (timeLeft <= 0) {
        return clearInterval(interval);
      }

      let particleCount = 50 * (timeLeft / duration);
      // Confetti bursts from two random points across the full screen
      confetti(Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0, 1), y: Math.random() - 0.2 }
      }));
      confetti(Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0, 1), y: Math.random() - 0.2 }
      }));
    }, 250);
  });
</script> --}}
{{-- <script>
  window.addEventListener('DOMContentLoaded', function() {
    let duration = 15 * 1000;
    let animationEnd = Date.now() + duration;
    let defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 1000 };

    function randomInRange(min, max) {
      return Math.random() * (max - min) + min;
    }

    let interval = setInterval(function() {
      let timeLeft = animationEnd - Date.now();

      if (timeLeft <= 0) {
        return clearInterval(interval);
      }

      let particleCount = 50 * (timeLeft / duration);
      // Confetti bursts from two random points across the full screen
      confetti(Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0, 1), y: Math.random() - 0.2 }
      }));
      confetti(Object.assign({}, defaults, {
        particleCount,
        origin: { x: randomInRange(0, 1), y: Math.random() - 0.2 }
      }));
    }, 250);
  });
</script> --}}
@endsection

@section('scripts')

@endsection