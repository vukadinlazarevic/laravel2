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
<h3 class="mt-4">Komentari</h3>
@if ($blog->komentari->isEmpty())
<p>Nema komentara.</p>
@else
<ul class="list-group">
    @foreach ($blog->komentari as $komentar)
    <li class="list-group-item">
        <div>
        <small class="text-secondary">
            {{ $komentar->created_at->format("d.m.Y H:i") }}
        </small>
        </div>
        <h4>{{ $komentar->komentar }}</h4>

    </li>
    @endforeach
</ul>
@endif
<p>
    <a href="{{ route('blog.list') }}" class="btn btn-primary mt-3">
        Nazad na listu blogova
    </a>
</p>
@endsection