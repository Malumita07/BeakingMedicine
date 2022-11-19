<?php
    class Conexion {
        private $servername = "localhost";
        private $username = "root";
        private $password = "admin"; // Josue no tiene contraseña
        private $db = "proyecto";
        private $conexion;
        
        public function Conectar() {
            $this->conexion = new mysqli($this->servername, $this->username, $this->password, $this->db);

            if ($this->conexion->connect_error) {
                //echo "<script>console.log('Error de conexion')</script>";
                die("Connection failed: " .$this->conexion->connect_error);
                }
                //echo "<script>console.log('Conectado')</script>";
        }

        public function Consulta($consulta) {
            return $this->conexion->query($consulta);
        }

        public function Affected_rows() {
            return $this->conexion->affected_rows;
        }
    }
?>