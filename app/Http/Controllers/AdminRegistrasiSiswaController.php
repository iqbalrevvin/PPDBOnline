<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminRegistrasiSiswaController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_lengkap";
			$this->limit = "1";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "siswa";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama Lengkap","name"=>"nama_lengkap"];
			$this->col[] = ["label"=>"Jenis Kelamin","name"=>"jenis_kelamin"];
			$this->col[] = ["label"=>"Tempat Lahir","name"=>"tempat_lahir"];
			$this->col[] = ["label"=>"Tanggal Lahir","name"=>"tanggal_lahir"];
			$this->col[] = ["label"=>"Status Pendaftaran","name"=>"status_pendaftaran","callback_php"=>'($row->status_pendaftaran == Diterima)?"<span class=\"label label-success\"><strong>Diterima</strong></span>":"<span class=\"label label-default\"><b>$row->status_pendaftaran</b></span>"'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Nama Lengkap','name'=>'nama_lengkap','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'select','validation'=>'required','width'=>'col-sm-5','dataenum'=>'Laki-laki;Perempuan'];
			$this->form[] = ['label'=>'NISN','name'=>'NISN','type'=>'text','validation'=>'max:10','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'NIK','name'=>'NIK','type'=>'text','validation'=>'required|min:16|max:16','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Tempat Lahir','name'=>'tempat_lahir','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Tanggal Lahir','name'=>'tanggal_lahir','type'=>'date','validation'=>'required|date','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Registrasi Akta Lahir','name'=>'registrasi_akta_lahir','type'=>'text','validation'=>'required|min:1|max:50','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Agama','name'=>'agama','type'=>'select','validation'=>'required','width'=>'col-sm-5','datatable'=>'agama,nama'];
			$this->form[] = ['label'=>'Kewarganegaraan','name'=>'kewarganegaraan','type'=>'select','validation'=>'required','width'=>'col-sm-4','dataenum'=>'WNI;WNA'];
			$this->form[] = ['label'=>'Kebutuhan Khusus','name'=>'kebutuhan_khusus','type'=>'select2','validation'=>'required','width'=>'col-sm-6','datatable'=>'kebutuhan_khusus,nama'];
			$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'text','validation'=>'required|string|min:5|max:191','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Rt','name'=>'rt','type'=>'text','validation'=>'required|min:1|max:3','width'=>'col-sm-1'];
			$this->form[] = ['label'=>'Rw','name'=>'rw','type'=>'text','validation'=>'required|min:1|max:3','width'=>'col-sm-1'];
			$this->form[] = ['label'=>'Desa','name'=>'desa','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Kota','name'=>'kota','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Provinsi','name'=>'provinsi','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'text','validation'=>'required|min:1|max:5','width'=>'col-sm-2'];
			$this->form[] = ['label'=>'Tempat Tinggal','name'=>'tempat_tinggal','type'=>'select2','validation'=>'required','width'=>'col-sm-7','datatable'=>'tempat_tinggal,nama'];
			$this->form[] = ['label'=>'Moda Transportasi','name'=>'moda_transportasi','type'=>'select2','validation'=>'required','width'=>'col-sm-5','datatable'=>'moda_transportasi,nama'];
			$this->form[] = ['label'=>'No. KKS','name'=>'no_kks','type'=>'text','validation'=>'max:8','width'=>'col-sm-5','help'=>'Kosongkan Jika Bukan Penerima'];
			$this->form[] = ['label'=>'Anak Ke','name'=>'anak_ke','type'=>'text','validation'=>'required|min:1|max:2','width'=>'col-sm-1'];
			$this->form[] = ['label'=>'Penerima KPS','name'=>'penerima_kps','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'Ya;Tidak'];
			$this->form[] = ['label'=>'No KPS','name'=>'no_kps','type'=>'text','validation'=>'max:14','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			$this->form[] = ['label'=>'Penerima Kip','name'=>'penerima_kip','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'Ya;Tidak'];
			$this->form[] = ['label'=>'No Kip','name'=>'no_kip','type'=>'text','validation'=>'max:6','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			$this->form[] = ['label'=>'Nama di KIP','name'=>'nama_kip','type'=>'text','validation'=>'max:50','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			$this->form[] = ['label'=>'Alasan Layak PIP','name'=>'alasan_layak_pip','type'=>'select2','width'=>'col-sm-7','datatable'=>'alasan_layak_pip,nama'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Nama Lengkap','name'=>'nama_lengkap','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Jenis Kelamin','name'=>'jenis_kelamin','type'=>'select','validation'=>'required','width'=>'col-sm-5','dataenum'=>'Laki-laki;Perempuan'];
			//$this->form[] = ['label'=>'NISN','name'=>'NISN','type'=>'text','validation'=>'max:10','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'NIK','name'=>'NIK','type'=>'text','validation'=>'required|min:16|max:16','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Tempat Lahir','name'=>'tempat_lahir','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Tanggal Lahir','name'=>'tanggal_lahir','type'=>'date','validation'=>'required|date','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Registrasi Akta Lahir','name'=>'registrasi_akta_lahir','type'=>'text','validation'=>'required|min:1|max:50','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Agama','name'=>'agama','type'=>'select','validation'=>'required','width'=>'col-sm-5','datatable'=>'agama,nama'];
			//$this->form[] = ['label'=>'Kewarganegaraan','name'=>'kewarganegaraan','type'=>'select','validation'=>'required','width'=>'col-sm-4','dataenum'=>'WNI;WNA'];
			//$this->form[] = ['label'=>'Kebutuhan Khusus','name'=>'kebutuhan_khusus','type'=>'select2','validation'=>'required','width'=>'col-sm-6','datatable'=>'kebutuhan_khusus,nama'];
			//$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'text','validation'=>'required|string|min:5|max:191','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Rt','name'=>'rt','type'=>'text','validation'=>'required|min:1|max:3','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Rw','name'=>'rw','type'=>'text','validation'=>'required|min:1|max:3','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Desa','name'=>'desa','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			//$this->form[] = ['label'=>'Kecamatan','name'=>'kecamatan','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			//$this->form[] = ['label'=>'Kota','name'=>'kota','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			//$this->form[] = ['label'=>'Provinsi','name'=>'provinsi','type'=>'text','validation'=>'required|min:1|max:100','width'=>'col-sm-7'];
			//$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'text','validation'=>'required|min:1|max:5','width'=>'col-sm-2'];
			//$this->form[] = ['label'=>'Tempat Tinggal','name'=>'tempat_tinggal','type'=>'select2','validation'=>'required','width'=>'col-sm-7','datatable'=>'tempat_tinggal,nama'];
			//$this->form[] = ['label'=>'Moda Transportasi','name'=>'moda_transportasi','type'=>'select2','validation'=>'required','width'=>'col-sm-5','datatable'=>'moda_transportasi,nama'];
			//$this->form[] = ['label'=>'No. KKS','name'=>'no_kks','type'=>'text','validation'=>'max:8','width'=>'col-sm-5'];
			//$this->form[] = ['label'=>'Anak Ke','name'=>'anak_ke','type'=>'text','validation'=>'required|min:1|max:2','width'=>'col-sm-1'];
			//$this->form[] = ['label'=>'Penerima KPS','name'=>'penerima_kps','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'Ya;Tidak'];
			//$this->form[] = ['label'=>'No KPS','name'=>'no_kps','type'=>'text','validation'=>'max:14','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			//$this->form[] = ['label'=>'Penerima Kip','name'=>'penerima_kip','type'=>'select','validation'=>'required','width'=>'col-sm-3','dataenum'=>'Ya;Tidak'];
			//$this->form[] = ['label'=>'No Kip','name'=>'no_kip','type'=>'text','validation'=>'max:6','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			//$this->form[] = ['label'=>'Nama di KIP','name'=>'nama_kip','type'=>'text','validation'=>'max:50','width'=>'col-sm-6','help'=>'Kosongkan Jika Bukan Penerima'];
			//$this->form[] = ['label'=>'Alasan Layak PIP','name'=>'alasan_layak_pip','type'=>'select2','width'=>'col-sm-7','datatable'=>'alasan_layak_pip,nama'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();
	        $this->addaction[] = ['label'=>'Formulir','url'=>CRUDBooster::mainpath('edit/[id]'),'icon'=>'fa fa-file','color'=>'default'];

	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();    
	        $this->table_row_color[] = ['condition'=>"[status_pendaftaran] == 'Pending'","color"=>"warning"];
	        $this->table_row_color[] = ['condition'=>"[status_pendaftaran] == 'Ditolak'","color"=>"danger"];
	        $this->table_row_color[] = ['condition'=>"[status_pendaftaran] == 'Diterima'","color"=>"success"];       

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        $query->where('user_id', '=', CRUDBooster::myId());
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 


	}