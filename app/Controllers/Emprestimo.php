<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmprestimoModel;
use App\Models\AlunoModel;
use App\Models\UsuarioModel;
use App\Models\LivroModel;
use App\Models\ObraModel;
use CodeIgniter\Session\Session;

class Emprestimo extends BaseController
{
    private $EmprestimoModel;
    private $AlunoModel;
    private $LivroModel;
    private $UsuarioModel;
    private $ObraModel;

    public function __construct(){
        $this->EmprestimoModel = new EmprestimoModel();
        $this->AlunoModel = new AlunoModel();
        $this->UsuarioModel = new UsuarioModel();
        $this->LivroModel = new LivroModel();
        $this->ObraModel = new ObraModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $dados = $this->EmprestimoModel->findAll();
        $dadosaluno = $this->AlunoModel->findAll();
        $dadosusuario = $this->UsuarioModel->findAll();
        $dadosobra = $this->ObraModel->findAll();
        $dadoslivro = $this->LivroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/index',['listaEmprestimo' => $dados,'listaAluno' => $dadosaluno,'listaLivro' => $dadoslivro,'listaUsuario' => $dadosusuario,'listaObra' => $dadosobra]);
        echo view('_partials/footer');
    }
    public function cadastrar()
    {
        $Emprestimo = $this->request->getPost();
        $this->LivroModel->update($Emprestimo['id_livro'],['disponivel' => 0]);
        $this->EmprestimoModel->save($Emprestimo);
        return redirect()->to('Emprestimo/index');
    }
    public function editar($id)
    {
        $dados = $this->EmprestimoModel->find($id);
        $dadosaluno = $this->AlunoModel->findAll();
        $dadosobra = $this->ObraModel->findAll();
        $dadosusuario = $this->UsuarioModel->findAll();
        $dadoslivro = $this->LivroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/edit',['Emprestimo' => $dados,'listaAluno' => $dadosaluno,'listaLivro' => $dadoslivro,'listaUsuario' => $dadosusuario,'listaObra' => $dadosobra]);
        echo view('_partials/footer');
    }
    public function devolucao($id)
    {
        $dados = $this->EmprestimoModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('devolucao/index',['Devolucao' => $dados]);
        echo view('_partials/footer');
    }
    public function salvar(){
        $dados = $this->request->getPost();
        $this->LivroModel->update($dados['id_livro_antigo'], ['disponivel' => 1]);
        $this->LivroModel->update($dados['id_livro'], ['disponivel' => 0]);
        $this->EmprestimoModel->save($dados);
        return redirect()->to('emprestimo/index');
    }
    public function salvar_devolucao(){
        $dados = $this->request->getPost();
        $this->LivroModel->update($dados['id_livro'], ['disponivel' => 1]);
        $this->EmprestimoModel->save($dados);
        return redirect()->to('emprestimo/index');
    }
    public function excluir(){
        $dados = $this->request->getPost();
        $this->LivroModel->update($dados['id_livro'],['disponivel' => 1]);
        $this->EmprestimoModel->delete($dados);
        return redirect()->to('emprestimo/index');
    }
}