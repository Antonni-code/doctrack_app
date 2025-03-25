<x-guest-layout>
   <x-overlay-ched-logo>
       <x-authentication-card class="sm:mx-auto sm:w-full sm:max-w-md">
           <x-slot name="logo">
               <x-authentication-card-logo class="w-20 h-20 mx-auto" />
           </x-slot>

           <div class="text-center mb-6">
               <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Welcome Back</h1>
               <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Sign in to your account to continue</p>
           </div>

           <x-validation-errors class="mb-4 rounded-lg bg-red-50 dark:bg-red-900/30 p-4 text-sm" />

           @session('status')
               <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/30 p-4 rounded-lg">
                   {{ $value }}
               </div>
           @endsession

           <form method="POST" action="{{ route('login') }}" class="space-y-6 animate-fade-in-up">
               @csrf

               <div>
                   <x-label for="email" value="{{ __('Email') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                   <div class="mt-1 relative rounded-md shadow-sm">
                       <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                               <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                               <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                           </svg>
                       </div>
                       <x-input id="email" class="block w-full pl-10 rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="your@email.com" />
                   </div>
               </div>

               <div>
                   <div class="flex items-center justify-between">
                       <x-label for="password" value="{{ __('Password') }}" class="text-sm font-medium text-gray-700 dark:text-gray-300" />
                       @if (Route::has('password.request'))
                           <a class="text-xs text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus:outline-none focus:underline" href="{{ route('password.request') }}">
                               {{ __('Forgot your password?') }}
                           </a>
                       @endif
                   </div>
                   <div class="mt-1 relative rounded-md shadow-sm">
                       <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                           </svg>
                       </div>
                       <x-input id="password" class="block w-full pl-10 rounded-lg border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                   </div>
               </div>

               <div class="flex items-center">
                   <label for="remember_me" class="flex items-center cursor-pointer">
                       <x-checkbox id="remember_me" name="remember" class="rounded text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                       <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                   </label>
               </div>

               <div>
                   <x-button class="w-full justify-center py-3 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-600">
                       {{ __('Log in') }}
                   </x-button>
               </div>
           </form>

           {{-- <div class="mt-6 text-center">
               <p class="text-sm text-gray-600 dark:text-gray-400">
                   Don't have an account?
                   <a href="{{ route('register') }}" class="font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 focus:outline-none focus:underline">
                       Sign up
                   </a>
               </p>
           </div> --}}

           <!-- Social Login Options (optional) -->
           {{-- <div class="mt-6">
               <div class="relative">
                   <div class="absolute inset-0 flex items-center">
                       <div class="w-full border-t border-gray-300 dark:border-gray-700"></div>
                   </div>
                   <div class="relative flex justify-center text-sm">
                       <span class="px-2 bg-white dark:bg-gray-900 text-gray-500 dark:text-gray-400">
                           Or continue with
                       </span>
                   </div>
               </div>

               <div class="mt-6 grid grid-cols-2 gap-3">
                   <div>
                       <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                           <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                               <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                           </svg>
                       </a>
                   </div>
                   <div>
                       <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-white dark:bg-gray-800 text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                           <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                               <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                           </svg>
                       </a>
                   </div>
               </div>
           </div> --}}
       </x-authentication-card>
   </x-overlay-ched-logo>
</x-guest-layout>

<style>
   @keyframes fadeInUp {
       from {
           opacity: 0;
           transform: translateY(30px);
       }
       to {
           opacity: 1;
           transform: translateY(0);
       }
   }

   .animate-fade-in-up {
       animation: fadeInUp 0.5s ease-out forwards;
   }
</style>
