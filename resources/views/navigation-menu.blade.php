<nav x-data="{ open: false }" class="bg-doraemon-100 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 sticky top-0 z-30">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <div class="flex justify-between h-16 text-white">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <!-- Background Image (repositioned) -->
                {{-- <div class="absolute right-0 top-0 h-full w-64 lg:w-96 opacity-70 pointer-events-none -z-10">
                  <img src="{{ asset('img/chedNavOverlay.png') }}" alt="CHED Overlay" class="h-full w-full object-contain">
                </div> --}}


                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                     @if(auth()->user()->role === 'admin')
                        <x-nav-link href="{{ route('dashboard2') }}" :active="request()->routeIs('dashboard2')">
                              Dashboard
                        </x-nav-link>
                     @endif

                     @if (auth()->user()->role === 'admin')
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                           Incoming
                        </x-nav-link>
                     @else
                        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                           Inbox
                        </x-nav-link>
                     @endif
                    {{-- <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        Incoming
                    </x-nav-link> --}}
                    <x-nav-link href="{{ route('outgoing') }}" :active="request()->routeIs('outgoing')">
                        Outgoing
                    </x-nav-link>
                    @if(auth()->user()->role === 'admin')
                        <x-nav-maintenance href="#" :dropdown="true" class="flex justify-center items-center text-white">
                           Maintenance
                        </x-nav-maintenance>
                    @endif

                    <x-nav-link href="{{ route('trackpage') }}" :active="request()->routeIs('trackpage')">
                        Track
                    </x-nav-link>
                    <x-nav-link href="{{ route('mailsent') }}" :active="request()->routeIs('mailsent')">
                        Mail
                    </x-nav-link>
                    {{-- <x-nav-link href="{{ route('gmail') }}" :active="request()->routeIs('gmail')">
                        {{ __('Gmail') }}
                    </x-nav-link> --}}

                    @if(auth()->user()->role === 'admin')
                        <x-nav-link href="{{ route('usermanagement') }}" :active="request()->routeIs('usermanagement')">
                              User Management
                        </x-nav-link>
                     @endif
                </div>

            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
               <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative flex items-center justify-between gap-x-8">
                     <!-- Notification Bell -->
                     <div>
                        <!-- Notification Bell -->
                        <div class="relative">
                           <button id="notif-button" type="button"
                              class="relative inline-flex items-center justify-center p-2 text-gray-600 dark:text-white transition-colors duration-200 rounded-full dark:hover:bg-gray-700 ">
                              <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 01-6 0v-1m6 0H9" />
                              </svg>
                              <div id="notif-badge"
                                 class="absolute flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-1 -right-1 dark:border-gray-800 transform transition-transform duration-300 scale-0 origin-center">
                                 0
                              </div>
                           </button>

                           <!-- Dropdown -->
                           <div id="notif-dropdown"
                           class="absolute right-0 z-50 mt-2 w-80 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 hidden overflow-hidden transform transition-all duration-300 opacity-0 scale-95 origin-top-right">
                              <!-- Header with counter -->
                              <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-700 border-b border-gray-200 dark:border-gray-600">
                                 <h3 class="font-medium text-gray-900 dark:text-white">Notifications</h3>
                                 <span id="notif-counter" class="text-xs font-medium text-gray-500 dark:text-gray-400">0 new</span>
                              </div>

                              <!-- Scrollable Notification List -->
                              <div class="max-h-96 overflow-y-auto" id="notif-scroll-container">
                                 <ul id="notif-list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <li class="p-4 text-center text-gray-500 dark:text-gray-400">No new notifications</li>
                                 </ul>
                              </div>

                              <!-- Fixed "Mark all as read" button -->
                              <div id="mark-read-container" class="p-3 bg-gray-50 dark:bg-gray-700 text-center border-t border-gray-200 dark:border-gray-600">
                                 <button id="mark-read" class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors duration-200">
                                    Mark all as read
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>

                    <!-- Theme Toggle -->
                    <div class="ms-auto flex items-center">
                        <button id="theme-toggle" type="button" class="text-white dark:text-gray-400  dark:hover:bg-gray-700  rounded-full text-sm p-2.5">
                            <svg id="theme-toggle-sun-icon" class="w-5 h-5 text-white  " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"></path>
                            </svg>
                            <svg id="theme-toggle-moon-icon" class="hidden w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.29 13.29A8 8 0 016.71 2.71 8 8 0 1017.29 13.29z"></path>
                            </svg>
                        </button>
                     </div>

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">

                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                  <!-- Theme Toggle -->
                  <div class="ms-auto flex items-center">
                     <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-sun-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M10 15a5 5 0 1 0 0-10 5 5 0 0 0 0 10Zm0-11a1 1 0 0 0 1-1V1a1 1 0 0 0-2 0v2a1 1 0 0 0 1 1Zm0 12a1 1 0 0 0-1 1v2a1 1 0 1 0 2 0v-2a1 1 0 0 0-1-1ZM4.343 5.757a1 1 0 0 0 1.414-1.414L4.343 2.929a1 1 0 0 0-1.414 1.414l1.414 1.414Zm11.314 8.486a1 1 0 0 0-1.414 1.414l1.414 1.414a1 1 0 0 0 1.414-1.414l-1.414-1.414ZM4 10a1 1 0 0 0-1-1H1a1 1 0 0 0 0 2h2a1 1 0 0 0 1-1Zm15-1h-2a1 1 0 1 0 0 2h2a1 1 0 0 0 0-2ZM4.343 14.243l-1.414 1.414a1 1 0 1 0 1.414 1.414l1.414-1.414a1 1 0 0 0-1.414-1.414ZM14.95 6.05a1 1 0 0 0 .707-.293l1.414-1.414a1 1 0 1 0-1.414-1.414l-1.414 1.414a1 1 0 0 0 .707 1.707Z"></path>
                        </svg>
                        <svg id="theme-toggle-moon-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path d="M17.29 13.29A8 8 0 016.71 2.71 8 8 0 1017.29 13.29z"></path>
                        </svg>
                     </button>
                  </div>
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Incoming') }}
            </x-responsive-nav-link>
        </div>
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('outgoing') }}" :active="request()->routeIs('outgoing')">
                {{ __('Outgoing') }}
            </x-responsive-nav-link>
        </div>
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('outgoing') }}" :active="request()->routeIs('outgoing')">
                {{ __('Maintenance') }}
            </x-responsive-nav-link>
        </div>
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('outgoing') }}" :active="request()->routeIs('outgoing')">
                {{ __('Track') }}
            </x-responsive-nav-link>
        </div>
        <div class="pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('outgoing') }}" :active="request()->routeIs('outgoing')">
                {{ __('User Management') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}"
                                   @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
{{-- @vite(['resources/js/notif-bell.js']) --}}

<script>
   // document.addEventListener("DOMContentLoaded", function () {
   //    function fetchNotifications() {
   //       fetch("/notifications/fetch")
   //             .then(response => response.json())
   //             .then(notifications => {
   //                let notifBadge = document.getElementById("notif-badge");
   //                let notifList = document.getElementById("notif-list");
   //                notifList.innerHTML = ""; // Clear previous notifications

   //                if (notifications.length > 0) {
   //                   notifBadge.classList.remove("hidden");
   //                   notifBadge.textContent = notifications.length; // Update count

   //                   notifications.forEach(notification => {
   //                         let li = document.createElement("li");
   //                         li.classList.add("p-3", "border-b", "cursor-pointer", "hover:bg-gray-100", "dark:hover:bg-gray-700", "rounded-md");

   //                         // Format Date
   //                         let formattedDate = new Date(notification.created_at).toLocaleString();

   //                         li.innerHTML = `
   //                            <div class="flex flex-col">
   //                               <span class="text-sm font-semibold text-gray-900 dark:text-white">${notification.sender}</span>
   //                               <span class="text-sm text-gray-700 dark:text-gray-300">${notification.message}</span>
   //                               <span class="text-xs text-gray-500 dark:text-gray-400">${formattedDate}</span>
   //                            </div>
   //                         `;
   //                         notifList.appendChild(li);
   //                   });

   //                   // Add "Mark all as read" option
   //                   let markAsRead = document.createElement("li");
   //                   markAsRead.classList.add("p-2", "text-center", "text-blue-600", "cursor-pointer", "hover:bg-gray-200", "dark:hover:bg-gray-700", "rounded-md");
   //                   markAsRead.innerHTML = `<a href="#" id="mark-read">Mark all as read</a>`;
   //                   notifList.appendChild(markAsRead);

   //                   // Add event listener for marking notifications as read
   //                   document.getElementById("mark-read").addEventListener("click", markNotificationsAsRead);
   //                } else {
   //                   notifBadge.classList.add("hidden");
   //                   notifList.innerHTML = `<li class="p-3 text-center text-gray-500 dark:text-gray-400">No new notifications</li>`;
   //                }
   //             })
   //             .catch(error => console.error("Error fetching notifications:", error));
   //    }

   //    function markNotificationsAsRead() {
   //       fetch("/notifications/mark-as-read", {
   //             method: "POST",
   //             headers: {
   //                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
   //             }
   //       })
   //       .then(response => response.json())
   //       .then(() => {
   //             fetchNotifications(); // Refresh notifications after marking as read
   //       })
   //       .catch(error => console.error("Error marking notifications as read:", error));
   //    }

   //    // Toggle dropdown visibility
   //    document.getElementById("notif-button").addEventListener("click", function () {
   //       document.getElementById("notif-dropdown").classList.toggle("hidden");
   //    });

   //    // Fetch notifications every 30 seconds
   //    setInterval(fetchNotifications, 30000);
   //    fetchNotifications(); // Initial load
   // });
   document.addEventListener("DOMContentLoaded", function () {
      const notifButton = document.getElementById("notif-button");
      const notifDropdown = document.getElementById("notif-dropdown");
      const notifBadge = document.getElementById("notif-badge");
      const notifList = document.getElementById("notif-list");
      const markReadContainer = document.getElementById("mark-read-container");
      const markReadButton = document.getElementById("mark-read");
      const notifCounter = document.getElementById("notif-counter");

      // Fetch notifications
      function fetchNotifications() {
         fetch("/notifications/fetch")
               .then(response => response.json())
               .then(notifications => {
                  notifList.innerHTML = ""; // Clear previous notifications

                  if (notifications.length > 0) {
                     notifBadge.classList.remove("hidden");
                     notifBadge.textContent = notifications.length; // Update count
                     notifCounter.textContent = notifications.length + " new"; // Update counter in dropdown header

                     // Animate badge if it's newly appearing
                     if (notifBadge.classList.contains("scale-0")) {
                        notifBadge.classList.remove("scale-0");
                        notifBadge.classList.add("scale-100");

                        // Add subtle bell animation
                        notifButton.classList.add("animate-ping-once");
                        setTimeout(() => {
                           notifButton.classList.remove("animate-ping-once");
                        }, 1000);
                     }

                     notifications.forEach(notification => {
                           let li = document.createElement("li");
                           li.classList.add("p-4", "hover:bg-gray-50", "dark:hover:bg-gray-700", "transition-colors", "duration-150");

                           // Format Date
                           let formattedDate = new Date(notification.created_at).toLocaleString();

                           li.innerHTML = `
                              <div class="flex items-start">
                                 <div class="flex-shrink-0">
                                    <div class="w-2 h-2 mt-1 mr-3 bg-blue-500 rounded-full"></div>
                                 </div>
                                 <div class="flex-1 min-w-0">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-white">${notification.sender}</span>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 mt-1">${notification.message}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">${formattedDate}</p>
                                 </div>
                              </div>
                           `;
                           notifList.appendChild(li);
                     });

                     // Show "Mark all as read" button
                     markReadContainer.classList.remove("hidden");
                  } else {
                     notifBadge.classList.add("hidden");
                     notifCounter.textContent = "0 new";
                     notifList.innerHTML = `<li class="p-4 text-center text-gray-500 dark:text-gray-400">No new notifications</li>`;
                     markReadContainer.classList.add("hidden");
                  }
               })
               .catch(error => {
                  console.error("Error fetching notifications:", error);
                  notifList.innerHTML = `<li class="p-4 text-center text-red-500 dark:text-red-400">Failed to load notifications</li>`;
               });
      }

      // Mark notifications as read
      function markNotificationsAsRead() {
         markReadButton.innerHTML = `<svg class="inline-block animate-spin h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
         </svg> Processing...`;

         fetch("/notifications/mark-as-read", {
               method: "POST",
               headers: {
                  "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
               }
         })
         .then(response => response.json())
         .then(() => {
               fetchNotifications(); // Refresh notifications after marking as read
               markReadButton.textContent = "Mark all as read"; // Reset button text
         })
         .catch(error => {
               console.error("Error marking notifications as read:", error);
               markReadButton.textContent = "Mark all as read"; // Reset button text
               // Show error message
               const errorToast = document.createElement("div");
               errorToast.className = "fixed bottom-4 right-4 bg-red-500 text-white px-4 py-2 rounded shadow-lg";
               errorToast.textContent = "Failed to mark notifications as read";
               document.body.appendChild(errorToast);
               setTimeout(() => errorToast.remove(), 3000);
         });
      }

      // Attach event listener to "Mark all as read" button
      markReadButton.addEventListener("click", markNotificationsAsRead);

      // Toggle notification dropdown with animation
      notifButton.addEventListener("click", function (event) {
         event.stopPropagation(); // Prevents closing dropdown immediately

         if (notifDropdown.classList.contains("hidden")) {
            // Open dropdown
            notifDropdown.classList.remove("hidden");
            // Add animation class after a tiny delay to trigger transition
            setTimeout(() => {
               notifDropdown.classList.add("transition-all", "duration-200", "opacity-100", "scale-100");
               notifDropdown.classList.remove("opacity-0", "scale-95");
            }, 10);
         } else {
            // Close dropdown with animation
            notifDropdown.classList.add("opacity-0", "scale-95");
            notifDropdown.classList.remove("opacity-100", "scale-100");
            // Hide after animation completes
            setTimeout(() => {
               notifDropdown.classList.add("hidden");
            }, 200);
         }
      });

      // Close dropdown when clicking outside
      document.addEventListener("click", function (event) {
         if (!notifDropdown.contains(event.target) && !notifButton.contains(event.target) && !notifDropdown.classList.contains("hidden")) {
            // Close dropdown with animation
            notifDropdown.classList.add("opacity-0", "scale-95");
            notifDropdown.classList.remove("opacity-100", "scale-100");
            // Hide after animation completes
            setTimeout(() => {
               notifDropdown.classList.add("hidden");
            }, 200);
         }
      });

      // Fetch notifications every 30 seconds
      setInterval(fetchNotifications, 30000);
      fetchNotifications(); // Initial load
   });
</script>
