<?php

namespace App\Models;

use CodeIgniter\Model;

class Clients_model extends Model
{
    protected $table = 'clients';
    protected $allowedFields = ['nombre', 'apellido'];

    public function getClient($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->getWhere(['id' => $id]);
    }

    public function saveClient(array $data)
    {
        return $this->insert($data);
    }

    public function updateClient(int $id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteClient(int $id)
    {
        return $this->delete($id);
    }
}
