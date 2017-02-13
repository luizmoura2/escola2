<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $registros = Slide::orderBy('ordem')->get();
        return view('admin.slides.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slides.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sequencia = 0;

        if(Slide::count()){
            $reg = Slide::orderBy('ordem', 'desc')->first();
            $sequencia = $reg->ordem; 
        }

        if ($request->hasFile('imagens')){
            $arquivos = $request->file('imagens');

            foreach ($arquivos as $file) {

                $sequencia++;

                $slide = new Slide();               
                $slide->ordem = $sequencia;                 

                $rand = rand(11111, 99999);
                $dir = "img/slide/" ;
                $ext = $file->guessClientExtension();
                $nomArq = "_img_".$rand.".".$ext;
                $file->move($dir, $nomArq);

                $slide->imagem = $dir.$nomArq;

                $slide->save();
            }
        }        

        \Session::flash('mensage',['msg'=>'Slides cadastrados com sucesso!', 'class'=>'green white-text']);
            
        return redirect()->route('admin.slides');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Slide::find($id);
        return view('admin.slides.editar', compact('registro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $dados = $request->all();

        $slide = Slide::find($dados['id']);
        $slide->titulo = $dados['titulo'];
        $slide->descricao  = $dados['descricao'];
        $slide->link  = $dados['link'];
        $slide->ordem = $dados['ordem'];
        $slide->publicado = $dados['publicado'];

        $file = $request->file('imagem');
        if ($file){
            $rand = rand(11111, 99999);
            $dir = "img/slides/";
            $ext = $file->guessClientExtension();
            $nomArq = "_img_".$rand.".".$ext;
            $file->move($dir, $nomArq);

            $slide->imagem = $dir.$nomArq;
        }
       
        $slide->update();

        \Session::flash('mensage',['msg'=>'Slide atualizada com sucesso!', 'class'=>'green white-text']);
            
        return redirect()->route('admin.slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        try {
            $slide->delete(); 
            $clazz = 'green white-text';
            $msg = 'Exclusão da slide: '.$slide->titulo.'! foi bem sucedido';
        } catch (Exception $e) {
            $clazz = 'red white-text';
            $msg = 'Erro: Exclusão da slide: '.$slide->titulo.'!'.$e;     
        }      
                      
        \Session::flash('mensage',['msg'=>$msg, 'class'=>$clazz]);  
        
        return redirect()->route('admin.slides');
    }
}
