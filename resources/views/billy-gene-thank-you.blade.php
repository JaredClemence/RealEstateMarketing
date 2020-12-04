@push('style')
<style>
    .property-image-back {
        background-image: url({{asset($property->image1)}});
        background-size: cover;
        min-height: 600px;
        padding: 200px;
    }
    .property-image-back .row {
        background-color: rgba(255,255,255,0.8);
        border-radius: 25px;
        border-color: black;
        border-width: 5px;
        margin: 0px 10%;
        padding-top: 30px;
        padding-bottom: 30px;
    }
    .property-image-back .row {
        font-family:serif;
        font-weight: 400;
        font-size:20px;
    }
    .property-image-back .agent-info span, .property-image-back .agent-info h4 {
        margin:0px;
        padding:0px;
        display:block;
    }
    .property-image-back .empty-space {
        display:block;
        min-height: 100px;
    }
    @media screen and (min-width:750px){
        
    .property-image-back .row .col-md-5:first-of-type {
        border-right-width: 3px;
        border-right-style: solid;
        border-right-color: black;
    }
    }
    @media screen and (max-width:750px){
        .property-image-back {
            
            padding: 100px;
        }
    }
</style>
@endpush
<x-bootstrap-page :pageTitle="$title">
    <div class="container-fluid property-image-back">
        <div class="row">
            <div class="col-12 col-md-5 offset-md-2">
                <h1>Thank you</h1>
                {!!$property->teaser_text!!}
            </div>
            <div class='col-12 col-md-5'>
                <hr class='d-md-none '/>
                <div class="empty-space d-none d-md-block">&nbsp;</div>
                <h3>Do you have questions?</h3>
                <p>Do you have questions that need immediate answers. Call me.</p>
                <div class="agent-info">
                    <h4>Jared R Clemence</h4>
                    <span class='dre'>DRE# 02087736</span>
                    <span class='broker'>Watson Realty, DRE# 00782354</span>
                    <span class='phone'><a class='btn btn-secondary' href='tel:6103609558'>Call 610-360-9558</a></span>
                </div>
            </div>
        </div>
    </div>
</x-bootstrap-page>
