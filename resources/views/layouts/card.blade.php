<div class="col-lg-3 col-md-6 bt-3 mb-4">
    <div class="card ">
        <div class="overlay">
            <a href="{{route('product',[isset($category)?$category->code:$product->category->code,$product->id])}}" >
                <img class="card-img-top mt-2" src="{{\Illuminate\Support\Facades\Storage::url($product->img)}}" alt="" style="max-height: 300px" ></a>
            <a href="{{route('product',[isset($category)?$category->code:$product->category->code,$product->id])}}">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>
        <div  class="card-body text-center">
            <a href="{{route('product',[isset($category)?$category->code:$product->category->code,$product->id])}}" class="grey-text"><h5>{{isset($category)? $category->name:$product->category->name}}</h5></a>
            <strong>
                <a href="{{route('product',[isset($category)?$category->code:$product->category->code,$product->id])}}" class="dark-grey-text waves-effect"><h5>{{$product->name}}</h5></a>
            </strong>
            <h4 class="font-weight-bold blue-text"><strong>{{$product->price}}</strong></h4>
        </div>
    </div>
</div>
