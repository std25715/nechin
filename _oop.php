<?php
    class db{
        protected $conn;
        public $res;

        function __construct(){
            $this->conn = new mysqli("localhost","root","","nechinshop");
        }
        function __destruct(){
            $this->conn->close();
        }
        function sel($sql){
            $this->res = $this->conn->query($sql);
            if($this->res->num_rows > 0){
                return true;
            }
            else{
                return false;
            }
        }
        function add($table, $col, $value){
            $sql = "INSERT INTO $table($col) VALUES ($value)";

            if($this->conn->query($sql)===TRUE){
                return true;
            }
            else{
                return false;
            }
        }
        function update($table, $set, $where){
            $sql = "update $table set $set where $where";

            if($this->conn->query($sql)===TRUE){
                return true;
            }
            else{
                return false;
            }
        }
        function del($table, $where){
            $sql = "delete from $table where $where";

            if($this->conn->query($sql)===TRUE){
                return true;
            }
            else{
                return false;
            }
        }

        
    }
?>