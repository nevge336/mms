<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- @php $locale = session()->get('locale') @endphp -->

        <a class="navbar-brand" href="{{config('app.url')}}">
            <img src="{{ asset('images/logo_mms.png') }}" alt="mms logo acceuil" width="75" height="75" class="d-inline-block align-text-top" />
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('students')
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route ('students.index')}}">@lang('list')</a></li>
                        <li><a class="dropdown-item" href="{{route ('students.create')}}">@lang('add')</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('logout')}}">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('lang', 'fr')}}">FR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route ('lang', 'en')}}">EN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>