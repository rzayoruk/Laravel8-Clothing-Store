@foreach($children as $subcategory)
    <div class="nav-item dropdown">
    @if(count($subcategory->children))


            <a href="#" class="nav-link" data-toggle="dropdown">{{$subcategory->title}} <i class="fa fa-angle-down float-right mt-1">sub</i></a>
            <div class="nav-item dropdown">
                @include('home.categorytree',['children'=>$subcategory->children])
            </div>
    @else
            <a href="" class="nav-item nav-link">{{$subcategory->title}}</a>
    @endif
    </div>
@endforeach
