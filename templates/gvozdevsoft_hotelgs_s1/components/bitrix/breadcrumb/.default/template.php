<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(empty($arResult))
	return "";
$strReturn = '<ul itemscope itemtype="http://schema.org/BreadcrumbList">';
$pos = 1;
for($index = 0, $itemSize = count($arResult); $index < $itemSize; ++$index){
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if(strlen($arResult[$index]["LINK"]) && $arResult[$index]['LINK'] != GetPagePath() && $arResult[$index]['LINK']."index.php" != GetPagePath())
		$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item"><span itemprop="name">'.$title.'</span></a><meta itemprop="position" content="'.$pos.'" /></li>';
	else{
		$strReturn .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="item"><span itemprop="name">'.$title.'</span></span><meta itemprop="position" content="'.$pos.'" /></li>';
		break;
	}
	++$pos;
}
$strReturn .= '</ul>';
return $strReturn;?>