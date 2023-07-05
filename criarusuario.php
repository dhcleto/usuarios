<?php
include_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $newusername = $_POST ["newusername"];
    $newpassword = $_POST ["newpassword"];
    $email = $_POST["email"];
    criarUsuario($newusername,$newpassword,$email);

}
function criarUsuario($newusername,$newpassword,$email){

    

    $conn = conectarBanco ();
    $sql = "select * from usuarios where usuario = '$newusername'";  
    $resultado = $conn->query($sql);   

    if ($resultado->num_rows>0){
        echo"usuario já cadastrado";
    }else{
    
$sql = "insert into usuarios(usuario,senha,email)  values('$newusername','$newpassword','$email' )";  
 

if($conn->query($sql)){
    echo "<script>alert('Usuario criado com sucesso')</script>";
}else{
    die("erro".mysql_connect_error());
} 
    }
}

?>