@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Ürün Düzenle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Ürün Adı</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Fiyat</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control"
                    value="{{ $product->price }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <textarea id="description" name="description"
                    class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Kategoriler</label>
                <select id="categories" name="categories[]" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Görsel</label>
                <input type="file" id="image" name="image" class="form-control">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Ürün Görseli" class="img-thumbnail mt-2" style="width: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-success">Güncelle</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</div>
@endsection
