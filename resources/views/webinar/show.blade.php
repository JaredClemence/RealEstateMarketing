<x-bootstrap-page pageTitle='Weekly Webinar, Bakersfield Home Buyers'>
    <div class='container'>
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{$property->address}}</h1>
                <h3>Virtual Tour Walkthrough</h3>
                <div style="min-height: 2rem;">&nbsp;</div>
                <x-embed.youtube video_id="Jx71-WNVPqM"></x-embed.youtube>
                <div style="min-height: 2rem;">&nbsp;</div>
                
            </div>
            <div class="col-12 col-md-6 offset-md-3">
                <h2>Have questions?</h2>
                <p>I am ready to answer your questions. If I forget to mention something during today's presentation,
                    send me a message and I will reply as soon as possible.</p>
                <p>Tweet me: @jaredclemence<br/>
                Text me: <a href="tel:6617727781">661-772-7781</a>
            </div>
            <div class="col-12 col-md-6 offset-md-3">
                <h2>Download the eBrochure</h2>
                <p>Want the eBrochure? Download the eBrochure at this page.</p>
                <a class="btn btn-primary" href="{{route('offer.landing',compact('property'))}}">Get the eBrochure</a>
            </div>
        </div>
    </div>
</x-bootstrap-page>
<!--
<iframe width="560" height="315" src="https://www.youtube.com/embed/Jx71-WNVPqM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
-->