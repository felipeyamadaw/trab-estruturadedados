<?php

// classe do nó
class No {

    public $valor;
    public $proximo;
    public $anterior;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->proximo = null;
        $this->anterior = null;
    }
}

// classe da lista
class ListaDupla {

    private $inicio;
    private $fim;

    public function __construct() {
        $this->inicio = null;
        $this->fim = null;
    }

    // inserir elemento
    public function inserir($valor) {

        $novo = new No($valor);

        // primeiro elemento
        if ($this->inicio == null) {

            $this->inicio = $novo;
            $this->fim = $novo;

        } else {

            $novo->anterior = $this->fim;
            $this->fim->proximo = $novo;
            $this->fim = $novo;
        }
    }

    // listar elementos
    public function listar() {

        $atual = $this->inicio;

        echo "Lista: ";

        while ($atual != null) {

            echo $atual->valor . " ";
            $atual = $atual->proximo;
        }

        echo "<br>";
    }

    // listar reverso
    public function listarReverso() {

        $atual = $this->fim;

        echo "Reverso: ";

        while ($atual != null) {

            echo $atual->valor . " ";
            $atual = $atual->anterior;
        }

        echo "<br>";
    }

    // editar valor
    public function editar($valorAntigo, $novoValor) {

        $atual = $this->inicio;

        while ($atual != null) {

            if ($atual->valor == $valorAntigo) {

                $atual->valor = $novoValor;
                return;
            }

            $atual = $atual->proximo;
        }
    }

    // remover elemento
    public function remover($valor) {

        $atual = $this->inicio;

        while ($atual != null) {

            if ($atual->valor == $valor) {

                // remove início
                if ($atual == $this->inicio) {

                    $this->inicio = $atual->proximo;

                    if ($this->inicio != null) {
                        $this->inicio->anterior = null;
                    }
                }

                // remove fim
                else if ($atual == $this->fim) {

                    $this->fim = $atual->anterior;
                    $this->fim->proximo = null;
                }

                // remove meio
                else {

                    $atual->anterior->proximo = $atual->proximo;
                    $atual->proximo->anterior = $atual->anterior;
                }

                return;
            }

            $atual = $atual->proximo;
        }
    }
}

// criando lista
$lista = new ListaDupla();

// inserindo valores
$lista->inserir(10);
$lista->inserir(20);
$lista->inserir(30);

// listando
$lista->listar();

// reverso
$lista->listarReverso();

// editando
$lista->editar(20, 25);

// listando novamente
$lista->listar();

// removendo
$lista->remover(25);

// listando novamente
$lista->listar();

?>