<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('securityuser');
        $this->load->library('grocery_CRUD');
    }

    ///// iconos 
    ///http://getbootstrap.com/2.3.2/base-css.html#icons
    public function getMenu() {
        $menu = array();
        array_push($menu, array("url" => "admin/sede", "label" => "Sede", "icon" => "icon-home"));
        array_push($menu, array("url" => "admin/corredor", "label" => "Corredor", "icon" => "icon-home"));
        //array_push($menu, array("url" => "admin/categoria", "label" => "Categoria", "icon" => "icon-home"));
        //array_push($menu, array("url" => "admin/carrera", "label" => "Carrera", "icon" => "icon-home"));

        return $menu;
    }

    /* no modificar */

    public function getMenuAdmin() {
        $menu = array();
        array_push($menu, array("url" => "admin/usuario", "label" => "Usuarios", "icon" => "icon-user"));
        return $menu;
    }

    public function showPage($output = null) {
        if ($this->securityCheck()) {
            $output->data['menu'] = $this->getMenu();
            $output->data['menuAdmin'] = $this->getMenuAdmin();
            $this->load->view('../../template/index.php', $output);
        } else {
            redirect("admin/login");
        }
    }

    public function index() {

        $this->showPage((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function usuario() {
        $crud = new grocery_CRUD();
        $crud->set_table("securityuser");

        $crud->columns('usuario', 'fecha_creacion');
        // $crud->fields('usuario','password','nombre','correo');


        $crud->field_type('password', 'password');

        $crud->change_field_type('fecha_creacion', 'invisible');
        $crud->change_field_type('fecha_modificacion', 'invisible');
        $crud->change_field_type('password_anterior', 'invisible');
        $crud->change_field_type('estado', 'invisible');

        $crud->callback_before_insert(array($this, 'usuario_insert_callback'));

        $output = $crud->render();
        $this->showPage($output);
    }

    public function login() {

        $this->load->view('../../template/login.php');
    }

    public function logout() {

        $securityUser = new SecurityUser();
        $securityUser->logout();
        $this->load->view('../../template/login.php');
    }

    public function autentificar() {

        $username = $this->input->post("username");
        $password = $this->input->post("passsword");

        $securityUser = new SecurityUser();
        $securityUser->login($username, $password);

        redirect("admin/index");

        //  $this->load->view('../../template/login.php');
    }

    function usuario_insert_callback($post_array) {

        $post_array['fecha_creacion'] = date("d.m.Y h:i:s");
        $post_array['fecha_modificacion'] = date("d.m.Y h:i:s");
        $post_array['estado'] = 'A';
        $post_array['fecha_modificacion'] = date("d.m.Y h:i:s");
        $post_array['password_anterior'] = $post_array['password'];

        return $post_array;
    }

    function securityCheck() {

        $usuario = $this->session->userdata('user_login');
        if ($usuario == "") {
            return false;
        } else {
            return true;
        }
    }

    //////////////////////////////////////////////////////    
    function _add_default_date_value(){
            $value = !empty($value) ? $value : date("d/m/Y");
            $return = '<input type="text" name="date" value="'.$value.'" class="datepicker-input" /> ';
            $return .= '<a class="datepicker-input-clear" tabindex="-1">Clear</a> (dd/mm/yyyy)';
            return $return;
    }
    //////////////////////////////////////////////////////



    public function sede(){
        $crud = new grocery_CRUD();
        $crud->set_table("sede");
        $crud->set_subject('Sede');
        $crud->display_as('nombre','Nombre');
        $crud->display_as('direccion','Dirección');
        $crud->display_as('fecha_fundacion','Fecha de fundación');
        $crud->display_as('hora_entrenamiento','Hora de entrenamiento');
        $crud->display_as('estado','Estado');

        $crud->columns('nombre', 'hora_entrenamiento', 'direccion', 'fecha_fundacion', 'estado');
        $crud->fields('nombre', 'hora_entrenamiento', 'direccion', 'fecha_fundacion', 'estado');
        $crud->required_fields('nombre', 'hora_entrenamiento', 'direccion', 'fecha_fundacion', 'estado');
        
        $crud->field_type('direccion', 'string');

        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }


    public function corredor(){
        $crud = new grocery_CRUD();
        $crud->set_table("corredor");
        $crud->set_subject('Corredor');

        $crud->display_as('cedula', 'Cédula' );
        $crud->display_as('apellidos', 'Apellidos' );
        $crud->display_as('nombres', 'Nombres' );
        $crud->display_as('sexo', 'Sexo' );
        $crud->display_as('estado_civil', 'Estado Civil' );
        $crud->display_as('fecha_nacimiento', 'Fecha de Nacimiento' );
        $crud->display_as('nacionalidad', 'Nacionalidad' );
        $crud->display_as('email', 'E-mail' );
        $crud->display_as('direccion', 'Dirección' );
        $crud->display_as('celular', 'Celular' );
        $crud->display_as('otros_telefonos', 'Otros teléfonos' );
        $crud->display_as('contaco_emergencia', 'Nombre de contacto de Emergencia' );
        $crud->display_as('telefono_emergencia', 'Teléfono de contacto de Emergencia' );
        $crud->display_as('tipo_sangre', 'Tipo de Sangre' );
        $crud->display_as('talla_camiseta', 'Talla de Camiseta' );
        $crud->display_as('alias', 'Alias/Nick' );
        $crud->display_as('fecha_ingresototem', 'Fecha de ingreso' );
        $crud->display_as('estado', 'Estado' );
        $crud->display_as('id_sede', 'Sede' );

        $crud->columns('id_sede', 'cedula', 'apellidos', 'nombres', 'sexo', 'estado_civil', 'fecha_nacimiento', 'nacionalidad', 'email', 'direccion', 'celular', 'otros_telefonos', 'contaco_emergencia', 'telefono_emergencia', 'tipo_sangre', 'talla_camiseta', 'alias', 'fecha_ingresototem', 'estado');
        $crud->fields('cedula', 'apellidos', 'nombres', 'sexo', 'estado_civil', 'fecha_nacimiento', 'nacionalidad', 'email', 'direccion', 'celular', 'otros_telefonos', 'contaco_emergencia', 'telefono_emergencia', 'tipo_sangre', 'talla_camiseta', 'alias', 'fecha_ingresototem', 'estado', 'id_sede');
        $crud->required_fields('cedula', 'apellidos', 'nombres', 'sexo', 'estado_civil', 'fecha_nacimiento', 'nacionalidad', 'email', 'direccion', 'celular', 'contaco_emergencia', 'telefono_emergencia', 'tipo_sangre', 'talla_camiseta', 'alias', 'fecha_ingresototem', 'estado', 'id_sede');

        $crud->set_relation('id_sede', 'sede', 'nombre');


        $crud->field_type('direccion', 'string');
        $crud->field_type('estado_civil', 'dropdown', array(
            'soltero' => 'Soltero',
            'casado' => 'Casado',
            'viudo' => 'Viudo',
            'divorciado' => 'Divorciado',
            'unido' => 'Union Libre'
        ));
        $crud->field_type('sexo', 'dropdown', array(
            'M' => 'Masculino',
            'F' => 'Femenino'
        ));
        $crud->field_type('nacionalidad', 'dropdown', array(
            'ec' => 'Ecuatoriano/a',
            'co' => 'Colombiano/a',
            'pe' => 'Peruano/a',
            'mx' => 'Mexicano/a',
            'ar' => 'Argentino/a',
            'uy' => 'Uruguayo/a',
            'py' => 'Paraguayo/a',
            'us' => 'Estadounidense'
        ));
        $crud->field_type('tipo_sangre', 'dropdown', array(
            'O+' => 'O Positivo',
            'O-' => 'O Negativo',
            'A+' => 'A Positivo',
            'A-' => 'A Negativo',
            'B+' => 'B Positivo',
            'B-' => 'B Negativo',
            'AB+' => 'AB Positivo',
            'AB-' => 'AB Negativo'
        ));
        $crud->field_type('talla_camiseta', 'dropdown', array(
            'S' => 'S - Small',
            'M' => 'M - Medium',
            'L' => 'L - Large',
            'XL' => 'XL - Extra Large'
        ));
        $crud->field_type('estado', 'dropdown', array(
            '1' => 'Activo',
            '0' => 'Inactivo'
        ));
        
        $output = $crud->render();
        $this->showPage($output);
    }

}