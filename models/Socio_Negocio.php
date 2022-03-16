<?php 

    class Socios extends Conectar{

        public function get_socios(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_socio($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_socios_negocio WHERE ID = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_socio($nombre, $razonsocial, $direccion, $rtn, $contacto, $estado){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ma_socios_negocio(id,nombre,razon_social,direccion,RTN,contacto,estado) 
            VALUES (NULL,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $razonsocial);
            $sql->bindValue(3, $direccion);
            $sql->bindValue(4, $rtn);
            $sql->bindValue(5, $contacto);
            $sql->bindValue(6, $estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_socio($id,$razonsocial,$direccion, $rtn, $contacto ){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ma_socios_negocio SET razonsocial=? ,direccion=?, RTN =?, contacto= ? WHERE id=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $razonsocial);
            $sql->bindValue(2, $direccion);
            $sql->bindValue(3, $rtn);
            $sql->bindValue(4, $contacto);
            $sql->bindValue(5, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>

