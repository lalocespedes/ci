<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" href="">
	<style type="text/css">
	.columna-sellos-derecha{
	font-size: 5px;
    float:left;
    width:600px;
    }
    
	.columna-sellos-izquierda{
	font-size:x-small;
    text-align:left;
    margin-right:5px;
    padding-right:4px;
    float:left;
    width:150px;
    }
	</style>
</head>
<body>
	<div style="font-size:12px; font-weight: bold; text-align: center;"><?php echo $Comprobante['Emisor']['@atributos']['nombre']; ?></div>
	<table>
		<tbody>
			<tr>
				<td width="50%">
					<p><b>RFC Emisor:</b> <?php echo $Comprobante['Emisor']['@atributos']['rfc'] ?></p>
					<p><b>Domicilio Fiscal Emisor</b></p>
					<p>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['calle']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['noExterior']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['noInterior']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['colonia']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['localidad']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['municipio']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['estado']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['pais']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['codigoPostal']; ?>
					</p>
					<p><b></b>Sucursal:</p>
					<br>
					<p><?php echo $Comprobante['Receptor']['@atributos']['rfc']; ?></p>
					<p><?php echo $Comprobante['Receptor']['@atributos']['nombre']; ?></p>
					<p><?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['calle']; ?>
						<?php echo $Comprobante['Emisor']['DomicilioFiscal']['@atributos']['noExterior']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['noInterior']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['colonia']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['localidad']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['municipio']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['estado']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['pais']; ?>
						<?php echo $Comprobante['Receptor']['DomicilioFiscal']['@atributos']['codigoPostal']; ?></p>
				</td>
				<td width="50%">
					<p><b>Folio Fiscal:</b> <?php echo $Comprobante['Complemento']['TimbreFiscalDigital']['@atributos']['UUID'] ?></p>
					<p><b>No de Serie del CSD:</b> <?php echo $Comprobante['@atributos']['noCertificado']; ?></p>
					<p><b>Lugar, Fecha y hora de emision:</b></p>
					<p><?php echo $Comprobante['@atributos']['LugarExpedicion']; ?> <?php echo $Comprobante['@atributos']['fecha']; ?></p>
					<p><b>Efecto del comprobante:</b> <?php echo $Comprobante['@atributos']['TipoDeComprobante']; ?></p>
					<p><b>Folio y Serie:</b> <?php echo $Comprobante['@atributos']['folio']; ?> <?php echo $Comprobante['@atributos']['serie']; ?>
					<p><b>Regimen Fiscal:</b> <?php echo $Comprobante['Emisor']['RegimenFiscal']['@atributos']['Regimen']; ?></p>
				</td>
			</tr>
		</tbody>
	</table>
