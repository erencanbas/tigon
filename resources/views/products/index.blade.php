@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Ürünler</h3>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Yeni Ürün Ekle</a>
    </div>
    <div class="card-body">
        @if($products->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>Ürün Adı</th>
                        <th>Kategoriler</th>
                        <th>Fiyat</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Ürün Görseli" class="img-thumbnail" style="width: 100px; height: 100px;">
                                @else
                                    <span class="text-muted">Görsel Yok</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @foreach($product->categories as $category)
                                    <span class="badge bg-info">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ $product->price }} ₺</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Silmek istediğinize emin misiniz?')">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-muted">Henüz ürün eklenmemiş.</p>
        @endif
    </div>
</div>
@endsection
