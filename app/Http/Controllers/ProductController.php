<?php
namespace App\Http\Controllers;

class ProductController
{
    public function index()
    {
        return 'Products List';
    }

    public function create()
    {
        return 'Create Product Form';
    }

    public function store()
    {
        return 'Store Product';
    }

    public function show($id)
    {
        return "Show Product {$id}";
    }

    public function edit($id)
    {
        return "Edit Product {$id}";
    }

    public function update($id)
    {
        return "Update Product {$id}";
    }

    public function destroy($id)
    {
        return "Delete Product {$id}";
    }
}
