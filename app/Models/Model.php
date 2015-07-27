<?php

	@include '../../config.php';
    @include '../config.php';

	class Model
	{
		protected $table;
		
		protected $attributes;
		
		public function __construct()
		{
			$table = $this->table;
			$connection = $this->dbconnect();
			$structure = '';
			
			foreach($this->attributes as $key=>$value)
			{
				$structure.=$key.' '.$value.',';
			}
			$query="CREATE TABLE IF NOT EXISTS $table
					(
						id int AUTO_INCREMENT,
						$structure
						timestamp TIMESTAMP,
						PRIMARY KEY(id)
					)";
			
			if(!@mysql_query($query))
			{
				die(mysql_error());
			}
			
		}
		
		private function dbconnect() 
		{
			$conn = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
					or die ("<br/><b>Could not connect to MySQL server</b>");
			 
			@mysql_select_db(DB_NAME,$conn) or die ("<br/><b>Could not select the indicated database</b>");
		 
			return $conn;
		}
		
		
		public function find($id)
		{
            $table = $this->table;
            $query = "SELECT * FROM $table WHERE id='$id'";
            if($query_run=mysql_query($query))
            {

                return mysql_fetch_assoc($query_run);
            }
            else
            {
                die(mysql_error());
            }
		}

        public function count($values)
        {
            $table = $this->table;
            $structure = '';
            foreach($values as $key=>$value)
            {
                $structure .= $key.'='."'$value' AND";
            }
            rtrim($structure," AND");
            $query = "SELECT * FROM $table WHERE $structure";
            if($query_run = mysql_query($query))
            {
                return mysql_num_rows($query_run);
            }else{
                die(mysql_error());
            }
        }

		public function all()
		{
            $table = $this->table;
            $query = "SELECT * FROM $table";
            if($query_run = mysql_query($query))
            {
                if($res=mysql_num_rows($query_run))
                {
                    return mysql_fetch_assoc($query_run);
                }
            }else{
                die(mysql_error());
            }
		}
		
		
		public function delete($id)
		{
			$table = $this->table;
			$query = "DELETE FROM $table WHERE id='$id'";
			if(!@mysql_query($query))
			{
                die(mysql_error());
			}
		}
		
		public function insert($values)
		{
			$table = $this->table;
			$columns = array_keys($values);
			$structure_cols='id,';
			foreach($columns as $column)
			{
				$structure_cols.=$column.',';
			}
			$structure_cols.='timestamp';
			$vals = array_values($values);
			$structure_vals = "'',";
			foreach($vals as $val)
			{
				$structure_vals.="'$val',";
			}
			$structure_vals.='CURRENT_TIMESTAMP';
			$query = "INSERT INTO $table($structure_cols) VALUES($structure_vals)";
			if(!@mysql_query($query))
			{
				die(mysql_error());
			}
		}

	}

?>