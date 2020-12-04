@push('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@800&display=swap');
    h1 {
        font-family: 'Work Sans';
        color:red;
    }
    h2 {
        font-family: 'Work Sans';
    }
</style>
@endpush
@php
$buttonText = "SEND ME THE eBROCHURE";
@endphp
<section class='billy-gene'>
    <div class='container'>
        <div class='row'>
            <div class='col-12 d-block d-md-none'>
                <h1>{{$property->teaser_prompt}}</h1>
                <img src='{{asset($property->image1)}}' class='img img-fluid' alt='Photograph of a house front.' />
                <div class='button-area'>
                    <x-modal-button id='non-foating-registration' type='primary'>
                        {{$buttonText}}
                    </x-modal-button>
                </div>
                <x-billy-gene.landing.anti-spam></x-billy-gene.landing.anti-spam>
            </div>
            <div class='col-12 d-md-block d-none'>
                <img src='{{asset($property->image1)}}' class='img img-fluid' alt='Photograph of a house front.' />
                <x-billy-gene.landing.floating-invite :buttonText="$buttonText" :prompt="$property->teaser_prompt" :property="$property"></x-billy-gene.landing.floating-invite>
            </div>
        </div>
    </div>
    <x-billy-gene.landing.modal id='non-foating-registration' :buttonText="$buttonText" :property="$property">
        <x-slot name='prompt'>To whom and where should we send the eBrochure?</x-slot>
    </x-billy-gene.landing.modal>
</section>
