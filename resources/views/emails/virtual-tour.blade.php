<x-html-email :mail-id='$mail_id' medallion-type='0' testing='{{$testing}}'>
    <x-email.paragraph-text>Dear {{$lead->name}}:</x-email.paragraph-text><x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>The 3D Virtual Tour is the safest way to see properties. Plus! When you use the virtual tour, you can see the property without waiting for an agent, which may make the difference between you getting the property and someone else getting the property.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Did you know that if a seller accepts your offer after seeing a 3D tour that you have 17 days to see the property in person and cancel that offer with no penalty! That's right, <strong>3D Tours are a safe and risk free way to buy your dream home</strong>.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Tour {{$property->address}} in {{$property->city}}, {{$property->state}} {{$property->zip}}, by clicking the link below.</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text><a href='{{$virtualTourUri}}' class='btn btn-primary'>Click to Take Virtual Tour</a></x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Sincerely,</x-email.paragraph-text>
    <x-email.paragraph-text>&nbsp;</x-email.paragraph-text>
    <x-email.paragraph-text>Jared Clemence, DRE#02087736</x-email.paragraph-text>
    <x-email.paragraph-text>Agent of Watson Realty, DRE#00782354</x-email.paragraph-text>
    <x-email.paragraph-text>P.S. You can reach me on my cell phone by texting 610-360-9558. Yes, I am local to Bakersfield.</x-email.paragraph-text>
</x-html-email>