<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prestamo;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       
        // $prestamos= Prestamo::where('devolucion', '<' , Carbon::now() )
        // ->whereNull('registro_fin')->paginate(10);
        $prestamos= Prestamo::orderBy('id','DESC')->paginate(10);

        return view('admin.prestamos.index', compact('prestamos'));
    }

    public function vencidos(){

         $prestamos= Prestamo::where('devolucion', '<' , Carbon::now() )
        ->whereNull('registro_fin')->paginate(10);

        return view('admin.prestamos.index', compact('prestamos'));
    }
    
    public function masPrestados(){

        $prestamos= Prestamo::select('book_id')->selectRaw('COUNT(*) AS count')->groupBy('book_id')->orderByDesc('count')->take(50)->paginate(10);

        return view('admin.prestamos.topBooks', compact('prestamos'));
    }
    
    public function masActivos(){

        $prestamos= Prestamo::select('user_id')->selectRaw('COUNT(*) AS count')->groupBy('user_id')->orderByDesc('count')->take(50)->paginate(10);

        return view('admin.prestamos.topUsers', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
