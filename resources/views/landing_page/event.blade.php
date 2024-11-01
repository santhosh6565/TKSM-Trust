<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMZozbQKozK4LFFd08ioytXt6K3fPGAZ+P7F4" crossorigin="anonymous">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>
        /* Custom Scrollbar Styles */
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
<body class="h-full overflow-y-scroll custom-scrollbar">
    <section class="px-8">@livewire('upcoming-eventsrequirements')</section>
</body>
</html>