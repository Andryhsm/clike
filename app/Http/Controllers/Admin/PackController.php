<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\PackRepository;

class PackController extends Controller
{
    protected $pack_repository;

    public function __construct(PackRepository $pack_repository)
    {
        $this->pack_repository = $pack_repository;
    }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = Datatables::collection($this->pack_repository->getAll())->make(true);
        $packs = $packs->getData();
        return view('admin.pack.index',compact('packs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pack = false;
        return view('admin.pack.form', compact('pack'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pack = $this->pack_repository->save($request->all());
        flash()->success(config('message.pack.add-success'));
        return redirect('admin/pack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pack = $this->pack_repository->getById($id);
        return view('admin.pack.form', compact('pack'));
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
        $pack = $this->pack_repository->updateById($id, $request->all());
        flash()->success(config('message.pack.update-success'));
        return redirect('admin/pack');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pack = $this->pack_repository->deleteById($id);
        if ($pack) {
            flash()->success(config('message.pack.delete-success'));
        } else {
            flash()->error(config('message.pack.delete-error'));
        }
        return redirect()->route('pack.index');
    }
}
