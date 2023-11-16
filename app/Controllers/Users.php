<?php 

namespace App\Controllers;
use App\Models\TicketsModel;
use PhpParser\Node\Stmt\Echo_;
use App\Models\UsersModel;

class Users extends BaseController
{

    public function index(){
        
        $usersModel = new UsersModel();

        $users = $usersModel->getUsers();

        $data = [
            'users' => $users
        ];

        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header').view('adm/users', $data).view('application/footer');
        }
    }

    public function setAdm($idUser){
        $usersModel = new UsersModel();

        $usersModel->updateUserToPrad($idUser);

        session()->setFlashdata('success', 'Permissão de Usuário atualizada com sucesso');
        return redirect('users');
    }

    public function setStudent($idUser){
        $usersModel = new UsersModel();

        $usersModel->updateUserToStudent($idUser);
        session()->setFlashdata('success', 'Permissão de Usuário atualizada com sucesso');
        return redirect('users');
    }
}
    
?>