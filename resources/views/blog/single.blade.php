@extends("layout/public")

@section("title")
{{ $blog->naslov }}
@endsection

@section("content")
<h1>Single blog stranica</h1>

<p>
    Objavljeno: {{ $blog->created_at->format('d.m.Y H:i') }}
</p>

<div class="card">
    <div class="card-body p-3">
        <h2 class="card-title">{{ $blog->naslov }}</h2>
        <p class="card-text">{{ $blog->sadrzaj }}</p>
    </div>
</div>

<p>
    <a href="{{ route('blog.list') }}" class="btn btn-primary mt-3">
        Nazad na listu blogova
    </a>
</p>
@endsection