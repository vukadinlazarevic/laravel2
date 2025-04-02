<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        // posto dohvatamo podatke preko Blog modela, podaci ce biti predstavljeni u listi, a pojedinacan blog je zapravo objekat
        $svi_blogovi = Blog::orderBy("created_at", "desc")->get(); # ovo ce vratiti sve blogove iz tabele
        // print_r($svi_blogovi);
        // $svi_blogovi = [];
        return view('blog/list', [
            "blogovi" => $svi_blogovi
        ]);
    }
    
    public function create() {
        return view("blog/create");
    }

    public function store(Request $request) {
        // $request cuva sve sto je poslato preko forme 
        if (empty($request->naslov) or empty($request->sadrzaj)) {
            return redirect()->back()->with("error", "Naslov i sadrzaj su obavezni!");
        }

        $novi_blog = new Blog();
        $novi_blog->naslov = $request->naslov;
        $novi_blog->sadrzaj = $request->sadrzaj;
        $novi_blog->save(); // sacuvaj trenutni blog u bazu

        // kada smo sacuvali novi blog -> treba da preusmerimo korisnika sa ove rute
        return redirect()->route("blog.list")->with("success", "Blog je uspesno dodat u bazu!");
    }

    // ovo je dinamicni parametar id iz rute, moraju da se zovu isto
    public function edit($id) {
        $blog = Blog::find($id); // find metoda ce da vrati kao rezultat, jedan red iz baze, na osnovu pretrage -> u ovom slucaju trazimo preko id vrednosti

        return view("blog/edit", [
            "blog" => $blog
        ]);
    }

    public function update(Request $request, $id) {
        if (empty($request->naslov) or empty($request->sadrzaj)) {
            return redirect()->back()->with("error", "Naslov i sadrzaj su obavezni!");
        }

        $blog = Blog::find($id); // pronadjemo blog preko id vrednosti, ovo ce nam vratiti objekat
        $blog->naslov = $request->naslov;
        $blog->sadrzaj = $request->sadrzaj;
        $blog->save(); // sacuvamo izmene za trenutni blog

        return redirect()->route("blog.list")->with("success", "Blog je uspesno izmenjen!");
    }

    public function delete($id) {
        return view("blog.delete", [
            "id" => $id,
            "blog" => Blog::find($id),
        ]);
    }

    public function destroy($id) {
        $blog = Blog::find($id);
        $blog->delete(); // svaki ORM objekat ima metode za save, update, delete
        // dohvatite objekat koji vam treba, pronadjete preko klase / modela
        // imate objekat preko kog mozete da menjate postojece podatke, dodajete nove i slicno
        return redirect()->route("blog.list")->with("success", "Blog uspesno obrisan!");
    }

    public function single($id) {
        $blog = Blog::findOrFail($id); // ili cemo uspeti da pronadjemo odredjeni blog
        // ili ako blog sa tom id vrednoscu ne postoji -> vracamo gresku 404 ako ne mozemo da pronadjemo taj podatak u bazi
        // print_r($blog);

        return view("blog/single", [
            'blog' => $blog,
        ]);
    }
}
