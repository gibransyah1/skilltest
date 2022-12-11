<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UsersController extends BaseController
{
    protected $client;
    protected $url;

    public function __construct()
    {
        $this->client = \Config\Services::curlrequest();
        $this->url = 'http://localhost:8000/userscontroller/';
    }
    public function index()
    {
        $users = $this->client->request('GET', $this->url);
        $userJson = json_decode($users->getBody(), true);
        $users = $userJson['data'];
        $data = [
            'judul' => 'halaman awal',
            'data' => $users
        ];

        return view('users/index', $data);
    }

    public function show($id = null)
    {
        $users = $this->client->request('GET', $this->url . $id);
        $userJson = json_decode($users->getBody(), true);
        $user = $userJson['data'];
        $data = [
            'judul' => 'halaman awal',
            'data' => $user
        ];

        return view('users/detail', $data);
    }

    public function create()
    {
        $data = [
            'judul' => 'tambah data'
        ];

        return view('users/tambah', $data);
    }

    public function store()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'birth_date' => $this->request->getVar('date'),
            'birth_place' => $this->request->getVar('place'),
            'gender' => $this->request->getVar('gender')
        ];

        $this->client->request('POST', $this->url, ['form_params' => $data]);

        return redirect()->to('/');
    }

    public function edit($id = null)
    {
        $users = $this->client->request('GET', $this->url . $id);
        $userJson = json_decode($users->getBody(), true);
        $user = $userJson['data'];
        $data = [
            'judul' => 'ubah data',
            'data' => $user
        ];

        return view('users/ubah', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'birth_date' => $this->request->getVar('date'),
            'birth_place' => $this->request->getVar('place'),
            'gender' => $this->request->getVar('gender')
        ];

        $this->client->request('PUT', $this->url . $id, ['form_params' => $data]);

        return redirect()->to('/');
    }

    public function delete($id = null)
    {
        $data = $this->client->request('GET', $this->url . $id);
        if ($data) {
            $this->client->request('DELETE', $this->url . $id);
            return redirect()->to('/');
        } else {
            return redirect()->to('/');
        }
    }
}
