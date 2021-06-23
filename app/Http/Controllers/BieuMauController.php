<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ThuTuc;
use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Arr;

class BieuMauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $view = '';
        $thutuc = ThuTuc::where('maTT', $id)->firstOrFail();
        $thutuc->forms;
        //$forms = Form::where('thutuc_id', $id)->get();
        return view('backend.bieumau.index')->with(['thutuc' => $thutuc]);
    }
    public function createForm(Request $request, Thutuc $thutuc)
    {
        //$thutuc = Thutuc::findOrFail($id);
        $store = $request->validate([
            'label'   => 'required|max:255',
            'type'    => 'required',
            'field'   => 'required',
        ]);

        Form::create([
            'thutuc_id' => $thutuc->id,
            'label' => $store['label'],
            'type' => $store['type'],
            'field' => $store['field']
        ]);
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }
    public function destroy_bm($id)
    {
        $form = Form::findOrFail($id);
        $form->delete();
        return redirect()->back()->with('error', 'xóa thành công');
    }
}
