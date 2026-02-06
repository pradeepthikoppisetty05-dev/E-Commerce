<x-app-layout title="Categories">


<div class="container">
    <h2>{{ $category->name }}</h2>

    <div class="row">
        @forelse($category->products as $product)
            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <img 
                src="{{ asset('img/' . $product->image) }}"
                alt="{{ $product->name }}"
                class="card-img-top"
                style="height: 200px; object-fit: cover;"
               >
                    <div class="card-body">
                        <h6>{{ $product->name }}</h6>
                        <p>₹{{ number_format($product->price) }}</p>

                        <a href="{{ route('products.show', $product->id) }}"
                           class="btn btn-sm btn-outline-primary">
                            View
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>No products in this category</p>
        @endforelse
    </div>
</div>
</x-app-layout>
