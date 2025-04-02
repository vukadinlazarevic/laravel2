@extends("layout/public")

@section("title")
    Kreiranje Novog Bloga
@endsection

@section("content")

    <h1>Dodaj blog stranica</h1>

    @if (session("error"))
        <div class="alert alert-danger">
            {{ session("error") }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                    <!-- obavezno napisati @ + csrf ispod taga za formu, inace forma nece raditi  -->
                    @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Naslov</label>
                            <input type="text" class="form-control" name="naslov">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Sadrzaj</label>
                            <textarea class="form-control" name="sadrzaj" rows="10"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Dodaj blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection