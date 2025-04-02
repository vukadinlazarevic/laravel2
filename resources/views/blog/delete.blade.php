@extends("layout/public")

@section("title")
    Potvrda Brisanja Bloga
@endsection


@section("content")
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-title">
                        Brisanje blog objave - <b>{{ $blog->naslov }}</b>
                    </h5>
                </div>

                <div class="card-body text-center">
                    <p>Da li ste sigurni da zelite da obrisete blog?</p>

                    <form action="{{ route('blog.delete', $id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">Obrisi blog</button>
                        <a href="{{ route('blog.list') }}" class="btn btn-secondary">
                            Odustani
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

