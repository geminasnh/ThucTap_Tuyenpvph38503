<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        BinhLuan::create([
            'san_pham_id' => $request->san_pham_id,
            'user_id' => auth()->id(),
            'noi_dung' => $request->noi_dung,
            'thoi_gian' => now()
        ]);

        return redirect()->back()->with('success', 'Bình luận thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
