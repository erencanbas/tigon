@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Kategori Düzenle</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Kategori Adı</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Üst Kategori</label>
                <select id="parent_id" name="parent_id" class="form-select">
                    <option value="">Yok</option>
                    @foreach($categories as $parent)
                        <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                            {{ $parent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Güncelle</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Geri Dön</a>
        </form>
    </div>
</div>
@endsection
