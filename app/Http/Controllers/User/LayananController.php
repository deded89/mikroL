<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Layanan;
use App\Store;
use Illuminate\Http\Request;
use DataTables;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Layanan::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-transp btn-sm editLayanan"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Hapus" class="btn btn-transp btn-sm hapusLayanan"><i class="fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.layanan.index');
    }

    public function store(Request $request)
    {
        $this->runRules($request);
        $store = Store::UserStore()->first();
        Layanan::updateOrCreate(
            ['id' => $request->layanan_id],
            [
                'nama_layanan' => $request->nama_layanan,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'store_id' => $store->id,
            ]
        );

        return response()->json(['sukses' => 'Data Berhasil Tersimpan']);
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        if ($layanan) return response($layanan);
        return response()->json(['error' => 'data tidak ditemukan']);
    }

    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return response()->json(['sukses' => 'Data Dihapus']);
    }

    protected function runRules($request)
    {
        return $request->validate([
            'nama_layanan' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric|max:9999999'
        ]);
    }
}
