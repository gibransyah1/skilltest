<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Models\Users;
use CodeIgniter\API\ResponseTrait;

class UsersController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    protected $users;
    // use ResponseTrait;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $data = [
            'status' => true,
            'error' => null,
            'data' => $this->users->findAll()
        ];

        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        $db = db_connect();

        if ($id === 'grup') {
            $data = [
                'status' => true,
                'error' => null,
                'data' => $db->query('SELECT birth_place, COUNT(id) as jumlah_data_user, GROUP_CONCAT(id) as id, GROUP_CONCAT(name) as name, GROUP_CONCAT(birth_date) as birth_date, GROUP_CONCAT(gender) as gender FROM users GROUP BY birth_place')->getResultArray()
            ];

            return $this->respond($data, 200);
        } else {

            $data = [
                'status' => true,
                'error' => null,
                'data' => $this->users->find($id)
            ];

            return $this->respond($data, 200);
        }

        // SELECT birth_place, COUNT(id) as jumlah_data_user FROM users GROUP BY birth_place
        // SELECT * FROM users WHERE birth_place = 'sukabumi'
        // SELECT * FROM users as kabeh JOIN (SELECT birth_place, COUNT(id) as jumlah_data_user FROM users GROUP BY birth_place) as cari ON kabeh.birth_place = cari.birth_place
        // SELECT * FROM users as kabeh JOIN (SELECT birth_place, COUNT(id) as jumlah_data_user FROM users GROUP BY birth_place) as cari ON kabeh.birth_place = cari.birth_place WHERE cari.birth_place = 'sukabumi'
        // SELECT birth_place, COUNT(id) as jumlah_data_user, id, name, birth_date, gender FROM users GROUP BY birth_place
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'birth_date' => $this->request->getVar('birth_date'),
            'birth_place' => $this->request->getVar('birth_place'),
            'gender' => $this->request->getVar('gender')
        ];
        $this->users->save($data);
        $response = [
            'status' => true,
            'error' => null,
            'messages' => [
                'success' => 'Data berhasil disimpan!'
            ]
        ];

        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $result = $this->users->find($id);
        if ($result) {
            $data = $this->request->getRawInput();
            $data['id'] = $id;
            $this->users->save($data);
            $response = [
                'status' => true,
                'error' => null,
                'messages' => [
                    'success' => 'Data berhasil diubah!'
                ]
            ];
            return $this->respondCreated($response);
        } else {
            return $this->failNotFound('Tidak ditemukan id: ' . $id);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->users->find($id);
        if ($result) {
            $this->users->delete($id);
            $response = [
                'status' => true,
                'error' => null,
                'message' => [
                    'success' => 'Berhasil menghapus data dengan id: ' . $id
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Tidak ditemukan id: ' . $id);
        }
    }
}
