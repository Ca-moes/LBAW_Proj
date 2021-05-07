<div class="card m-3">
    <div class="row">
        <div class="col-lg-4">
            <img src="{{asset('storage/images/' . $image)}}" class="rounded mx-auto d-block" alt=bananas style="margin-left:auto; margin-right:auto;width:8em;height:8em;">
        </div>
        <div class="col-lg-8">
            <div class="card-body">
                <h4 class="card-title text-center mb-3">{{$name}}</h4>


                <div class="row text-center">
                    <div class="col-xl-4">
                        <h5 class="card-text text-muted">Total: {{$quantity}}</h5>
                    </div>

                    <div class="col-xl-4">
                        <button type="button" class="simpleicon plusQuantity">add_circle_outline</button>
                        <button type="button" class="simpleicon minusQuantity"> remove_circle_outline</button>
                    </div>

                    <div class="col-xl-4">
                        <h5 class="card-text">{{$price}}€</h5>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>