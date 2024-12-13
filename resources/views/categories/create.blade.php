@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Yeni Kategori Ekle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Kategori Adı</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Üst Kategori</label>
                <select id="parent_id" name="parent_id" class="form-select">
                    <option value="">Yok</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Kaydet</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</div>
@endsection
