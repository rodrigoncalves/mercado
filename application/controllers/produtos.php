<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {

	public function index() {
		$this->output->enable_profiler(FALSE);
		$this->load->model("produtos_model");
		$produtos = $this->produtos_model->buscaTodos();
		$dados = array("produtos" => $produtos);

		$this->load->helper(array("currency"));
		$this->load->view("produtos/index.php", $dados);
	}

	public function formulario() {
		$this->load->view("produtos/formulario");
	}

	public function novo() {
		$nome = $this->input->post("nome");
		$preco = $this->input->post("preco");
		$descricao = $this->input->post("descricao");
		$usuarioLogado = $this->session->userdata("usuario_logado");

		$produto = array(
			"nome" => $nome,
			"preco" => $preco,
			"descricao" => $descricao,
			"usuario_id" => $usuarioLogado['id']
		);

		$this->load->model("produtos_model");
		$this->produtos_model->salva($produto);
		$this->session->set_flashdata("success", "Produto salvo com sucesso");
		redirect("/");
	}
}