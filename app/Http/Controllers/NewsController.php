<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use DB;

class NewsController extends Controller
{
    public function index(){
    	if (isset($_GET['q'])) {
            $listNews = News::query()->where('title', 'LIKE', "%{$_GET['q']}%")->orderBy('created_at', 'DESC')->get();
        } else {
            $listNews = News::orderBy('created_at', 'DESC')->get();
        }
        
        //mengirim data user apps ke view
        return view('news.index', ['listNews' => $listNews]);
    }
    
    public function create(){
        //to view add
        return view('news.add');
    }

    public function store(Request $request){
        //Validasi form
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        (isset($input['thumbnail'])) ? $namaImage = str_random().'.'.$input['thumbnail']->getClientOriginalExtension() : $namaImage = null;

        //insert into database
        DB::table('news')->insert([
            'title' => $input['title'],
            'description' => $input['description'],
            'thumbnail' => $namaImage
        ]);

        (isset($input['thumbnail'])) ? $input['thumbnail']->move(public_path('img/news'), $namaImage) : null ;

        //go to user_apps View
        return redirect('/news')->with('status', 'Berita Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $news = DB::table('news')->where('id', $id)->first();

        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $news = News::where('id', $id)->first();

        if (isset($input['thumbnail'])) {
            $namaImage = str_random().'.'.$input['thumbnail']->getClientOriginalExtension();
            
            if (isset($news->thumbnail)) {
                unlink(public_path('img/news/'.$news->thumbnail));
            }
            $input['thumbnail']->move(public_path("img/news/"), $namaImage);  

            $news->update([
                'title' => $input['title'],
                'description' => $input['description'],
                'thumbnail' => $namaImage
            ]);
        }else{
            $news->update([
                'title' => $input['title'],
                'description' => $input['description']
            ]);
        }
        return redirect('/news')->with('status', 'Berita Berhasil Diubah');
    }

    public function destroy($id)
    {
        $news = News::where('id', $id)->first();
        if (isset($news->thumbnail)) {
            unlink(public_path('img/news/'.$news->thumbnail));
        }

        News::destroy($id);

        return redirect('/news')->with('status', 'Berita Berhasil Dihapus');
    }
}
