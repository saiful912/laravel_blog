<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Categories</h4>
                    <div class="list-group">
                        @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',Null)->get() as $parent)
                        <div class="parent">
                            <a href="#main-{{$parent->id}}" data-toggle="collapse">
                                {{$parent->name}}
                            </a>
                        </div>
                            <div class="collapse" id="main-{{$parent->id}}">
                                <div class="child-rows">
                                    @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                                    <a href="{{route('categories.show',$child->id)}}" style="color: white;margin-left: 10px;display: block">{{$child->name}}</a>
                                        @endforeach
                                </div>
                            </div>
                            @endforeach
                    </div>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="{{route('register')}}" class="text-white">Register</a></li>
                        <li><a href="{{route('login')}}" class="text-white">Login</a></li>
                        <li><a href="{{route('carts')}}" class="text-white">Cart ( {{App\Models\Cart::totalItems()}} )</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2"
                     viewBox="0 0 24 24" focusable="false">
                    <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
                    <circle cx="12" cy="13" r="4"/>
                </svg>
                <strong>Laravel</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>
