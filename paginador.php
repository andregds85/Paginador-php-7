<?php 

  include("conecta.php");
  $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 
 
    $cmd = "select * from procedimentos"; 
    $produtos = mysqli_query($con,$cmd); 

    $total = mysqli_num_rows($produtos); 

    $registros = 500; 

    $numPaginas = ceil($total/$registros); 
    $inicio = ($registros*$pagina)-$registros; 
 
    $cmd = "select * from procedimentos limit $inicio,$registros"; 
    $produtos = mysqli_query($con,$cmd); 
    $total = mysqli_num_rows($produtos); 
     
    echo "<table>";
    echo "<tr>";
    echo "<td>id</td>";
    echo "<td>codigo</td>";
    echo "<td>Nome</td>";
    echo "</tr>";
    while ($produto = mysqli_fetch_array($produtos)) { 

           echo "<tr>";
           echo "<td>";
           echo $produto['id']; 
           echo "</td>";
           echo "<td>";
           echo $produto['codigo']; 
           echo "</td>";
           echo "<td>";
           echo $produto['nome']; 
           echo "</td>";
           echo "</tr>";
    
    } 
    for($i = 1; $i < $numPaginas + 1; $i++) { 
        echo "<a href='paginador.php?pagina=$i'>".$i."</a> "; 
    } 
?>