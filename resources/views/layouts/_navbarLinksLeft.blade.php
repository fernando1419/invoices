<ul class="navbar-nav mr-auto">
   <li class="nav-item">
      <a class="nav-link {{ Route::is('users.*') ? 'active bg-light' : '' }}" href="{{ route('users.index') }}">{{ __('Users') }}</a>
   </li>
   <li class="nav-item">
      <a class="nav-link {{ Route::is('clients.*') ? 'active bg-light' : '' }}" href="{{ route('clients.index') }}">{{ __('Clients') }}</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="#">{{ __('Providers') }}</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="#">{{ __('Products') }}</a>
   </li>
   <li class="nav-item">
      <a class="nav-link" href="#">{{ __('Invoices') }}</a>
   </li>
</ul>
