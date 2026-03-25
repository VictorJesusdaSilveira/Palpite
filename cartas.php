<?php
require_once("model/Yugi.php");

//Cartas Yugi-OH
$cartas = array();

$obelisco = new Yugi("Obelisco, O Atormentador" , "https://http2.mlstatic.com/D_NQ_NP_886192-MLB41059514111_032020-O.webp" , "Deus egípcio usado por Kaiba no anime.");
array_push($cartas , $obelisco);
$slyfer = new Yugi("Slyfer, O Dragão do Céu" , "https://img.mypcards.com/img/3/579/yugioh_ldk2-ens01/yugioh_ldk2-ens01_en-1686920415.jpg" , "Deus egípcio usado por Yugi no anime.");
array_push($cartas , $slyfer);
$dragaoAlado = new Yugi("Dragão Alado de Rá" , "https://img.mypcards.com/img/3/1514/yugioh_sbcb_en203/yugioh_sbcb_en203_en.jpg" , "Deus egípcio usado por Marik.");
array_push($cartas , $dragaoAlado);
$magoNegro = new Yugi("Mago Negro" , "https://repositorio.sbrauble.com/arquivos/in/yugioh_bkp/cd/572/1771.jpg" , "Carta principal de Yugi.");
array_push($cartas , $magoNegro);
$dragaoBranco = new Yugi("Dragão Branco de Olhos Azuis" , "https://img.mypcards.com/img/3/316/yugioh_ct13-en008/yugioh_ct13-en008_pt.jpg" , "Principal carta usada por Kaiba");
array_push($cartas , $dragaoBranco);
