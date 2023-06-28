<nav class="border-gris bg-gris-clair dark:bg-gris-foncer dark:text-blanc">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Home"/>
            <span class="self-center text-2xl font-semibold hover:text-bleu whitespace-nowrap dark:hover:text-bleu-clair">Accueil</span>
        </a>
        <a href="{{ route('property.index') }}" class="flex items-center">
            <span class="self-center text-2xl font-semibold hover:text-bleu whitespace-nowrap dark:hover:text-bleu-clair">Recherche de biens</span>
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gris rounded-lg md:hidden hover:bg-gris-clair focus:outline-none focus:ring-2 focus:ring-gris-clair"
                aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                      clip-rule="evenodd"></path>
            </svg>
        </button>
        @php
            $route = request()->route()->getName();
        @endphp
        <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul class="flex flex-col font-bold mt-4 rounded-lg bg-gris-clair md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent md:dark:bg-transparent ">
                @auth
                    <li>
                        <a href="{{ route('admin.property.index') }}"
                           @class(['dark:text-blanc block py-2 pl-3 pr-4 text-gris-foncer rounded hover:bg-gris-clair md:hover:bg-transparent md:border-0 md:hover:text-bleu md:p-0 md:dark:hover:text-bleu-clair md:dark:hover:bg-transparent', 'active' => str_contains($route, 'property.')])  aria-current="page">Gérer
                            les biens</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.option.index') }}" @class(['dark:text-blanc block py-2 pl-3 pr-4 text-gris-foncer rounded hover:bg-gris-clair md:hover:bg-transparent md:border-0 md:hover:text-bleu md:p-0 md:dark:hover:text-bleu-clair md:dark:hover:bg-transparent', 'active' => str_contains($route, 'option.')]) >Gérer
                            les options</a>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"> {{ \Illuminate\Support\Facades\Auth::user()->name }} <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profil</a>
                                </li>
                                <div class="py-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Se Déconnecter') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                            </ul>
                        </div>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('login') }}">Se connecter</a>
                    </li>
                        <li>
                            <a href="{{ route('register') }}">Créer un Profil</a>
                        </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
