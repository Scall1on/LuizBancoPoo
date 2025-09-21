<?php

class BoletoBancoBrasil extends BoletoAbstrato {
    public function gerarCodigoBarras(): string {
    $valorFormatado = number_format($this->getValor(), 2, '', '');
    $dataFormatada = date('Ymd', strtotime($this->getDataVencimento()));
    return "001{$valorFormatado}{$dataFormatada}";
    }
    
    public function validar(): bool {
        return true; 
    }

    protected function renderizarHtml(): string {
        return "<html><body><h1>Boleto Banco do Brasil</h1><p>Valor: {$this->getValor()}</p><p>Vencimento: {$this->getDataVencimento()}</p></body></html>";
    }

    protected function renderizarPdf(): string {
        return "<pdf><h1>Boleto Banco do Brasil</h1><p>Valor: {$this->getValor()}</p><p>Vencimento: {$this->getDataVencimento()}</p></pdf>";
    }
}