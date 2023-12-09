<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use App\Models\status;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Requestpsr7;
use Illuminate\Http\Request;

class fastprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $client = new Client();
        // $headers = [
        //   'Authorization' => 'Basic Og==',
        //   'Cookie' => 'ci_session=qev1tr4bg0f5j1tvq2kaf6vrseet6c9t'
        // ];
        // $options = [
        //   'multipart' => [
        //     [
        //       'name' => 'password',
        //       'contents' => '349c77a5762af90d145944651bbb4f7e'
        //     ],
        //     [
        //       'name' => 'username',
        //       'contents' => 'tesprogrammer091223C08'
        //     ]
        // ]];
        // $request = new Requestpsr7('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', $headers);
        // $res = $client->sendAsync($request, $options)->wait();
        // $content = $res->getBody()->getContents();
        // $contentArray = json_decode($content,true);
        // $produk = $contentArray["data"];

        // foreach($produk as $produks){
        //     $post = produk::create([
        //         'id'=>$produks['id_produk'],
        //         'produk'=>$produks['nama_produk'],
        //         'harga'=>$produks['harga'],
        //         'kategori'=>$produks['kategori'],
        //         'status'=>$produks['status'],
        //     ]);
        // }
        $status = status::all()->first()->toArray();
        $kategori = kategori::all()->toArray();
        $produk = produk::all();
        return view('index',compact('produk','status','kategori'))->with('no',1);
    }

    public function index_tambah()
    {
        return view('tambah');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required|max:200',
            'produk'=>'required|max:200',
            'harga'=>'required|max:100',
            'kategori'=>'required|max:100',
            'status'=>'required|max:50'
        ]);
            produk::create([
                'id'=>$request->id,
                'produk'=>$request->produk,
                'harga'=>$request->harga,
                'kategori'=>$request->kategori,
                'status'=>$request->status
            ]);
            return redirect('')->with('success','Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = produk::FindorFail($id);
        return view('edit',compact('produk'));
    }

    public function dijual($status)
    {
        $produk = produk::where($status);
        dd($produk);
        return view('dijual',compact('produk'));
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
        $produk = produk::Find($id);
        $produk->delete();
        return redirect('')->with('delete','Produk berhasil dihapus');
    }
}
