<?php

    // namespace Cliente;
    namespace Cliente;
    class Cadastro extends \Cadastro
    {
        public function registrarVenda()
        {
            echo "Foi registrado uma venda para o cliente: " . "<br>". $this->getNome() . "<br>" . $this->getEmail() . "<br>" . $this->getSenha();
            ;
        }
    }



?>
