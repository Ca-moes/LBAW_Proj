<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 mx-auto">

    <div class="card h-100" style="width: 540px; height: 200px; max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">

                @isset($images[0])
                 {{-- {{$images[0]->path}} --}}
                <img src="{{ asset('storage/images/' .$images[0]->path) }}" class="card-img-top" alt= {{$name}} style="margin-left:auto; margin-right:auto;width:8em;height:8em;">
                @endisset
                

               
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$name}}</h5>
                    <p class="card-text"><small class="text-muted">{{$price}}€/{{$unit}}</small></p>
                    <p class="card-text">{{$description}}</p>
                </div>
            </div>
        </div>
    </div>

</div>