<!-- 	<?php //echo (empty($invoice->Expcalle)) ? '' : $invoice->Expcalle; ?>
	<?php //echo (empty($invoice->ExpnoExterior)) ? '' : $invoice->ExpnoExterior; ?>
	<?php //echo (empty($invoice->ExpnoInterior)) ? '' : $invoice->ExpnoInterior; ?>
	<?php //echo (empty($invoice->Expcolonia)) ? '' : $invoice->Expcolonia; ?>
	<?php //echo (empty($invoice->Expmunicipio)) ? '' : $invoice->Expmunicipio; ?>
	<?php //echo (empty($invoice->Expestado)) ? '' : $invoice->Expestado; ?>
	<?php //echo (empty($invoice->Exppais)) ? '' : $invoice->Exppais; ?>
	<?php //echo (empty($invoice->ExpcodigoPostal)) ? '' : $invoice->ExpcodigoPostal; ?> -->
	<br>
	<table autosize:"1" cellpadding="3" cellspacing="3">
        <tbody>
          <tr style="border:1px solid black; font-size:10px;">
				<th style="border:1px solid black; font-size:10px;">
					Cantidad
				</th>
				<th style="border:1px solid black; font-size:10px;">
					Unidad de Medida
				</th>
				<th style="border:1px solid black; font-size:10px;">
					NUMERO DE IDENTIFICACION
				</th>
				<th style="border:1px solid black; font-size:10px;">
					DESCRIPCION
				</th>
				<th style="border:1px solid black; font-size:10px;" align="center">
					PRECIO UNITARIO
				</th>
				<th style="border:1px solid black; font-size:10px;" align="center">
					IMPORTE
				</th>
			</tr>
			<?php foreach ($Comprobante['Conceptos']['Concepto']['@atributos'] as $key => $concepto): ?>
			<tr style="border:1px solid black;">
				<td align="center" style="border:1px solid black;">
					<?php echo $concepto['cantidad']; ?>
				</td>
				<td style="border:1px solid black;">
					<?php echo $concepto['unidad']; ?>
				</td>
				<td style="border:1px solid black;">
					<?php echo $concepto['noIdentificacion']; ?>
				</td>
				<td style="border:1px solid black;">
					<?php echo $concepto['descripcion']; ?>
				</td>
				<td align="right" style="border:1px solid black;">
					<?php echo $concepto['valorUnitario']; ?>
				</td>
				<td align="right" style="border:1px solid black;">
					<?php echo $concepto['importe']; ?>
				</td>
			</tr>
			<?php endforeach ?>

			<tr>
				<td colspan="4"></td>
				<td colspan="1" align="right" style="border:1px solid black;"><b>Subtotal</b></td>
				<td colspan="1" align="right" style="border:1px solid black;"><?php echo $Comprobante['@atributos']['subtotal']; ?></td>
			</tr>
			<?php if ($Comprobante['Impuestos']['Traslados']['Traslado']['@atributos']): ?>
				<?php foreach ($Comprobante['Impuestos']['Traslados']['Traslado']['@atributos'] as $key => $traslado): ?>
				<tr>
					<td colspan="4" ></td>
					<td colspan="1" align="right" style="border:1px solid black;"><b><?php echo $traslado['impuesto']; ?></b></td>
					<td colspan="1" align="right" style="border:1px solid black;"><?php echo $traslado['importe']; ?></td>
				</tr>
				<?php endforeach ?>
			<?php endif ?>
			<?php if ($Comprobante['Impuestos']['Retenciones']['Retencion']['@atributos']): ?>
				<?php foreach ($Comprobante['Impuestos']['Retenciones']['Retencion']['@atributos'] as $key => $retencion): ?>
				<tr>
					<td colspan="4" ></td>
					<td colspan="1" align="right" style="border:1px solid black;"><b>Retencion <?php echo $retencion['impuesto']; ?></b></td>
					<td colspan="1" align="right" style="border:1px solid black;"><?php echo $retencion['importe']; ?></td>
				</tr>
				<?php endforeach ?>
			<?php endif ?>
			if descuento
			<tr>
				<td colspan="4"  ></td>
				<td colspan="1" align="right" style="border:1px solid black;"><b>discount</b></td>
				<td colspan="1" align="right" style="border:1px solid black;">descuento</td>
			</tr>
			<tr>
				<td colspan="4"  >
					<p><b>Motivo del Descuento</b></p>
					<p><b>Moneda:</b> <?php echo $Comprobante['@atributos']['moneda']; ?> <b>Tipo de cambio:</b><?php echo ($Comprobante['@atributos']['TipoCambio'] > 1) ? $Comprobante['@atributos']['TipoCambio'] : ''; ?></p>
					<p><b>Forma de Pago:</b> <?php echo $Comprobante['@atributos']['formaDePago']; ?></p>
					<p><b>Metodo de Pago:</b> <?php echo $Comprobante['@atributos']['metodoDePago']; ?></p>
					<p><b>Numero de cuenta de Pago:</b> <?php echo $Comprobante['@atributos']['NumCtaPago']; ?></p>
					<p><b>Condiciones de Pago:</b> <?php echo $Comprobante['@atributos']['condicionesDePago']; ?></p>
					<b>Importe con letra:</b> <?php echo $Comprobante['importe_letra']; ?>
				</td>
				<td colspan="1" align="right" style="border:1px solid black;"><b>Total</b></td>
				<td colspan="1" align="right" style="border:1px solid black;"><?php echo $Comprobante['@atributos']['total']; ?></td>
			</tr>
          </tbody>
		</table>
	 <br>
	<div style="font-size:10px;">
		<div><b>Sello digital del CFDI</b></div>
		<?php echo $Comprobante['Complemento']['TimbreFiscalDigital']['@atributos']['selloCFD'];?>
	</div>
	<br>
	<div style="font-size:10px;">
		<div><b>Sello del SAT</b></div>
		<?php echo $Comprobante['Complemento']['TimbreFiscalDigital']['@atributos']['selloSAT']; ?>
	</div>
	<br>
	<div>
	<div class="columna-sellos-izquierda">
		<?php echo $qr; ?>
	</div>
	<div class="columna-sellos-derecha">
	<div style="font-size:10px;"><b>Cadena Original del complemento de certificaion digital del SAT</b></div>
	<div style="font-size:10px;"><?php echo $Comprobante['cadenaOriginalTFD']; ?></div>
	<div style="font-size:10px;"><b>No de Serie del Certificado del SAT:</b> <?php echo $Comprobante['Complemento']['TimbreFiscalDigital']['@atributos']['noCertificadoSAT']; ?></div>
	<div style="font-size:10px;"><b>Fecha y hora de certificacion:</b>	<?php echo $Comprobante['Complemento']['TimbreFiscalDigital']['@atributos']['FechaTimbrado']; ?></div>
	<div style="font-size:10px;">Este documento es una representacion impresa de un CFDI</div>
	</div>
	</div>
</body>
</html>