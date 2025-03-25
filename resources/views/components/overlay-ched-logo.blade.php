{{-- <div class="min-h-screen justify-center items-center bg-center bg-cover bg-blend-overlay" style="background-image: url('{{ asset('img/chedXmax.png') }}'); ">
    <div class="w-full p-2">
        {{ $slot }}
    </div>
</div> --}}

{{-- <div class="min-h-screen flex justify-center items-center bg-center bg-cover bg-no-repeat relative">
   <!-- Background image with overlay -->
   <div class="absolute inset-0 bg-blue-900/50 bg-gradient-to-b from-blue-600/30 to-blue-900/60 z-0"></div>

   <!-- Background image -->
   <div class="absolute inset-0 z-[-1]" style="background-image: url('{{ asset('img/chedXmax.png') }}');"></div>

   <!-- Content container -->
   <div class="w-full p-2 relative z-10">
      {{ $slot }}
   </div>
</div> --}}

{{-- <div class="min-h-screen flex relative h-screen">
   <!-- Left side: Image with overlay -->
   <div class="w-1/2 relative hidden lg:block">
     <!-- Background image -->
     <div class="absolute inset-0 bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('img/chedXmax.png') }}');"></div>

     <!-- Blue overlay -->
     <div class="absolute inset-0 bg-blue-900/50 bg-gradient-to-b from-blue-600/30 to-blue-900/60"></div>
   </div>

   <!-- Right side: Login form -->
   <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
     <div class="w-full max-w-md">
       {{ $slot }}
     </div>
   </div>
</div> --}}


<div class="min-h-screen flex relative h-screen">
   <!-- Left side: Image with cut-out effect and gradient -->
   <div class="w-1/2 relative hidden lg:block overflow-hidden transition-all duration-300 animate-fadeInDown">
     <!-- Background image -->
     <div class="absolute inset-0 bg-no-repeat bg-cover bg-center clip-triangle" style="background-image: url('{{ asset('img/chedXmax.png') }}');"></div>

     <!-- Simplified smooth gradient overlay (Light Blue to Blue) -->
     <div class="absolute inset-0 bg-gradient-to-b from-blue-100 to-blue-700 opacity-80 clip-triangle transition-all duration-300"></div>
   </div>

   <!-- Right side: Login form -->
   <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
     <div class="w-full max-w-md">
       {{ $slot }}
     </div>
   </div>
</div>

<style>
/* Apply the triangle cut effect */
.clip-triangle {
   clip-path: polygon(0% 0%, 100% 0%, 85% 100%, 0% 100%);
}

/* Fade-in from top to bottom */
@keyframes fadeInDown {
   from {
      opacity: 0;
      transform: translateY(-50px);
   }
   to {
      opacity: 1;
      transform: translateY(0);
   }
}

.animate-fadeInDown {
   animation: fadeInDown 1s ease-out;
}
</style>



{{-- <div class="min-h-screen flex relative h-screen">
   <!-- Left side: Image with overlay -->
   <div class="w-1/2 relative hidden lg:block overflow-hidden">
     <!-- Background image -->
     <div class="absolute inset-0 bg-no-repeat bg-cover bg-center" style="background-image: url('{{ asset('img/chedXmax.png') }}');"></div>

     <!-- Blue gradient overlay -->
     <div class="absolute inset-0 bg-gradient-to-br from-blue-500/40 via-blue-600/50 to-blue-800/60 backdrop-blur-sm"></div> --}}

     <!-- Glassmorphism shapes -->
     {{-- <div class="absolute top-1/4 left-1/4 w-32 h-32 rounded-full bg-white/10 backdrop-blur-md border border-white/20 shadow-lg"></div>
     <div class="absolute bottom-1/3 right-1/4 w-48 h-48 rounded-full bg-blue-300/10 backdrop-blur-sm border border-white/10"></div>
     <div class="absolute top-2/3 left-1/3 w-24 h-24 rounded-lg bg-white/5 backdrop-blur-md transform rotate-12 border border-white/10"></div> --}}
   {{-- </div> --}}

   {{-- <div class="absolute top-0 right-1/2 bottom-0 w-12 bg-white" style="

   clip-path: polygon(
      0% 0%,
      100% 0%,
      100% 100%,
      0% 100%,
      70% 95%,
      30% 90%,
      70% 85%,
      30% 80%,
      70% 75%,
      30% 70%,
      70% 65%,
      30% 60%,
      70% 55%,
      30% 50%,
      70% 45%,
      30% 40%,
      70% 35%,
      30% 30%,
      70% 25%,
      30% 20%,
      70% 15%,
      30% 10%,
      70% 5%
      );"></div>
   <!-- Right side: Login form -->
   <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
      <div class="w-full max-w-md">
         {{ $slot }}
      </div>
   </div>
</div> --}}
