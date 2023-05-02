<div id="sync1" class="owl-carousel owl-theme">

    @foreach($sliderShowDesktop as $slide)
    <div class="item">
        <a href="{{$slide->link_url}}"><img src="{{asset($slide->image_path)}}" alt=""></a>
    </div>
    @endforeach
</div>

<div id="sync1mobile" class="owl-carousel owl-theme">
    @foreach($sliderShowMobile as $slide)
        <div class="item">
            <a href="{{$slide->link_url}}"><img src="{{asset($slide->image_path)}}" alt=""></a>
        </div>
    @endforeach
</div>

