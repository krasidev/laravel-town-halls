<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\TownHalls\StoreTownHallRequest;
use App\Http\Requests\Panel\TownHalls\UpdateTownHallRequest;
use App\Repository\Panel\TownHallRepository;
use Illuminate\Http\Request;

class TownHallController extends Controller
{
    private $repository;

    public function __construct(TownHallRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.town-halls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.town-halls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Panel\TownHalls\StoreTownHallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTownHallRequest $request)
    {
        $townHall = $this->repository->create($request->all());

        return redirect()->route('panel.town-halls.index')
            ->with('success', __('messages.panel.town-halls.store_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $town_hall = $this->repository->find($id);

        return view('panel.town-halls.edit', compact('town_hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\TownHalls\UpdateTownHallRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTownHallRequest $request, $id)
    {
        $this->repository->update($request->except(['_token', '_method']), $id);

        return redirect()->route('panel.town-halls.index')
            ->with('success', __('messages.panel.town-halls.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

    /**
     *  Display table results.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request)
    {
        return $this->repository->data($request->all());
    }
}
