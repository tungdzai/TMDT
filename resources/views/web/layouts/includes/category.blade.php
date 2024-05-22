<div class="col-lg-2 d-none d-lg-block">
    <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 35px; margin-top: -3px; padding: 0 30px;">
        <h6 class="m-0" style="color: #FFFFFF">Danh mục</h6>
        <i class="fa fa-angle-down"></i>
    </a>
    <?php $category = new App\Models\Category();
        $category = $category->all();
    ?>
    <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical" >
        <div class="navbar-nav w-100 overflow-hidden"  style="height: 450px ;color: #FFFFFF">
            <div class="nav-item dropdown" style="overflow-y: auto;">
                @foreach($category as $item)
                    <a href="{{route('category.show',['id' => $item->id])}}" class="nav-item nav-link">{{$item->name}}</a>
                @endforeach
            </div>
        </div>
    </nav>
</div>
