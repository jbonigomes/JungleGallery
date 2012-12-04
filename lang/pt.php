<?php

 /******************************************************************************************************************************
 *	Array para a lingua Pourtuguesa
 *		+ Utiliza o codigo de 2 caracters ISO 639-1 para diferenciacao de linguas no nome do archivo
 *		+ Linguas podem ser adicionadas no diretorio lang:
 *			- Copie pt.php (ou qualquer outra lingua presente de sua escolha)
 * 			- Renomie com o codigo correspondente
 *			- Traduza o arquivo (os valores do array e nao a clave)
 *				_ Sao os valores do lado direito do sinal de igualdade "="
 *				_ Tome cuidado com quotas singulares no texto, pode afetar a 'String'!
 *				_ Mais informacoes podem ser encontradas em:
 *						http://php.net/manual/pt_BR/language.types.string.php
 *						http://php.net/manual/pt_BR/language.types.array.php
 ******************************************************************************************************************************/

// Page title
$lang['title'] = 'Welcome to the Jungle!';

// Navigation
$lang['home'] = 'HOME';
$lang['upload'] = 'UPLOAD';

// Error messages
$lang['noImage'] = 'Imagen não foi encontrada!';
$lang['uploadTitle'] = 'O título da imagem deve ser uma sentence imprímivel que não seja maior de 20 caracteres';
$lang['uploadImage'] = 'Uma válida imagem jpg/jpeg deve ser escolhida';
$lang['uploadDescription'] = 'A descrição da imagem deve ser uma sentence imprímivel que não seja maior de 200 caracteres';
$lang['uploadError'] = 'Ocorreu um error com a transação, por favor tente novamente mais tarde!';

// Footer data
$lang['allRightsReserved'] = 'Todos os direitos reservados';
$lang['iconsBy'] = 'Ícones por';
$lang['flagsBy'] = 'Bandeiras por';
$lang['validationIconsBy'] = 'Ícones de Validação por';

// Image alt text
$lang['leaf'] = 'Folha';
$lang['validCSS'] = 'CSS Válido';
$lang['validHTML'] = 'HTML Válido';

// Form labels
$lang['imgTitle'] = 'Título';
$lang['imgFile'] = 'Escolher Imagen';
$lang['imgDescription'] = 'Descrição';

?>