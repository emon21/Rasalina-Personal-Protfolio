<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::with('user')->get();
        // return $clients;
        return view('admin.client.index', compact('clients'));

    }

    public function create()
    {
        return view('admin.client.create');
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());
        return redirect()->route('admin.client.index');
    }

    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('admin.client.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.client.index');
    }

}
