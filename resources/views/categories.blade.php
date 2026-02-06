<x-app-layout title="Categories">

<div class="container">
    <h2>Categories</h2>

    <div class="row">
        @forelse($categories as $category)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <h5>{{ $category->name }}</h5>

                        <a href="{{ route('categories.show', $category->id) }}"
                           class="btn btn-sm btn-primary">
                            View Products
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <p>No categories found</p>
        @endforelse
    </div>
</div>
</x-app-layout>

