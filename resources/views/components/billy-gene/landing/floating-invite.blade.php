<section class='floating-invite'>
<div class='outer-box'>
    <div class='invite-prompt'>
        <h1>{{$prompt}}</h1>
    </div>
    <div class='button-area'>
        <x-modal-button id='floating-invite-registration' type='primary'>
            {{$buttonText}}
        </x-modal-button>
    </div>
    <x-billy-gene.landing.anti-spam></x-billy-gene.landing.anti-spam>
</div>
</section>
<x-billy-gene.landing.modal id='floating-invite-registration' :buttonText="$buttonText" :property="$property">
    <x-slot name='prompt'>To whom and where should we send the eBrochure?</x-slot>
</x-billy-gene.landing.modal>