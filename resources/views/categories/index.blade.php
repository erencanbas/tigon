@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Kategoriler</h3>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Yeni Kategori Ekle</a>
    </div>
    <div class="card-body">
        @if($categories->count())
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <div>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?')">Sil</button>
                            </form>
                        </div>
                    </li>
                    @if($category->children->count())
                        <ul class="list-group mt-2 ms-3">
                            @foreach($category->children as $child)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $child->name }}
                                    <div>
                                        <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-sm btn-warning">Düzenle</a>
                                        <form action="{{ route('categories.destroy', $child->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bu kategoriyi silmek istediğinize emin misiniz?')">Sil</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach

            </ul>
        @else
            <p class="text-muted">Henüz kategori eklenmemiş.</p>
        @endif
    </div>
</div>
@endsection