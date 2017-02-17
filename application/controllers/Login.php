<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		$data = array(
			"login" 	=> array(
				"form" => array(
					"class" => "navbar-form navbar-right",
					"id" 	=> "form-login"
					),
				"cedula" => array(
					"type"  => "text",
			        "name"  => "cedula",
			        "value" => set_value("cedula"),
			        "class" => "form-control",
			        "placeholder" => "Cédula"
					),
				"password" => array(
					"type"  => "password",
			        "name"  => "password",
			        "value" => set_value("password"),
			        "class" => "form-control",
			        "placeholder" => "Password"
					),
				"submit" => array(
			        "id" 		=> "button",
			        "class"		=> "btn btn-default",
			        "type"      => "submit",
			        "content"   => "Iniciar sessión"
					)
				),
			"usuario"	=> array(
				"form" => array(
					"class" => "form-horizontal",
					"id" 	=> "form-admin"
					),
				"hidden" => array(
			        "name"  => "ajax",
			        "id"	=> "ajax",
			        "value" => "1"
					),
				"cedula" => array(
					"type"  => "text",
			        "name"  => "cedula",
			        "id"	=> "cedula",
			        "value" => set_value("cedula"),
			        "class" => "form-control"
					),
				"nombre1" => array(
					"type"  => "text",
			        "name"  => "nombre1",
			        "id"	=> "nombre1",
			        "value" => set_value("nombre1"),
			        "class" => "form-control"
					),
				"nombre2" => array(
					"type"  => "text",
			        "name"  => "nombre2",
			        "id"	=> "nombre2",
			        "value" => set_value("nombre2"),
			        "class" => "form-control"
					),
				"apellido1" => array(
					"type"  => "text",
			        "name"  => "apellido1",
			        "id"	=> "apellido1",
			        "value" => set_value("apellido1"),
			        "class" => "form-control"
					),
				"apellido2" => array(
					"type"  => "text",
			        "name"  => "apellido2",
			        "id"	=> "apellido2",
			        "value" => set_value("apellido2"),
			        "class" => "form-control"
					),
				"sexo1" => array(
			        "name"  => "sexo",
			        "id"	=> "sexo1",
			        "value" => "f"
					),
				"sexo2" => array(
			        "name"  => "sexo",
			        "id"	=> "sexo2",
			        "value" => "m"
					),
				"fecha_nacimiento" => array(
					"type"  => "date",
			        "name"  => "fecha_nacimiento",
			        "id"	=> "fecha_nacimiento",
			        "value" => set_value("fecha_nacimiento"),
			        "class" => "form-control",
			        "max"	=> date('Y-m-d')
					),
				"telef_personal" => array(
					"type"  => "text",
			        "name"  => "telef_personal",
			        "id"	=> "telef_personal",
			        "value" => set_value("telef_personal"),
			        "class" => "form-control",
			        "placeholder" => "(0212) 555-44-88"
					),
				"telef_emergencia" => array(
					"type"  => "text",
			        "name"  => "telef_emergencia",
			        "id"	=> "telef_emergencia",
			        "value" => set_value("telef_emergencia"),
			        "class" => "form-control",
			        "placeholder" => "(0212) 555-44-88"
					),
				"direccion" => array(
			        "name"  => "direccion",
			        "id"	=> "direccion",
			        "value" => set_value("direccion"),
			        "class" => "form-control"
					),
				"email" => array(
					"type"  => "email",
			        "name"  => "email",
			        "id"	=> "email",
			        "value" => set_value("email"),
			        "class" => "form-control",
			        "placeholder" => "ejemplo@dominio.com"
					),
				"username" => array(
					"type"  => "text",
			        "name"  => "username",
			        "id"	=> "username",
			        "value" => set_value("username"),
			        "class" => "form-control",
			        "placeholder" => "ejemplo@dominio.com"
					),
				"especialidad" => array(
			        "name"  		=> "especialidad",
			        "options" 		=> array(
			        					"" => "",
			        					"Administrador" => "Administrador",
			        					"Medicina" 		=> "Medicina",
			        					"Odontología" 	=> "Odontología",
			        					"Laboratorio" 	=> "Laboratorio",
			        					"Nutrición" 	=> "Nutrición"
			        					),
			        "selected" 		=> array(),
			        "attributes" 	=> array(
								        "class" 		=> "form-control",
								        "id"			=> "especialidad",
								        "placeholder" 	=> "Seleccione una especialidad..."
								        )
					),
				"password1" => array(
					"type"  => "password1",
			        "name"  => "password1",
			        "value" => set_value("password1"),
			        "class" => "form-control"
					),
				"password2" => array(
					"type"  => "password2",
			        "name"  => "password2",
			        "value" => set_value("password2"),
			        "class" => "form-control"
					),
				"tipo_usuario" => array(
			        "name"  		=> "tipo_usuario",
			        "options" 		=> array(
			        					"" => "",
			        					"Administrador" => "Administrador",
			        					"Doctor" 		=> "Doctor",
			        					"Enfermero" 	=> "Enfermero",
			        					"Odontólogo" 	=> "Odontólogo",
			        					"Bioanalista" 	=> "Bioanalista",
			        					"Nutricionista" => "Nutricionista",
			        					"Asistente" 	=> "Asistente"
			        					),
			        "selected" 		=> array(),
			        "attributes" 	=> array(
								        "class" 		=> "form-control",
								        "id"			=> "tipo_usuario",
								        "placeholder" 	=> "Seleccione una opción..."
								        )
					),
				"grado_instruccion" => array(
			        "name"  		=> "grado_instruccion",
			        "options" 		=> array(
			        					"" => "",
			        					"Administrador" => "Administrador",
			        					"Medicina" 		=> "Medicina",
			        					"Odontología" 	=> "Odontología",
			        					"Laboratorio" 	=> "Laboratorio",
			        					"Nutrición" 	=> "Nutriciónn"
			        					),
			        "selected" 		=> array(),
			        "attributes" 	=> array(
								        "class" 		=> "form-control",
								        "id"			=> "grado_instruccion",
								        "placeholder" 	=> "Seleccione un título..."
								        )
					),
				)
			);

		$this->load->view('login/index', $data);
	}
}