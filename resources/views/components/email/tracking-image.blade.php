@if(isset($securityToken))
<img align="center" alt="Alternate text" border="0" class="center autowidth" src="{{route('imageGoogleFriendly',['filePath'=>$source,'security'=>$securityToken])}}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 125px; display: block;" title="Alternate text" width="125"/>
@else
<img align="center" alt="Alternate text" border="0" class="center autowidth" src="{{route('image',['filePath'=>$source])}}" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 125px; display: block;" title="Alternate text" width="125"/>
@endif