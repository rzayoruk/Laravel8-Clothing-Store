
@php
    $parentCategories=  \App\Http\Controllers\HomeController::categoryList();

@endphp




<a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
    <h6 class="m-0">Categories</h6>
    <i class="fa fa-angle-down text-dark"></i>
</a>
<nav class="collapse @if(isset($page)) show @endif navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

        @foreach($parentCategories as $rows)
        <div class="nav-item dropdown">
                @if(count($rows->children))
                <a href="#" class="nav-link" data-toggle="dropdown">{{$rows->title}}<i class="fa fa-angle-down float-right mt-1">sub</i></a>
                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                    @include('home.categorytree',['children'=>$rows->children])
                </div>
                @else
                <a href="" class="nav-item nav-link">{{$rows->title}}</a>
                @endif

        </div>
        @endforeach


    </div>
</nav>




