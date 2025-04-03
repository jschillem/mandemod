<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a sortable listing of the modules in the system.
     */
    public function index() {}

    /**
     * Show the form for submitting a new module for approval.
     */
    public function create()
    {
        //
    }

    /**
     * Submit a new module for approval to be added to the system.
     */
    public function submit(Request $request)
    {
        //
    }

    /**
     * Display a specific module's details.
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing a specified module.
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Submit an update to a specified module for approval.
     */
    public function update(Request $request, Module $module)
    {
        //
    }

    /**
     * Submit a request to delete a specified module from the system.
     */
    public function destroy(Module $module)
    {
        //
    }
}
