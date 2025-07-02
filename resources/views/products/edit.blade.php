<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-4" style="max-width: 900px;">
                    <h5 class="mb-3 text-center">Edit Produk</h5>

                    @if ($errors->any())
                        <div class="alert alert-danger small">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('products.update', ['product'=>$product]) }}" class="small">
                        @csrf
                        @method('PUT')

                        <div class="mb-2">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control form-control-sm" id="name" name="name"
                                value="{{ old('name', $product->name) }}" required />
                        </div>

                        <div class="mb-2">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" class="form-control form-control-sm" id="quantity" name="quantity"
                                value="{{ old('quantity', $product->quantity) }}" min="0" required />
                        </div>

                        <div class="mb-2">
                            <label for="price" class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control form-control-sm" id="price" name="price"
                                value="{{ old('price', $product->price) }}" step="0.01" min="0" required />
                        </div>

                        <div class="mb-2">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control form-control-sm" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                            <a href="{{ route('products.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
