<?php

namespace App\Http\Controllers;

use File;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function produkview()
    {
        $produk = DB::table('t_produk')->where('status', '=', '1')->get();
        return view('Produk/produk', ['produk' => $produk]);
    }

    public function bahanview()
    {
        $bahan = DB::table('t_produk')->where('status', '=', '2')->get();
        return view('Produk/bahan', ['bahan' => $bahan]);
    }

    public function produkInput()
    {
        return view('Produk/input-produk');
    }

    public function produkUpload(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // dd($request->all());
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $nama_gambar = time() . "_" . $image->getClientOriginalName();
            $destinationPath = public_path('/gambar');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_gambar);
            $image->move($destinationPath, $nama_gambar);
        } else {
            $nama_gambar = "placeholder.png";
        }

        $produk = ProdukModel::create([
            'id' => $request->id,
            'nama_produk' => $request->nama_produk,
            'id_reference' => 0,
            'qty' => 0,
            'harga' => $request->harga,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_gambar
        ]);

        $status = $request->status;
        $jumlah = ProdukModel::where('status', $status)->count();
        if ($status == 1) {
            $id_reference = 'PR' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);
        } elseif ($status == 2) {
            $id_reference = 'BA' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);
        }
        $produk->update(['id_reference' => $id_reference]);
        return redirect('/produk');
    }

    public function produkEditView($id)
    {
        $produk = ProdukModel::find($id);
        return view('Produk/update-produk', compact('produk'), ['produk' => $produk]);
    }


    public function produkUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => '|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = ProdukModel::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->deskripsi = $request->deskripsi;
        $produk->status = $request->status;

        if ($request->hasfile('gambar')) {
            interv::delete('gambar/' . $produk->gambar);
            $image = $request->file('gambar');
            $nama_gambar = time() . "_" . $image->getClientOriginalName();
            $destinationPath = public_path('/gambar');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $nama_gambar);
            $image->move($destinationPath, $nama_gambar);

            $produk->gambar = $nama_gambar;
        }

        $status = $request->status;
        $jumlah = ProdukModel::where('status', $status)->count();
        if ($status == 1) {
            $id_reference = 'PR' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);
        } elseif ($status == 2) {
            $id_reference = 'BA' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);
        }
        $produk->update(['id_reference' => $id_reference]);
        $produk->id_reference = $id_reference;

        $produk->save();
        return redirect('/produk');
    }

    public function Produkdelete($id)
    {
        $produk = ProdukModel::find($id);
        File::delete('gambar/' . $produk->gambar);

        // hapus data
        $produk->delete();
        return redirect('/produk');
    }
}
