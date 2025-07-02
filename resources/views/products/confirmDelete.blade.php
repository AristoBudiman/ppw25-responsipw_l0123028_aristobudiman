<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="container mt-4" style="max-width: 900px;">
                    <h5 class="mb-3 text-center text-danger">Konfirmasi Hapus Produk</h5>

                    <form method="POST" action="{{ route('products.destroy', ['product'=>$product]) }}" class="small">
                        @csrf
                        @method('DELETE')

                        <div class="mb-2">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $product->name }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control form-control-sm" disabled>{{ $product->description }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $product->price }}" disabled>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Jumlah</label>
                            <input type="number" class="form-control form-control-sm" value="{{ $product->quantity }}" disabled>
                        </div>

                        <div class="alert alert-warning mt-3 p-2">
                            Apakah Anda yakin ingin menghapus produk ini?
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            <a href="{{ route('products.index') }}" class="btn btn-success btn-sm">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>