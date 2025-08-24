<?php
namespace App\Http\Controllers;

class EmbedController
{
    public function index()
    {
        return 'Embed List';
    }

    public function create()
    {
        return 'Create Embed Form';
    }

    public function store()
    {
        return 'Store Embed';
    }

    public function show($id)
    {
        return "Show Embed {$id}";
    }

    public function destroy($id)
    {
        return "Delete Embed {$id}";
    }
}
