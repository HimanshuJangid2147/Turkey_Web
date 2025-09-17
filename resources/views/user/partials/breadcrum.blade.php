{{-- Breadcrumb Navigation --}}
@if(isset($breadcrumbs) && count($breadcrumbs) > 0)
<link rel="stylesheet" href="{{ asset('css/user_css/breadcrum.css') }}">
<nav aria-label="breadcrumb" class="breadcrumb-wrapper">
  <div class="container-fluid px-4">
    <ol class="breadcrumb breadcrumb-custom mb-0">
      <li class="breadcrumb-item breadcrumb-home">
        <a href="/" class="breadcrumb-link">
          <i class="bi bi-house-door-fill me-1"></i>Home
        </a>
      </li>
      @foreach($breadcrumbs as $breadcrumb)
        @if($loop->last)
          <li class="breadcrumb-item active breadcrumb-current" aria-current="page">
            <span class="breadcrumb-text">{{ $breadcrumb['title'] }}</span>
          </li>
        @else
          <li class="breadcrumb-item">
            <a href="{{ $breadcrumb['url'] }}" class="breadcrumb-link">
              {{ $breadcrumb['title'] }}
            </a>
          </li>
        @endif
      @endforeach
    </ol>
  </div>
</nav>
@endif
