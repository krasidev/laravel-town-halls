<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\Profile\UpdateProfileRequest;
use App\Models\Role;
use App\Repository\Panel\ProfileRepository;

class ProfileController extends Controller
{
    private $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $roles = Role::all();

        return view('panel.profile.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Panel\Profile\UpdateProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $this->repository->update($request->all(), auth()->user()->id);

        return redirect()->route('panel.profile.edit')
            ->with('success', __('messages.panel.profile.update_success'));
    }
}
