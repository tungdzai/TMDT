@foreach($category as $item)
<div class="col-lg-2 col-md-3 pb-1">
    <div class="cat-item d-flex flex-column border mb-5 justify-content-center" >
        <a href="{{route('category.show',['id' => $item->id])}}" class="cat-img position-relative overflow-hidden mb-3" style="display: flex;justify-content: center">
            <img class="img-fluid" src="{{ asset('storage/'.$item->image)}}" alt="" style="width: 50%">
        </a>
        <div class="titleCategory" style="display: flex;justify-content: center">{{$item->name}}</div>
    </div>
</div>
@endforeach
