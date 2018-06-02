<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuComedor extends CI_Controller {/*CI: CodeIgniter*/

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/login
	 *	- or -
	 * 		http://example.com/index.php/login/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }
        if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Nutricionista") {
        	redirect(base_url('Home')); 
        }
    }
    /**
     * @method void AgregarCitaNutricion()
     * @method void ModificarEvento(integer $id_evento)
     * @method void EliminarEvento()
     * @method void VerEvento()
     * @method void ListarEventos()
     * @method void|boolean ValidarEvento(mixed[] $data)
     */

    /**
     * Muestra la interfaz del formulario para agregar evento, o realiza 
     * la inserción del evento si se hace una petición POST
     *
     * @return 	void
     */
	public function AgregarMenuComedor()
	{
		$this->load->model('ComedorModel');

		$data = array("titulo" => "Agregar menú comedor");
		$data['tipo_paciente'] = array("" => "", "Estudiante"  => "Estudiante", "Docente" => "Docente", "Administrativo" => "Administrativo", "Obrero"  => "Obrero", "Cortesía" => "Cortesía");
		//Si se envió una petición POST...
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$ultimaSemana=$this->ComedorModel->ExtraerUltimaSemana();

			if (empty($ultimaSemana)){

				$idnuevaSemana= $this->ComedorModel->AgregarSemana();

				if (!empty($idnuevaSemana)){

					if ($this->ComedorModel->AgregarMenuComedor($idnuevaSemana)){

						set_cookie("message","Menú del día creado exitosamente", time()+15);
						/*header: Menú del día creado exitosamente */
						header("Location: ".base_url()."MenuComedor/ListarMenu");
					 }else{
					 	$data['mensaje'] = $this->db->error();
					 }
				}else{
					$data['mensaje'] = $this->db->error();
				}
			}else if($ultimaSemana->estatus==1){
				$idnuevaSemana= $this->ComedorModel->AgregarSemana();

				if (!empty($idnuevaSemana)){

					if ($this->ComedorModel->AgregarMenuComedor($idnuevaSemana)){

						set_cookie("message","Menú del día creado exitosamente", time()+15);
						/*header: Menú del día creado exitosamente */
						header("Location: ".base_url()."MenuComedor/ListarMenu");
					 }else{
					 	$data['mensaje'] = $this->db->error();
					 }
				}else{
					$data['mensaje'] = $this->db->error();
				}
			}else if($ultimaSemana->estatus==0){
				if ($this->ComedorModel->AgregarMenuComedor($ultimaSemana->id)){

						set_cookie("message","Menú del día creado exitosamente", time()+15);
						/*header: Menú del día creado exitosamente */
						header("Location: ".base_url()."MenuComedor/ListarMenu");
					}else{
					 	$data['mensaje'] = $this->db->error();
				}
			}

			//Si los datos enviados por formulario son correctos...
          /*  if ($this->ValidarCita($data) === false) { 

	        			//Si no existe un evento registrado con el mismo nombre para
	        			//las mismas fechas...
        			if (!$this->EventoModel->ValidarEvento($condicion)) {

        				//Si el evento se agrega exitosamente a la base de datos...
        				if ($this->EventoModel->AgregarEvento()) {

	        				set_cookie("message","El evento <strong>'".$this->input->post('titulo')."'</strong> fue registrado exitosamente!...", time()+15);
							header("Location: ".base_url()."Evento/ListarEventos");

						//Si hay error en la inserción
						}else{

							$data['mensaje'] = $this->db->error();
						}
					//Si ya existe un evento con los datos enviados
        			}else{

        				$data['mensaje'] = "Ya existe un evento registrado con el mismo título y fechas de inicio y fin.";
        			}
	        	//Si no se cargó el archivo...
	        	}else{
	        		$data['mensaje'] = $this->upload->display_errors();		      
	        	}
			}*/
		}
		//Cargar vista del formulario de registro de evento
		$this->CargarHeader();
        $this->load->view('comedor/FormularioMenuComedor', $data);
        $this->load->view('footer');
	}

 public function ListarMenu()
	{
		$this->load->model('ComedorModel');

		$data = array();

		$result = $this->ComedorModel->ExtraerSemanas();

		///if ($result->num_rows() > 0) {
			
		$data["comedor"] = $result;

		$this->CargarHeader();
        $this->load->view('comedor/ListarMenu', $data);
        $this->load->view('footer');
		//}
	}
}