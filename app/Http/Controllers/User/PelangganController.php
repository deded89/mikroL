<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pelanggan;
use DataTables;
use Illuminate\Support\Facades\Storage;

class PelangganController extends Controller
{
    protected $store_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->store_id = session('store_id');
            return $next($request);
        });
    }

    public function index()
    {
        return view('user.pelanggan.index');
    }

    public function getTableData(Request $request)
    {
        if ($request->ajax()) {

            $data = Pelanggan::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" title="Edit" class="btn btn-transp btn-sm editPelanggan"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" title="Hapus" class="btn btn-transp btn-sm hapusPelanggan"><i class="fa fa-trash"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" title="Lihat Foto" class="btn btn-transp btn-sm lihatFoto"><i class="fa fa-file-image-o"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {

        $this->runRules($request);

        $pelanggan = Pelanggan::updateOrCreate(
            ['id' => $request->pelanggan_id],
            [
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'deposit' => 0,
                'store_id' => $this->store_id,
            ]
        );

        if ($request->has('foto')) {
            $this->deletePrevImage($pelanggan->image);
            $foto = $request->foto->store('images/pelanggan', 'public');
            $pelanggan->update([
                'image' => $foto,
            ]);
        }
        return response()->json($request->all());
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return response()->json($pelanggan);
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $this->deletePrevImage($pelanggan->image);
        $pelanggan->delete();
    }

    protected function deletePrevImage($img)
    {
        $data = Storage::disk('public')->exists($img);
        if ($data) {
            Storage::disk('public')->delete($img);
        }
    }

    protected  function runRules(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|min:3',
        ]);

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'file|image|max:3000',
            ]);
        }

        return $validatedData;
    }
}
