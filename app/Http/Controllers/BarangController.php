<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

use App\Barang; 
use App\Kategori; 





class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $dir = "barang";
    protected $url = "barang";


  



    public function json(){
          $data = Barang::get();

            return Datatables::of($data)->addColumn('action',function($d){
                return '<button data-title="Edit Data" class="btn btn-success create-btn" data-src="'.url($this->url.'/'.$d->id.'/edit').'">Edit</button>
<button class="btn btn-danger delete-btn" href="'.url($this->url.'/'.$d->id).'">Hapus</button>';


            })->make(true);

    }





    public function index(Request $request)
    {
        //

        $title = "List";


          // $data = @Table::all();
        return view($this->dir.'/index',compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $title = "Create";
        
        $kategori= Kategori::all(); 

        return view($this->dir.'/create',compact('data','title','subtitle','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // UNTUK DUMP NAMA FORM

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request, $type untuk save/update,$table untuk Class nama tabel

     */


    public function store(Request $request)
    {




    $validatedData = $request->validate([
"nama_barang" => "required" ,
"kategori" => "required" ,

]);


    $barang = new barang;

    $barang->nama_barang = $request->nama_barang;
$barang->kategori = $request->kategori;
$save = $barang->save();

  # code...

#store





        if ($save) {
            $msg = "Data Berhasil Disimpan";
            $success = true;


        }
        else {

            $msg = "Data Gagal Disimpan";
            $success = false;

        }
    
        return [
          'success'=>$success,
          'msg'=>$msg
        ];

}

      

        // $table = new Table;
        // print_r($request->all());


    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $data = $this->fields();
        $table = Barang::find($id);
        $title = "Detail  Data";
        $subtitle = "Pegawai Vendor";
        return view($this->dir.'/info',compact('data','table','title','subtitle'));
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

        // $data = $this->fields();
        $data = Barang::find($id);

        $title = "Edit Data";
        $subtitle = "Pegawai Vendor";
        

        $kategori= Kategori::all(); 


        return view($this->dir.'/edit',compact('data','table','title','subtitle','email','kategori'));
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
     

    $validatedData = $request->validate([
"nama_barang" => "required" ,
"kategori" => "required" ,

]);

    @$barang =  barang::find($id);

    $barang->nama_barang = $request->nama_barang;
$barang->kategori = $request->kategori;
$save = $barang->save();

       if ($save) {
        //Do Your Something
          $status = 1;
            $request->session()->flash('success', "Data Berhasil Diubah");
            // return redirect($this->url);
            $msg = "Data Berhasil Diupdate";
          $success = true;
        }
        else {
        //Do Your Something 
          $status =0;
          $success = false;
            $msg = "Data Gagal Diupdate";

            $request->session()->flash('success', "Data Gagal Diubah");
            // return redirect()->back();
        }

        return [
          'success'=>$success,
          'msg'=>$msg
        ];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        $table = Barang::find($id);
        $delete = $table->delete();
         if ($delete) {
        $success= true;
          $msg = 'Data Berhasil Dihapus';

        }
        else {

          $msg = 'Data Gagal Dihapus';
            $success = false;
        }

        return [
          'success'=>$success,
          'msg'=>$msg
        ];
    }

}
