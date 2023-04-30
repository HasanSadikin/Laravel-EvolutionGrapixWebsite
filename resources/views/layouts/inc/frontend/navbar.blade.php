<header aria-label="Site Header" class="bg-yellow-400 sticky top-0 z-50">
  <div
    class="mx-auto flex h-16 w-full px-4 lg:w-3/4  max-w-screen-2xl items-center justify-between sm:px-6 lg:px-8 relative">
    <div class="flex items-center gap-4">
      <button type="button" onclick="showNavMenus()" class="p-2 lg:hidden">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>

      <a href="{{ url('/') }}" class="flex text-decoration-none">
        <span class="sr-only">Logo</span>
        <h4 class=" text-gray-800">{{ $appSettings->website_name }}</h4>
        {{-- <span class="inline-block h-10 w-32 rounded-lg bg-gray-200"></span> --}}
      </a>
    </div>

    <div class="flex flex-1 items-center justify-end gap-8">
      <nav aria-label="Site Nav" id="navMenus"
        class="absolute bg-gray-800 lg:bg-yellow-400 text-white z-10 top-0 left-0 mt-16 lg:mt-0 w-100 lg:justify-end lg:relative lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500">
        <form action="{{url('/search')}}" method="GET" class="flex items-center flex-1 block h-16 leading-[4rem] text-gray-50 lg:text-gray-800 px-4 text-decoration-none text-gray-800">
          <label for="simple-search" class="sr-only">Search</label>
          <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"></path>
              </svg>
            </div>
            <input type="text" id="simple-search" name="search"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search" required>
          </div>
          <button type="submit"
            class="p-2.5 ml-2 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <span class="sr-only">Search</span>
          </button>
        </form>

        <a href="{{url('collections')}}"
          class="block h-16 leading-[4rem] text-gray-50 lg:text-gray-800 px-4 text-decoration-none text-gray-800 hover:bg-white hover:text-gray-800">
          Products
        </a>

        <a href="{{url('services')}}"
          class="block h-16 leading-[4rem] text-gray-50 lg:text-gray-800 px-4 text-decoration-none text-gray-800 hover:bg-white hover:text-gray-800">
          Services
        </a>
        {{-- 
        <a href="/products"
          class="block h-16 leading-[4rem] text-gray-50 lg:text-gray-800 px-4 text-decoration-none text-gray-800 hover:bg-white hover:text-gray-800">
          Products
        </a>

        <a href="/contact"
          class="block h-16 leading-[4rem] text-gray-50 lg:text-gray-800 px-4 text-decoration-none text-gray-800 hover:bg-white hover:text-gray-800">
          Contact
        </a> --}}
      </nav>

      <div class="flex items-center">
        <div class="flex items-center">
          @guest
            <div class="flex flex-1 items-center justify-end gap-2">
              @if (Route::has('login'))
                <a href="{{ url('/login') }}"
                  class="rounded-md bg-gray-800 text-gray-50 text-decoration-none px-4 py-2 hover:text-white">
                  Login
                </a>
              @endif

              @if (Route::has('register'))
                <a href="{{ url('/register') }}"
                  class="rounded-md border-1 border-gray-800 text-gray-800 text-decoration-none px-4 py-2 hover:text-gray-800">
                  Signup
                </a>
              @endif
            </div>
          @else
            <span class="">
              <a href="{{ url('/cart') }}" class="relative grid h-16 w-16 place-content-center text-gray-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                  xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>

                <span class="absolute top-2 right-2 bg-red-500 text-white w-5 h-5 rounded-full flex justify-center items-center text-xs fw-bold">
                  <livewire:frontend.cart.cart-count />
                </span>

                <span class="sr-only">Cart</span>
              </a>
            </span>
            <livewire:frontend.navbar.account />
          @endguest
        </div>
      </div>
    </div>
  </div>
</header>
