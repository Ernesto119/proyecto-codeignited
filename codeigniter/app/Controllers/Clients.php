<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Clients_model;

class Clients extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Clients_model();
    }

    public function index()
    {
        $data['clients'] = $this->model->findAll();
        return view('client_view', $data);
    }

    public function create()
    {
        return view('add_client_view');
    }

    public function store()
    {
        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
        ];

        $this->model->saveClient($data);
        return redirect()->to('/clients');
    }

    public function edit($id)
    {
        $data['client'] = $this->model->getClient($id)->getRow();
        return view('edit_client_view', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nombre'   => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
        ];

        $this->model->updateClient($id, $data);
        return redirect()->to('/clients');
    }

    public function delete($id)
    {
        $this->model->deleteClient($id);
        return redirect()->to('/clients');
    }
}
