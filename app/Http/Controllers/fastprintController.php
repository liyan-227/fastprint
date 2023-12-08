<?php

namespace App\Http\Controllers;

use App\Models\produk;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;


class fastprintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $headers = [
          'Authorization' => 'Basic Og==',
          'Cookie' => 'ci_session=qev1tr4bg0f5j1tvq2kaf6vrseet6c9t'
        ];
        $options = [
          'multipart' => [
            [
              'name' => 'password',
              'contents' => 'e8b4e8708f96cd55eb04ff02004e7e3a'
            ],
            [
              'name' => 'username',
              'contents' => 'tesprogrammer081223C16'
            ]
        ]];
        $request = new Request('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', $headers);
        $res = $client->sendAsync($request, $options)->wait();
        $content = $res->getBody()->getContents();
        $contentArray = json_decode($content,true);
        $produk = $contentArray["data"];
        // dd($produk);
        return view('index',compact('produk'));
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
        $client = new Client();
        $headers = [
          'Authorization' => 'Basic Og==',
          'Cookie' => 'ci_session=qev1tr4bg0f5j1tvq2kaf6vrseet6c9t'
        ];
        $options = [
          'multipart' => [
            [
              'name' => 'password',
              'contents' => 'e8b4e8708f96cd55eb04ff02004e7e3a'
            ],
            [
              'name' => 'username',
              'contents' => 'tesprogrammer081223C15'
            ]
        ]];
        $req = new Request('POST', 'https://recruitment.fastprint.co.id/tes/api_tes_programmer', $headers);
        $res = $client->sendAsync($req, $options)->wait();
        echo $res->getBody();
        $request->validate([
            'produk'=>'required|max:200',
            'harga'=>'required|max:100',
            'kategori'=>'required|max:100',
            'status'=>'required|max:50'
        ]);

        produk::create([
            'produk'=>$request->nama_produk,
            'harga'=>$request->harga,
            'kategori'=>$request->kategori_id,
            'status'=>$request->status_id
        ]);
        return redirect()->route('index')->with('mesagge', 'Produk berhasil ditambahkan');
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
        $produk = produk::FindorFail($id);
        $produk->delete();
        return redirect()->route('index')->with('message','Produk berhasil dihapus');
    }
}
