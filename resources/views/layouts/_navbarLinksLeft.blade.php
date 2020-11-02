@auth
   <ul class="navbar-nav mr-auto">
      <li class="nav-item">
         <a class="nav-link {{ Route::is('users.*') ? 'active bg-light' : '' }}" href="{{ route('users.index') }}">{{ __('Users') }}</a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{ Route::is('clients.*') ? 'active bg-light' : '' }}" href="{{ route('clients.index') }}">{{ __('Clients') }}</a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{ Route::is('providers.*') ? 'active bg-light' : '' }}" href="{{ route('providers.index') }}">{{ __('Providers') }}</a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{ Route::is('products.*') ? 'active bg-light' : '' }}" href="{{ route('products.index') }}">{{ __('Products') }}</a>
      </li>
      <li class="nav-item">
         <a class="nav-link {{ Route::is('invoices.*') ? 'active bg-light' : '' }}" href="{{ route('invoices.index') }}">{{ __('Invoices') }}</a>
      </li>
   </ul>
@endauth
