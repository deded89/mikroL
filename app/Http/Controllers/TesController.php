<?php

namespace App\Http\Controllers;

use App\Cabang;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Http;
use Spatie\WebhookClient\Models\WebhookCall;

class TesController extends Controller
{
    public function index(Request $request)
    {
        $data = session('store_id');
        dd($data);
    }
    public function kirimWa()
    {
        $response = Http::withToken('8c6c892691420c10b151ce7e23987c999c77d0fec118a75c8b6aa136de1414ae5cfca7629ee2e03c')
            ->post('https://api.wassenger.com/v1/messages', [
                "phone" => "+628115006989",
                "message" => "handak mentes web hooks"
            ]);

        return $response->json();
    }

    public function getMessageById($id)
    {
        $response = Http::withToken('8c6c892691420c10b151ce7e23987c999c77d0fec118a75c8b6aa136de1414ae5cfca7629ee2e03c')
            ->get('https://api.wassenger.com/v1/messages/' . $id);

        return $response->json();
    }

    public function handle(Request $request)
    {
        $raw_notification = json_decode($request->getContent());
        WebhookCall::create([
            'name' => $raw_notification[0]->data->message,
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($files = $request->file('image')) {

            $image = $request->image->store('images', 'public');

            return Response()->json([
                "success" => true,
                "image" => $image->getName(),
            ]);
        }

        return Response()->json([
            "success" => false,
            "image" => ''
        ]);
    }

    public function update(Request $request, $id)
    {
        $cabang = Cabang::find($id);
        $cabang->update(['nama_cabang' => $request->nama_cabang, 'is_open' => true]);
        return response()->json(['success' => 'Cabang saved successfully.']);
    }

    public function edit($id)
    {
        $cabang = Cabang::find($id);
        return response()->json($cabang);
    }

    public function destroy($id)
    {
        Cabang::find($id)->delete();
        return response()->json(['success' => 'Cabang deleted successfully.']);
    }
}
