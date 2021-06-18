<nav class="bg-gray-800">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0 flex items-center">>
        </div>
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <a href="{{ route('post.index') }}" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">CRUD Daftar Buku</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pb-3 space-y-1">
      <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
    </div>
  </div>
</nav>