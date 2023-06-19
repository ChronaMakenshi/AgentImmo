<nav class="border-gris bg-gris-clair dark:bg-gris-foncer dark:border-gris-foncer">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('property.index') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Home"/>
            <span class="self-center text-2xl font-semibold hover:text-bleu dark:hover:text-bleu-clair whitespace-nowrap dark:text-blanc">Accueil</span>
        </a>
        <button data-collapse-toggle="navbar-solid-bg" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gris rounded-lg md:hidden hover:bg-gris-clair focus:outline-none focus:ring-2 focus:ring-gris-clair dark:text-gris dark:hover:bg-gris-foncer dark:focus:ring-gris-foncer"
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
            <ul class="flex flex-col font-bold mt-4 rounded-lg bg-gris-clair md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gris-foncer md:dark:bg-transparent dark:border-gris-foncer">
                <li>
                    <a href="{{ route('admin.property.index') }}"
                       @class(['block py-2 pl-3 pr-4 text-gris-foncer rounded hover:bg-gris-clair md:hover:bg-transparent md:border-0 md:hover:text-bleu md:p-0 dark:text-blanc md:dark:hover:text-bleu-clair dark:hover:bg-gris-foncer dark:hover:text-blanc md:dark:hover:bg-transparent', 'active' => str_contains($route, 'property.')])  aria-current="page">Gérer
                        les biens</a>
                </li>
                <li>
                    <a href="{{ route('admin.option.index') }}" @class(['block py-2 pl-3 pr-4 text-gris-foncer rounded hover:bg-gris-clair md:hover:bg-transparent md:border-0 md:hover:text-bleu md:p-0 dark:text-blanc md:dark:hover:text-bleu-clair dark:hover:bg-gris-foncer dark:hover:text-blanc md:dark:hover:bg-transparent', 'active' => str_contains($route, 'option.')]) >Gérer
                        les options</a>
                </li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="block py-2 pl-3 pr-4 text-gris-foncer rounded hover:bg-gris-clair md:hover:bg-transparent md:border-0 md:hover:text-bleu md:p-0 dark:text-blanc md:dark:hover:text-bleu-clair dark:hover:bg-gris-foncer dark:hover:text-blanc md:dark:hover:bg-transparent">Se déconnecter</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
