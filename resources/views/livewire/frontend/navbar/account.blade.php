<div class="">
  <div class="relative">
    <div class="inline-flex items-center overflow-hidden rounded-md">
      <button wire:click="toggleMenu"
        class="h-full p-2 text-gray-600 hover:bg-gray-800 hover:text-white hover:rounded-full {{ $toggle == true ? 'text-white rounded-full bg-gray-800' : '' }}">
        <span class="">
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </span>
      </button>
    </div>

    @if ($toggle == true)
      <div
        class="absolute end-0 z-10 mt-2 w-56 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-lg"
        role="menu">
        <div class="p-2">
          <a href="{{url('/profile')}}"
            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 text-decoration-none"
            role="menuitem">
            Profile
          </a>

          <a href="{{url('/orders')}}"
            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 text-decoration-none"
            role="menuitem">
            Order
          </a>

          <a href="{{url('/cart')}}"
            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 text-decoration-none"
            role="menuitem">
            Cart
          </a>

          <a href="{{url('/wishlist')}}"
            class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 text-decoration-none"
            role="menuitem">
            Wishlist
          </a>
          {{-- 
        <a href="#"
          class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700 text-decoration-none"
          role="menuitem">
          Unpublish Product
        </a> --}}
        </div>

        <div class="p-2">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
              class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50"
              role="menuitem">
              <i class="fa fa-sign-out"></i>{{ __('Logout') }}
            </button>
          </form>
        </div>
      </div>
    @endif
  </div>
</div>
