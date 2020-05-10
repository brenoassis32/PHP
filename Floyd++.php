<?php

class Grafo
{
private $V, $roteamento, $rota, $distancias, $custo, $infinito;	

public function Grafo($V)
{
	$this->V = $V; // atribui o número de vértices
	$this->infinito=10000;	

	for($i=0; $i<=$V;$i++){
		for($j=0; $j<=$V;$j++) {
			if($i==$j){
				$this->custo[$i][$j]=0;
			}else $this->custo[$i][$j]=$this->infinito;
		}
	}		
}
	// adiciona uma aresta ao grafo de v1 à v2
public function addAresta($v1, $v2, $c,$tipo)
{
	if($tipo==1){
		$this->custo[$v1-1][$v2-1]=$c;
		$this->custo[$v2-1][$v1-1]=$c;
	}else $this->custo[$v1-1][$v2-1]=$c;
}

public function floyd ()
{
	$i; 
	$j; 
	$k=0;

	//Gera Rotas			
	for($k = 0; $k <= $this->V+1; $k++ )	{
		for($i = 1; $i<=$this->V+1; $i++ ){
			for($j = 1; $j<=$this->V+1; $j++ ){
				$this->rota[$i-1][$j-1] = $i;
				$this->roteamento[$i][$j][$k] = $this->rota[$i-1][$j-1];
			}
		}
	}
	//Passo1
	for($k = 0; $k <= 1; $k++ )	{
		for($i = 0; $i <= $this->V; $i++ ){
			for($j = 0; $j<= $this->V; $j++ ){
				$this->distancias[$i+1][$j+1][$k] = $this->custo[$i][$j];
			}
		}
	}
	//Passo 2	
	for($k = 1; $k <= $this->V+1; $k++ )	{
		for($i = 1; $i<=$this->V+1; $i++ ){
			for($j = 1; $j<=$this->V+1; $j++ ){
				$this->distancias[$i][$j][$k] = $this->distancias[$i][$j][$k-1];
				$this->roteamento[$i][$j][$k] = $this->roteamento[$i][$j][$k-1];
				if($this->distancias[$i][$j][$k-1] != $this->infinito){
					if($this->distancias[$i][$j][$k-1] > $this->distancias[$i][$k][$k-1] + $this->distancias[$k][$j][$k-1]) {
					$this->distancias[$i][$j][$k] = $this->distancias[$i][$k][$k-1] + $this->distancias[$k][$j][$k-1];
					$this->roteamento[$i][$j][$k]= $this->roteamento[$k][$j][$k-1];
				    }
				} else{
					if(($this->distancias[$i][$k][$k-1] == $this->infinito) || ($this->distancias[$k][$j][$k-1] == $this->infinito)){
						$this->distancias[$i][$j][$k] = $this->infinito;
					} else{
						$this->distancias[$i][$j][$k] = $this->distancias[$i][$k][$k-1] + $this->distancias[$k][$j][$k-1];
						$this->roteamento[$i][$j][$k]= $this->roteamento[$k][$j][$k-1];
					}
			    }
			}
		}
	}
	printf("<p class='floyd'>");	
	for($k = 1; $k <= $this->V+1; $k++ )	{
	printf("<br/>");
	printf("k = %d<br/><br/>",$k);	
	//Imprime Matriz de Distâncias
		for($i = 1; $i <= $this->V+1; $i++){
			for($j = 1; $j <= $this->V+1; $j++){
				if($this->distancias[$i][$j][$k] != $this->infinito){
					printf(" %d",$this->distancias[$i][$j][$k]);
				}else printf(" &infin;");
			}
			printf("<br/>");
		}
		printf("<br/>");

	//Imprime roteamento	
		for($i = 1; $i <= $this->V+1; $i++){
			for($j = 1; $j <= $this->V+1; $j++){
				printf(" %d",$this->roteamento[$i][$j][$k]);
			}
			printf("<br/>");
		}	
	}printf("</p>");	
}
};

?>
