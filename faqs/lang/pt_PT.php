<?php

/**
 * Portuguese (Portugal) language pack
 * @package modules: faqs
 * @subpackage i18n
 */

i18n::include_locale_file('modules: faqs', 'en_US');

global $lang;

if(array_key_exists('pt_PT', $lang) && is_array($lang['pt_PT'])) {
	$lang['pt_PT'] = array_merge($lang['en_US'], $lang['pt_PT']);
} else {
	$lang['pt_PT'] = $lang['en_US'];
}

$lang['pt_PT']['FaqsPageEntry']['QUESTIONLABEL'] = 'Pergunta';
$lang['pt_PT']['FaqsPageEntry']['ANSWERLABEL'] = 'Resposta';
$lang['pt_PT']['FaqsPageEntry']['COUNTHITSLABEL'] = 'Incrementar contador?';
$lang['pt_PT']['FaqsPageEntry']['HITSLABEL'] = 'Número de Consultas?';
$lang['pt_PT']['FaqsPageEntry']['RELATEDLABEL'] = 'Faqs Relacionadas';

$lang['pt_PT']['FaqsHolder']['SEARCHTITLE'] = 'Pesquisa';
$lang['pt_PT']['FaqsHolder']['SEARCHSELCATEGORY'] = 'Tema';
$lang['pt_PT']['FaqsHolder']['SEARCHBUTTONLABEL'] = 'Pesquisar';
$lang['pt_PT']['FaqsHolder']['SEARCHRESULTS'] = 'Resultados da pesquisa';

$lang['pt_PT']['FaqsHolder.ss']['GOTOFAQ'] = 'Ver Documento';
$lang['pt_PT']['FaqsHolder.ss']['VIEWFAQSCOMMENTS'] = 'Ver Comentários';
$lang['pt_PT']['FaqsHolder.ss']['NOFAQSENTRIES'] = 'Não foram encontrados registos para a pesquisa efectuada.';
$lang['pt_PT']['FaqsHolder.ss']['GOTOPREVIOUSPAGE'] = 'Página anterior';
$lang['pt_PT']['FaqsHolder.ss']['GOTONEXTPAGE'] = 'Pŕoxima Página';
$lang['pt_PT']['FaqsHolder.ss']['PREVIOUSPAGE'] = 'Anterior';
$lang['pt_PT']['FaqsHolder.ss']['NEXTPAGE'] = 'Seguinte';
$lang['pt_PT']['FaqsHolder.ss']['VIEWPAGENUM'] = 'Ver número de página';
$lang['pt_PT']['FaqsPage.ss']['RELATEDFAQ'] = 'Faqs Relacionadas';

$lang['pt_PT']['FaqsSearchResults.ss']['READMORE'] = 'Lê mais sobre ';
$lang['pt_PT']['FaqsSearchResults.ss']['NORESULTSFAQS'] = 'Não foram encontrados registos para a pesquisa efectuada.';

$lang['pt_PT']['FaqsTopWidget']['TITLE'] = 'Top Faqs.';
$lang['pt_PT']['FaqsTopWidget']['LIMIT'] = 'N.º de Faqs para listar';
$lang['pt_PT']['FaqsTopWidget']['LABEL'] = 'Título do Widget';

$lang['pt_PT']['FaqsSearchWidget']['TITLE'] = 'Pesquisar Faqs';
$lang['pt_PT']['FaqsSearchWidget']['LIMIT'] = 'Itens por página';
$lang['pt_PT']['FaqsSearchWidget']['LABEL'] = 'Título do Widget';
?>