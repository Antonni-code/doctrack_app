{{-- <div class="loader-container flex justify-center items-center">
   <div class="spinner"></div>
</div>

<style>
  /* Fullscreen Loader Background with Blur Effect */
  .loader-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(255, 255, 255, 0.2); /* Semi-transparent */
      backdrop-filter: blur(10px); /* Blur effect */
      -webkit-backdrop-filter: blur(10px); /* Safari support */
      z-index: 9999;
   }
  /* Spinner from Uiverse.io */
  .spinner {
     --size: 30px;
     --first: #0032A0;
     --second: #C8102E;
     width: 50px;
     height: 50px;
     position: relative;
     animation: spin 2s linear infinite;
  }

  .spinner::before,
  .spinner::after {
     content: "";
     width: var(--size);
     height: var(--size);
     background: var(--first);
     border-radius: 100%;
     position: absolute;
     top: 10%;
     transform: translateY(-50%);
     animation: bounce 1s ease-in-out alternate infinite;
  }

  .spinner::after {
     background: var(--second);
     animation: bounce 1s 0.5s ease-in-out alternate infinite;
  }

  @keyframes bounce {
     50% {
        transform: translateX(-50%);
     }
  }

  @keyframes spin {
     100% {
        transform: rotate(360deg);
     }
  }

  /* Hide Loader Smoothly */
  .loader-hidden {
     opacity: 0;
     transition: opacity 0.5s ease-out;
     pointer-events: none;
  }
</style>

<script>
  window.addEventListener("load", () => {
     const loaderContainer = document.querySelector(".loader-container");

     loaderContainer.classList.add("loader-hidden");

     loaderContainer.addEventListener("transitionend", () => {
        loaderContainer.remove();
     });
  });
</script> --}}


<div class="loader-container flex justify-center items-center">
   <svg viewBox="0 0 240 240" height="240" width="240" class="pl">
     <circle stroke-linecap="round" stroke-dashoffset="-330" stroke-dasharray="0 660" stroke-width="20" stroke="#f42f25" fill="none" r="105" cy="120" cx="120" class="pl__ring pl__ring--a"></circle>
     <circle stroke-linecap="round" stroke-dashoffset="-110" stroke-dasharray="0 220" stroke-width="20" stroke="#ffdd00" fill="none" r="35" cy="120" cx="120" class="pl__ring pl__ring--b"></circle>
     <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#255ff4" fill="none" r="70" cy="120" cx="85" class="pl__ring pl__ring--c"></circle>
     <circle stroke-linecap="round" stroke-dasharray="0 440" stroke-width="20" stroke="#2cf425" fill="none" r="70" cy="120" cx="155" class="pl__ring pl__ring--d"></circle>
   </svg>
 </div>

 <style>
   /* Fullscreen Loader Background with Blur Effect */
   .loader-container {
       position: fixed;
       top: 0;
       left: 0;
       width: 100vw;
       height: 100vh;
       background: rgba(255, 255, 255, 0.2); /* Semi-transparent */
       backdrop-filter: blur(10px); /* Blur effect */
       -webkit-backdrop-filter: blur(10px); /* Safari support */
       z-index: 9999;
   }

   /* SVG Loader */
   .pl {
     width: 100px;
     height: 100px;
   }

   .pl__ring {
     animation: ringA 2s linear infinite;
   }

   .pl__ring--a {
     stroke: #f42f25;
   }

   .pl__ring--b {
     animation-name: ringB;
     stroke: #ffdd00;
   }

   .pl__ring--c {
     animation-name: ringC;
     stroke: #255ff4;
   }

   .pl__ring--d {
     animation-name: ringD;
     stroke: #2cf425;
   }

   /* Animations */
   @keyframes ringA {
     from,
     4% {
       stroke-dasharray: 0 660;
       stroke-width: 20;
       stroke-dashoffset: -330;
     }

     12% {
       stroke-dasharray: 60 600;
       stroke-width: 30;
       stroke-dashoffset: -335;
     }

     32% {
       stroke-dasharray: 60 600;
       stroke-width: 30;
       stroke-dashoffset: -595;
     }

     40%,
     54% {
       stroke-dasharray: 0 660;
       stroke-width: 20;
       stroke-dashoffset: -660;
     }

     62% {
       stroke-dasharray: 60 600;
       stroke-width: 30;
       stroke-dashoffset: -665;
     }

     82% {
       stroke-dasharray: 60 600;
       stroke-width: 30;
       stroke-dashoffset: -925;
     }

     90%,
     to {
       stroke-dasharray: 0 660;
       stroke-width: 20;
       stroke-dashoffset: -990;
     }
   }

   @keyframes ringB {
     from,
     12% {
       stroke-dasharray: 0 220;
       stroke-width: 20;
       stroke-dashoffset: -110;
     }

     20% {
       stroke-dasharray: 20 200;
       stroke-width: 30;
       stroke-dashoffset: -115;
     }

     40% {
       stroke-dasharray: 20 200;
       stroke-width: 30;
       stroke-dashoffset: -195;
     }

     48%,
     62% {
       stroke-dasharray: 0 220;
       stroke-width: 20;
       stroke-dashoffset: -220;
     }

     70% {
       stroke-dasharray: 20 200;
       stroke-width: 30;
       stroke-dashoffset: -225;
     }

     90% {
       stroke-dasharray: 20 200;
       stroke-width: 30;
       stroke-dashoffset: -305;
     }

     98%,
     to {
       stroke-dasharray: 0 220;
       stroke-width: 20;
       stroke-dashoffset: -330;
     }
   }

   @keyframes ringC {
     from {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: 0;
     }

     8% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -5;
     }

     28% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -175;
     }

     36%,
     58% {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: -220;
     }

     66% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -225;
     }

     86% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -395;
     }

     94%,
     to {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: -440;
     }
   }

   @keyframes ringD {
     from,
     8% {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: 0;
     }

     16% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -5;
     }

     36% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -175;
     }

     44%,
     50% {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: -220;
     }

     58% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -225;
     }

     78% {
       stroke-dasharray: 40 400;
       stroke-width: 30;
       stroke-dashoffset: -395;
     }

     86%,
     to {
       stroke-dasharray: 0 440;
       stroke-width: 20;
       stroke-dashoffset: -440;
     }
   }

   /* Hide Loader Smoothly */
   .loader-hidden {
      opacity: 0;
      transition: opacity 0.5s ease-out;
      pointer-events: none;
   }
 </style>

 <script>
   window.addEventListener("load", () => {
      const loaderContainer = document.querySelector(".loader-container");

      loaderContainer.classList.add("loader-hidden");

      loaderContainer.addEventListener("transitionend", () => {
         loaderContainer.remove();
      });
   });
 </script>
