<div>
    @if(session()->has('message'))
        <div class="alert alert-success alert-block">
            {{session('message')}}
        </div>
    @endif


    <form wire:submit.prevent="store">
        <div class="d-flex my-3">
            <p class="mb-0 mr-2">Your Rating * :</p>
            <div class="text-primary">
                <div class="rating"><!--
        --><input name="stars" wire:model="rate" id="e1" type="radio" value="1"></a><label for="e1">☆</label><!--
		--><input name="stars" wire:model="rate" id="e2" type="radio" value="2"></a><label for="e2">☆</label><!--
		--><input name="stars" wire:model="rate" id="e3" type="radio" value="3"></a><label for="e3">☆</label><!--
		--><input name="stars" wire:model="rate" id="e4" type="radio" value="4"></a><label for="e4">☆</label><!--
		--><input name="stars" wire:model="rate" id="e5" type="radio" value="5"></a><label for="e5">☆</label>
                    @error('rate')<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>{{ $message }}</strong></div>@enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Subject</label>
            <input type="text" class="form-control" wire:model="subject" id="subject">
            @error('subject')<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>{{ $message }}</strong></div>@enderror
        </div>
        <div class="form-group">
            <label for="message">Your Review *</label>
            <textarea id="message" wire:model="review" cols="30" rows="5" class="form-control"></textarea>
            @error('review')<div class="alert alert-danger alert-block"><button type="button" class="close" data-dismiss="alert">×</button><strong>{{ $message }}</strong></div>@enderror
        </div>
        <div class="form-group mb-0">
            @auth()
            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
        </div>
    </form>
            @else()

        <a href="/login" class="nav-item nav-link">Login for to Review</a>
        @endauth



</div>
