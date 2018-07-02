<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {/*CI: CodeIgniter*/

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
        $this->load->library('html2pdf');

        if (!$this->session->has_userdata('login') && ($this->uri->segment(1, 0) != '0' || $this->uri->segment(2, 0) != '0')) {
        	redirect(base_url());
        }
    }

    /**
     * @method void GenerarOrdenExamen()
     */

    /**
     * Muestra la interfaz del formulario para agregar evento, o realiza 
     * la inserción del evento si se hace una petición POST
     *
     * @return 	void
     */
    public function GenerarOrdenExamen($id_cita) {
    	if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Nutricionista") redirect(base_url('Home'));
    	$this->load->model("CitasModel");
        $cita=$this->CitasModel->ExtraerCita($id_cita);
        $data['cita'] = $cita;
    	$data['carpeta']  = "ordenes";

    	//Crear carpeta donde se almacena el archivo
    	$this->crearCarpeta($data['carpeta']);
    	$hoy = date('Y-m-d');
    	$num_dia = date('N');
    	$sum_dias = 5 - $num_dia;
    	$max_fecha = date('Y-m-d', strtotime("+$sum_dias day" , strtotime ( $hoy )));

    	//Asignar carpeta para guardar PDF
		$this->html2pdf->folder('./assets/pdf/'.$data['carpeta']."/");

		//Asignar el nombre del archivo para abrir/descargar 
		$this->html2pdf->filename('ordenExamen.pdf');

		//Asignar valores por defecto de la hoja
		$this->html2pdf->paper('letter', 'landscape');

		//Cargar vista HTML
		$this->html2pdf->html($this->load->view('pdf/ordenExamen', $data, true));
      //  $this->html2pdf->html("<h2>Prueba de pdf</h2>");

		//Crear el PDF
		if($path = $this->html2pdf->create('save')) {
			//El PDF creado o descargado exitosamente
            //echo $path;
            $path= str_replace("./", "", $path);
			header("Location: ".base_url().$path);
		}else{
			//echo json_encode(array('success' => fale, 'path' => ''));
            echo $path;
		}
    }

    private function crearCarpeta($nombreCarpeta) {
        if(!is_dir("./assets/pdf"))
        {
            mkdir("./assets/pdf", 0777);
            mkdir("./assets/pdf/".$nombreCarpeta, 0777);
        }
    }

    public function GenerarMenuComedor($id_semana,$id_menuComedor){

     if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Nutricionista") redirect(base_url('Home'));
        $this->load->model("ComedorModel");
        $semana=$this->ComedorModel->ExtraerSemana($id_semana);
        $menu=$this->ComedorModel->ExtraerMenuSemana($id_menuComedor);
        $data['semana'] = $semana;
        $data['menu'] = $menu;
        $data['carpeta']  = "ordenes";

        //Crear carpeta donde se almacena el archivo
        $this->crearCarpeta($data['carpeta']);
        $hoy = date('Y-m-d');
        $num_dia = date('N');
        $sum_dias = 5 - $num_dia;
        $max_fecha = date('Y-m-d', strtotime("+$sum_dias day" , strtotime ( $hoy )));

        //Asignar carpeta para guardar PDF
        $this->html2pdf->folder('./assets/pdf/'.$data['carpeta']."/");

        //Asignar el nombre del archivo para abrir/descargar 
        $this->html2pdf->filename('menuComedor.pdf');

        //Asignar valores por defecto de la hoja
        $this->html2pdf->paper('letter', 'landscape');

        //Cargar vista HTML
        $this->html2pdf->html($this->load->view('pdf/menuComedor', $data, true));

        //Crear el PDF
        if($path = $this->html2pdf->create('save')) {
            //El PDF creado o descargado exitosamente
            //echo $path;
            $path= str_replace("./", "", $path);
            header("Location: ".base_url().$path);
        }else{
            //echo json_encode(array('success' => fale, 'path' => ''));
            echo $path;
        }   
    }
}