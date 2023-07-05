<?php
require_once "conexao.php";
//getUsuarios();

function getUsuarios(){

    $conn = conectarBanco();

    $sql="select * from usuarios ";
    $usuarios = $conn->query($sql);

    $conn ->close ();

    return $usuarios;
   
}
{
    function buscarUsuario($id){

        $conn = conectarBanco();
        $sql = "select * from usuarios where id = '$id' ";
        $usuario = $conn->query ($sql);
        $conn ->close ();
        if ( $usuario->num_rows > 0){
            return $usuario->fetch_assoc();
        }
return null;
    } 


}
function atualizarUsuario ($id,$usuario,$email){

 
    $conn = conectarBanco();
    $sql = "update usuarios set usuario =?, email =? where id = ? ";
    $smt = $conn->prepare ($sql);
    $smt ->bind_param('ssi',$usuario,$email,$id);
    if($smt-> execute()){
        echo "Dados atualizados com sucesso";
    }else{
            echo " ERRO AO ATUALIZAR". mysqli_error ($conn); 

        
        }
    }

function excluirUsuario ($id){
    $conn = conectarBanco();
    $sql = "delete from usuarios where id= ?";
    $smt= $conn-> prepare($sql);
    $smt-> bind_param("i",$id);
    if($smt-> execute()){
        echo "<script>alaert('Usuario exluido); <script>";
    }else{
        echo "<script>alaert('ERRO AO EXLCUIR1); <script>";
}
}

