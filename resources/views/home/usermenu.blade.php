<div class="col-md-3 pb-4">
    <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
        <div class="position-relative" style="z-index: 1;">
            <h3>User Panel</h3>
            <ul>
                <li><a href="{{route('userprofile')}}">My Profile</a></li>
                <li><a href="{{route('user_orders')}}">My Orders</a></li>
                <li><a href="{{route('myreviews')}}">My Reviews</a></li>
                <li><a href="{{route('user_shopcart')}}">My Shopcart</a></li>
                <li><a href="{{route('user_products')}}">My Products</a></li>
                <li><a href="{{route('logout')}}">logout</a></li>
                @php
                $userRoles=\Illuminate\Support\Facades\Auth::user()->roles->pluck('name');
                @endphp
                @if($userRoles->contains('admin'))
                    <li><a href="{{route('adminhome')}}" target="_blank">Admin Panel</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
