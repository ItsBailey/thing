<?php
/**==================================================+
|| # AcellCMS - Website and Content Management System.
|+==================================================+
|| # Copyright © 2018 - WeszDEV. All rights reserved.
|| # https://weszdev.com
|+==================================================+
|| # AcellCMS is free for the whole Retro Community.
|| # Don't know what you are doing? Quit already!
|+==================================================**/

// Roep het framework aan.
require_once 'Main/Framework.php';

// Accepteer geen mensen die niet ingelogd zijn.
if(!Users::isLogged()) { Core::forcePage($siteLink); exit; }

// Basis assigns voor de pagina.
$varMe = array(
    // siteTile = De website titel in de url balk.
    "siteTitle" => $siteShort." &bull; Welkom ".$userName."!",
    // loadCss = De css specifiek voor deze pagina.
    "loadCss" => '<!-- Resources - CSS -->
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/style.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/buttons.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/boxes.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/tooltips.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/welcome.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/personal.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/group.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'v2/styles/rooms.css" />
    <link rel="stylesheet" type="text/css" href="'.$siteLink.$siteDir.'styles/myhabbo/control.textarea.css" />',
    // loadJs = De js specifiek voor deze pagina.
    "loadJs" => '<!-- Resources - JS -->
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/visual.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/common.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/fullcontent.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/libs2.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/group.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/rooms.js"></script>
    <script type="text/javascript" src="'.$siteLink.$siteDir.'static/js/moredata.js"></script>',
    // extraJs = De extra js scripts voor deze pagina.
    "extraJs" => "document.habboLoggedIn = true;
    var habboName = '$userName';
    var habboReqPath = '$siteLink';
    var habboStaticFilePath = '$siteTemplateStyle';
    var habboImagerUrl = 'habbo-imaging/';
    var habboPartner = 'WeszDEV';
    var cmsHabblets = 'Templates/$siteTemplate/habblets/';
    window.name = 'habboMain';
    L10N.put('purchase.group.title', 'Maak een groep');",
    // navHead = De navigatie specifiek voor deze pagina.
    "navHead" => '
    <li class="selected"><strong>'.$userName.'</strong><span></span></li>
    <li class=""><a href="community">Community</a><span></span></li>
    <li class=""><a href="staff">Medewerkers</a><span></span></li>
    <li class=""><a href="javascript:(void)">Shop</a><span></span></li>
    <li class=""><a href="javascript:(void)">Overig</a><span></span></li>
    ',
    // navSub = De sub navigatie specifiek voor deze pagina.
    "navSub" => '
    <li class="selected">Homepage</li>
    <li><a href="profile">Profiel</a></li>
    <li><a href="settings">Instelingen</a></li>
    <li class="last"><a href="logout">Uitloggen</a></li>
    '
);

// Heeft de medewerker een standaard pincode?
if(Core::getData('pincode', 'cms_staffinfo', 'userid', $userID) == 9999) {
    $template->assign('feedNotifyPincode', incWeb::feedNotify('Oeps, verander je pincode even!', 'Het lijkt erop dat je een standaard pincode gebruikt voor je speciale inlog pagina als medewerker van '.$siteShort.'.<br /><a href="cms/system_staffinfo" target="_blank">Verander deze voor de veiligheidsredenen!</a>'));
}

// Defineer de pagina assigns.
$template->assign($varMe);

// Maak de pagina.
$template->draw($siteTemplate.'_header');
$template->draw($siteTemplate.'Me');
$template->draw($siteTemplate.'_footer');

// page end..