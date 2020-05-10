<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
	<meta charset="UTF-8">
	<title>Algoritmo de Kruskal</title>
</head>

<body>
<div id="wrapper">
	        
<div id="innerwrapper">
				
<div id="header">
					
<h1>Breno Assis</h1>
					
					
<ul id="nav">
						
<li>
<a href="index.html" class="active">Home</a>
</li>
						
<li>
<a href="otimizacao_em_redes.html" >Otimização em Redes</a>
</li>
						
<li>
<a href="">Simulador Tesouro Direto</a>
</li>
						
<li>
<a href="contato.html">Contato</a>
</li>
</ul>				
<ul id="subnav">
						
<li>
<a href="Dijkstra.html">Dijkstra</a>
</li>
                        
<li>
<a href="Kruskal.html">Kruskal</a>
</li>
						
<li><a href="Floyd.html">Floyd</a>
</li>
					
</ul>
				
</div>

<div id="sidebar">
                	
<h2>Acesso direto</h2>
                    
<ul class="subnav">
                        
<li>
<a href="http://lattes.cnpq.br/7026944709521992"><b>»</b>Curriculum Lattes</a>
</li>
                        
<li>
<a href="trabalhos.html"><b>»</b>Trabalhos realizados</a>
</li>
                        
</ul>
                    
                    
<h2>Downloads</h2>
                    
<ul class="subnav">
                    	
<li>
<a href=""><b>»</b>Listas</a>
</li>
                    
</ul>
                    
                    
<h2>Links</h2>
                    
<ul class="subnav">
						
<li>
<a href="https://www.linkedin.com/in/breno-assis-4431a6111/"><b>»</b>LinkedIn</a>
</li>
                        
</ul>
                
                    
</div>
				
<div id="contentnorightbar">                
                    
<?php
	require_once 'Kruskal++.php';

	$v=isset($_POST["vertices"])?$_POST["vertices"]:"[não informado]";
	$conex=isset($_POST["conex"])?$_POST["conex"]:"[não informado]";
	$g=new Grafo($v-1);
	$contador1=0;
	$contador2=0;
	for($c=0;$c<$conex-1;$c++){
		if($_POST["a1$c"]>$v || $_POST["a2$c"]>$v){
			$contador1++;
			echo "Vértice inputado maior que o número de vértices declarado, preencha os campos corretamente!<br/>";
		}else{
			$g->addAresta(isset($_POST["a1$c"])?$_POST["a1$c"]:10000,isset($_POST["a2$c"])?$_POST["a2$c"]:10000,isset($_POST["c$c"])?$_POST["c$c"]:10000);
			if($_POST["a1$c"]==$v || $_POST["a2$c"]==$v) {$contador2++;}
		}
	}
	if($contador2>0){ //$contador1==0 && 
		$g->kruskal();
	}else{
		echo "Preencha o campo NÚMERO DE VÉRTICES corretamente!";
	}
?>
</div>

				
<div id="footer">
					
<p>
						© Breno Assis - 2017
                    
</p>
				
</div>
		
            
</div>
        
</div>
	


</body>
</html>