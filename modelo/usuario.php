<?php
    class Usuario
    {
        private $IdUsuario;
        private $IdTipoUsuario;
        private $NombCompleto;
        private $NombUsuario;
        private $Contrasena;
        private $Telefono;
        private $Correo;
        private $EstadoUsuario;  
        
        public function getIdUsuario(){
            return $this->IdUsuario;
        }
    
        public function setIdUsuario($IdUsuario){
            $this->IdUsuario = $IdUsuario;
        }
    
        public function getIdTipoUsuario(){
            return $this->IdTipoUsuario;
        }
    
        public function setIdTipoUsuario($IdTipoUsuario){
            $this->IdTipoUsuario = $IdTipoUsuario;
        }
    
        public function getNombCompleto(){
            return $this->NombCompleto;
        }
    
        public function setNombCompleto($NombCompleto){
            $this->NombCompleto = $NombCompleto;
        }
    
        public function getNombUsuario(){
            return $this->NombUsuario;
        }
    
        public function setNombUsuario($NombUsuario){
            $this->NombUsuario = $NombUsuario;
        }
    
        public function getContrasena(){
            return $this->Contrasena;
        }
    
        public function setContrasena($Contrasena){
            $this->Contrasena = $Contrasena;
        }
    
        public function getTelefono(){
            return $this->Telefono;
        }
    
        public function setTelefono($Telefono){
            $this->Telefono = $Telefono;
        }
    
        public function getCorreo(){
            return $this->Correo;
        }
    
        public function setCorreo($Correo){
            $this->Correo = $Correo;
        }
    
        public function getEstadoUsuario(){
            return $this->EstadoUsuario;
        }
    
        public function setEstadoUsuario($EstadoUsuario){
            $this->EstadoUsuario = $EstadoUsuario;
        }

    }
?>