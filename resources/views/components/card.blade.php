<div id="card">
    <figure>
        <img src="{{ asset('mockup.png') }}" alt="">
    </figure>
    <div>
        <a href="{{ route('product.show', $product->id) }}"><h2>{{$product->slug}}</h2></a>
        <p>{{number_format($product->price, 0, ',', '.') }}</p>
        <p>Qty: {{$product->stock}}</p>
        <div class="btn-group">

            <a href="{{ route('product.destroy', $product->id) }}">
            <button
                    style="background-color: var(--bg-error);">Delete</button>
                </a>
            <a href="{{ route('product.edit',$product->id) }}">
                <button style="background-color: var(--bg-success);">
                    Edit</button></a>
        </div>
    </div>
</div>
