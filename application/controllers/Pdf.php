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
    public function GenerarOrdenExamen() {
    	if ($this->session->has_userdata('tipo_usuario') && $this->session->userdata('tipo_usuario') != "Nutricionista") redirect(base_url('Home'));
    	$data['cedula']   = $this->input->post('cedula');
    	$data['nombre']   = $this->input->post('nombre');
    	$data['apellido'] = $this->input->post('apellido');
    	$data['examen']   = $this->input->post('examen');
    	$data['carpeta']  = "ordenes";

    	//Crear carpeta donde se almacena el archivo
    	$this->crearCarpeta($carpeta);
    	$hoy = date('Y-m-d');
    	$num_dia = date('N');
    	$sum_dias = 5 - $num_dia;
    	$max_fecha = date('Y-m-d', strtotime("+$sum_dias day" , strtotime ( $hoy )))

    	//Asignar carpeta para guardar PDF
		$this->html2pdf->folder('./pdfs/'.$carpeta);

		//Asignar el nombre del archivo para abrir/descargar 
		$this->html2pdf->filename('ordenExamen.pdf');

		//Asignar valores por defecto de la hoja
		$this->html2pdf->paper('letter', 'landscape');

		//Cargar vista HTML
		$this->html2pdf->html($this->load->view('pdf/ordenExamen', $data, true));

		//Crear el PDF
		if($path = $this->html2pdf->create('save')) {
			//El PDF creado o descargado exitosamente
			echo $path;
		}else{
			echo 'false';
		}
    }

    private function crearCarpeta($nombreCarpeta) {
        if(!is_dir("./pdf"))
        {
            mkdir("./pdf", 0777);
            mkdir("./pdf/".$nombreCarpeta, 0777);
        }
    }
}