<nav class="navbar navbar-expand-lg" style="background-color: mediumpurple">
    <div  class="container-fluid" style="margin-left: 15px">
        <a class="navbar-brand" href="{{route('welcome')}}"><img style="width: 80px" src="{{asset('/public/image.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white" aria-current="page" href="{{route('welcome')}}">Главная</a>
                </li>
                @guest()
                <li class="nav-item">
                    <a class="nav-link active" style="color: white" aria-current="page"  href="{{ route ('page_registration') }}" >Регистрация</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" style="color: white" aria-current="page" href="{{route('page_auth')}}">Авторизация</a>
                </li>
                @endguest

                @auth()
                    @if(\Illuminate\Support\Facades\Auth::user() and \Illuminate\Support\Facades\Auth::user()->role == '0')

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: white" href="{{route('ShowApplicationsAdminPage')}}">Мои заявки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: white" href="{{route('page_exit')}}">Выход</a>
                        </li>
                    @elseif(\Illuminate\Support\Facades\Auth::user() and \Illuminate\Support\Facades\Auth::user()->role == '1')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: white" href="{{route('ShowCategoriesAdminPage')}}">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: white" href="{{route('profile')}}">Заявки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" style="color: white" href="{{route('page_exit')}}">Выход</a>
                        </li>
                    @endif
                    @endauth

            </ul>
        </div>
    </div>
</nav>
