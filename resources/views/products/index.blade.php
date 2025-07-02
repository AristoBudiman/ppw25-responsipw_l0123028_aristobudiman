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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Data Produk</h5>
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Tambah Produk</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show small" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table class="table table-sm table-bordered align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 60px;">ID</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th style="width: 110px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td class="text-center">{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ $product->quantity }}</td>
                                    <td class="text-end">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td>{{ $product->description ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('products.edit', ['product'=>$product]) }}" 
                                            class="btn btn-warning btn-sm">Edit</a>
                                            <a href="" 
                                            class="btn btn-danger btn-sm">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>