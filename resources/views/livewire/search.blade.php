

<div>

    <input wire:model="search" name="search" type="text" class="form-control" list="myList" placeholder="Search for products">

    @if(!empty($query))
        <datalist id="myList">
            @foreach($datalist as $rows)
                <option value="{{$rows->title}}">{{$rows->category->title}}</option>
            @endforeach
        </datalist>
    @endif

</div>
