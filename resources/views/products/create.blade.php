@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Yeni Ürün Ekle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ürün Adı</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Fiyat</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Kategoriler</label>
                <select id="categories" name="categories[]" class="form-select">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @if($category->children->count())
                            @php $prefix = '--'; @endphp
                            @foreach($category->children as $child)
                                <option value="{{ $child->id }}">{{ $prefix }} {{ $child->name }}</option>
                                @if($child->children->count())
                                    @php $subprefix = $prefix . '--'; @endphp
                                    @foreach($child->children as $subchild)
                                        <option value="{{ $subchild->id }}">{{ $subprefix }} {{ $subchild->name }}</option>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Görsel</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Kaydet</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</div>
@endsection
