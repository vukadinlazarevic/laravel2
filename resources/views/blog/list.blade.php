@extends("layout/public")

@section("title")
    Prikaz svih blogova
@endsection

@section("content")
    @if (session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif
    <header class="pb-3 mb-4 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Blog aplikacija</h1>
            <a href="{{ route('blog.create') }}" class="btn btn-primary">Novi blog</a>
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">
            @if (count($blogovi) > 0) 
                @foreach ($blogovi as $blog)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title">
                                {{ $blog->naslov }}
                            </h2>
                            <p class="card-text text-muted">
                                {{ $blog->created_at }}
                            </p>
                            <p class="card-text">
                                {{ Str::limit($blog->sadrzaj, 100, '[Read More]') }}
                            </p>

                            <div class="d-flex gap-2">
                                <a href="{{ route('blog.single', $blog->id) }}" class="btn btn-primary">Procitaj vise</a>
                                <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Izmeni</a>
                                <a href="{{ route('blog.delete', $blog->id) }}" class="btn btn-danger">Obrisi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="alert alert-info">
                Trenutno nema blog postova.
            </div>
            @endif
        </div>
    </div>
@endsection