@php
$images = [
   'BestBuyMedallion.png',
   'BestPriceShield.png',
   'SpecialOfferMedallion.png',
   'SpecialOfferWreath.png',
   'ThankYouRibbon.png',
];
$name = $images[$type];
$path = "images/$name";
$src = route('image',['filePath'=>$path]);
@endphp
<img align="center" alt="Alternate text" border="0" class="center autowidth" src="{{$src}}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 125px; display: block;" title="Alternate text" width="125"/>