<?php
	class Categoria extends Produto {
		protected $table = 'categorias';

		public function findAll() {
            $sql = "SELECT * FROM $this->table";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function radioButtonSelected() {
        	
        }
	}