<?php
class BoletoItau extends BoletoAbstrato implements BoletoJurosInterface {
    public function gerarCodigoBarras(): string {
        $valorFormatado = number_format($this->getValor(), 2, '', '');
        $dataFormatada = date('Ymd', strtotime($this->getDataVencimento()));
        return "341{$valorFormatado}{$dataFormatada}";
    }

    public function validar(): bool {
        $dataVenc = new DateTime($this->getDataVencimento());
        $hoje = new DateTime();
        return $dataVenc >= $hoje && $this->getValor() > 0;
    }

    protected function renderizarHtml(): string {
        return "<html><body><h1>Boleto Itaú</h1><p>Valor: {$this->getValor()}</p><p>Vencimento: {$this->getDataVencimento()}</p></body></html>";
    }

    protected function renderizarPdf(): string {
        return "<pdf><h1>Boleto Itaú</h1><p>Valor: {$this->getValor()}</p><p>Vencimento: {$this->getDataVencimento()}</p></pdf>";
    }

    
    public function aplicarJuros(float $taxa): void {
        $this->valor += $this->valor * ($taxa / 100);
    }
}