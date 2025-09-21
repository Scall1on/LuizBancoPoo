<?php
interface BoletoInterface {
public function gerarCodigoBarras (): string;
public function validar (): bool;
public function renderizar(string $formato): string;
}
abstract class BoletoAbstrato implements BoletoInterface {
protected float $valor;
protected string $dataVencimento;
public function __construct(float $valor , string $dataVencimento) {
$this ->valor = $valor;
$this ->dataVencimento = $dataVencimento;
}
public function getValor (): float { return $this ->valor; }
public function getDataVencimento (): string { return $this ->dataVencimento;
}
//M t o d oconcreto coml g i c acompartilhada

public function renderizar(string $formato): string {
if ($formato === ’html’) {
return $this ->renderizarHtml ();
} elseif ($formato === ’pdf’) {
return $this ->renderizarPdf ();
}
throw new InvalidArgumentException("Formato
n
o
suportado");
}
abstract protected function renderizarHtml (): string;
abstract protected function renderizarPdf (): string;
}