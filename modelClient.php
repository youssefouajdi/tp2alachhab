<?php
    class modelClient extends models{
        public function getClient(){
            $this->getbdd();
            return $this->query('table_client','Client');
        }
    }