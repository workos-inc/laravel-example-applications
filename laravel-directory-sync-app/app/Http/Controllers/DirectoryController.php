<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {
            $before = $request->input('before');
            $after = $request->input('after');
        }
        $directorySync = new \WorkOS\DirectorySync();

        list($before, $after, $directories) = $directorySync->listDirectories(
            limit: 5,
            before: $before,
            after: $after,
            order: null
        );
        return view('index', ['directories' => $directories, 'after' => $after, 'before' => $before]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $directorySync = new \WorkOS\DirectorySync();
        // Fetch all Directory Users in a Directory
    
        list($before, $after, $groups) = $directorySync->listGroups($id);
        // Fetch all Directory Users in a Directory
    
        list($before, $after, $users) = $directorySync->listUsers($id);
        return view('directory', ['users' => $users, 'directoryId' => $id, 'groups' => $groups]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
