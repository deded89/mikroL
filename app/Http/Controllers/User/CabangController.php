<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cabang;
use Yajra\DataTables\DataTables;

class CabangController extends Controller
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
        return view('user.cabang.index');
    }

    public function getTableData(Request $request)
    {
        if ($request->ajax()) {
            $data = Cabang::where('store_id', $this->store_id)->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $is_open = $row->is_open == 'true' ? 'red' : 'green';
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="btn btn-transp btn-sm editCabang"><i class="fa fa-pencil"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Tutup Cabang" class="btn btn-transp btn-sm toggleStatus"><i class="fa fa-power-off" style="color:' . $is_open . '"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setRowClass(function ($row) {
                    return $row->is_open == 'true' ? '' : 'row-disabled';
                })
                ->editColumn('is_open', function ($row) {
                    if ($row->is_open == 'true') {
                        return "Buka";
                    } else {
                        return "Tutup";
                    }
                })
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        $this->runRules($request);
        Cabang::Create([
            'nama_cabang' => $request->nama_cabang,
            'is_open' => 'true',
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'store_id' => $this->store_id,
        ]);

        return response()->json(['success' => 'Cabang berhasil disimpan.']);
    }

    public function edit($id)
    {
        $cabang = Cabang::findOrFail($id);

        if ($cabang) {
            return response()->json($cabang);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan.']);
        }
    }

    public function update(Request $request, $id)
    {
        $this->runRules($request);

        Cabang::where('id', $id)
            ->update([
                'nama_cabang' => $request->nama_cabang,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
            ]);

        return response()->json(['success' => 'Data berhasil diupdate.']);
    }

    public function ubahStatus($id)
    {
        $cabang = Cabang::findOrFail($id);
        if ($cabang->is_open == 'true') {
            $cabang->is_open = 'false';
        } else {
            $cabang->is_open = 'true';
        }
        $cabang->save();

        if ($cabang->is_open == 'true') {
            return response()->json(['sukses' => 'Cabang Dibuka']);
        } else {
            return response()->json(['sukses' => 'Cabang Ditutup']);
        }
    }

    protected function runRules($request)
    {
        return $request->validate([
            'nama_cabang' => 'required',
            'alamat' => 'required|min:5',
            'telepon' => 'required|min:5',
        ]);
    }
}
