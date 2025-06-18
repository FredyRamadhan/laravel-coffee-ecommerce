<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <x-application-logo class="block h-8 w-auto fill-current text-coffee-600 dark:text-coffee-400" />
                </a>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link href="/" :active="request()->is('/')" class="text-gray-700 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400">
                    {{ __('Beranda') }}
                </x-nav-link>
                <x-nav-link href="/products" :active="request()->is('products')" class="text-gray-700 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400">
                    {{ __('Katalog') }}
                </x-nav-link>
                <x-nav-link href="/about" :active="request()->is('about')" class="text-gray-700 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400">
                    {{ __('Tentang kami') }}
                </x-nav-link>
                <x-nav-link :href="route('order.history')" :active="request()->routeIs('order.history')" class="text-gray-700 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400">
                    {{ __('Riwayat Pesanan') }}
                </x-nav-link>

            </div>

            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @auth
                <a href="{{ route('cart') }}" class="relative p-2 text-gray-600 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400 transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c.51 0 .962-.344 1.087-.835l1.823-6.84a1.125 1.125 0 00-.986-1.437H5.625M11.25 11.25L12 14.25" />
                    </svg>
                    <span class="sr-only">Keranjang</span>
                </a>
                @endauth

                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-coffee-600 dark:hover:text-coffee-400 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-coffee-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-700 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                        {{ __('Login') }}
                    </a>
                    <a href="{{ route('register') }}" class="bg-coffee-600 hover:bg-coffee-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                        {{ __('Register') }}
                    </a>
                </div>
                @endauth
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:text-coffee-600 dark:hover:text-coffee-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-coffee-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/" :active="request()->is('/')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/products" :active="request()->is('products')">
                {{ __('Katalog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="/about" :active="request()->is('about')">
                {{ __('Tentang kami') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('order.history')" :active="request()->routeIs('order.history')">
                {{ __('Riwayat Pesanan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                {{ __('Keranjang') }}
            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            @auth
            <div class="px-4">
                <div class="font-medium text-base text-gray-900 dark:text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
            <div class="px-4 py-2 space-y-2">
                <a href="{{ route('login') }}" class="block w-full text-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}" class="block w-full text-center px-4 py-2 bg-coffee-600 hover:bg-coffee-700 text-white rounded-lg transition-colors">
                    {{ __('Register') }}
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>