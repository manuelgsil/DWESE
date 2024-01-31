<?php require_once("DadoPoker.php");

class Cubilete
{
    public function __construct(
        private array $dados = [],
    ) {
        $this->llenarCubilete();
    }
    public function llenarCubilete()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->dados[$i] = new DadoPoker();
            $this->dados[$i]->tirarDado();
        }
    }
    public function __toString()
    {
        $result = "Dados en el cubilete: ";
        foreach ($this->dados as $dado) {
            $result .= $dado . ' ';
        }
        return $result;
    }
}
