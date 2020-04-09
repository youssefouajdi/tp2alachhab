<?php
    class modelFacture extends models{
        public function getFacture(){
            $this->getbdd();
            return $this->query('table_Facture','Facture');
        }
    }