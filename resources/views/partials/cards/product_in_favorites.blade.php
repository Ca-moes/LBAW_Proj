<div class="col">
    <div class="card">
        <img src="{{ asset($image) }}" class="card-img-top" alt="...">
        <div class="card-img-overlay d-flex justify-content-end overdiv">

            <label for="favorite{{ $id }}" class="favorite-checkbox">
                <input type="checkbox" checked id="favorite{{ $id }}" />
                <i class="bi bi-heart"></i>
                <i class="bi bi-heart-fill"></i>
            </label>

        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $name }}</h5>
            <p class="card-text d-none d-md-block text-truncate">{{ $description }}</p>
            <h6 class="card-title text-end text-md-start order-md-3">{{ $price }}€/{{ $unit }}</h6>
            {{-- TODO: Link correto--}}
            <a href="#" class="stretched-link"></a>
        </div>
    </div>
</div>
