<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid d-flex justify-content-between">
        <!-- @php $locale = session()->get('locale') @endphp -->
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="{{config('app.url')}}">
                <img src="{{ asset('images/logo_mms.png') }}" alt="mms logo acceuil" width="75" height="75" class="d-inline-block align-text-top" />
            </a>
            <div class="display-4 font-bruno">
                MMS
            </div>
            
        </div>
        <div class="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('Forum')
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route ('blog.index')}}">@lang('list')</a></li>
                            <li><a class="dropdown-item" href="{{route ('blog.create')}}">@lang('add')</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('students')
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route ('students.index')}}">@lang('list')</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.show', Auth::user()->student->id) }}">@lang('my_profile')</a>
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
    </div>
</nav>