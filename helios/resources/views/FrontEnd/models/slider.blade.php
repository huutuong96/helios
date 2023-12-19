<div class="container jtv-home-revslider">
    <div class="row">
        <div class="col-lg-9 col-sm-9 col-xs-12 jtv-main-home-slider">
            <div id='rev_slider_1_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                <div id='rev_slider_1' class='rev_slider fullwidthabanner'>
                    <ul>
                        @foreach ($banner_list["left_banner"] as $item)
                            <li data-transition='slotzoom-horizontal' data-slotamount='7' data-masterspeed='1000' data-thumb='{{asset("public/images/banner/".$item->img)}}'><img src='{{asset("public/images/banner/".$item->img)}}' alt="slider image1" data-bgposition='center center' data-bgfit='cover' data-bgrepeat='no-repeat' />
                                 <div class="info">
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='0' data-y='165' data-endspeed='500' data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2;white-space:nowrap;'><span>Shop The Trend</span></div>
                                    <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0' data-y='220' data-endspeed='500' data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;white-space:nowrap;'>Amazing Chance!</div>
                                    <div class='tp-caption Title sft  tp-resizeme ' data-x='0' data-y='300' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'>Our new arrivals can't wait to meet you.</div>
                                    <div class='tp-caption sfb  tp-resizeme ' data-x='0' data-y='350' data-endspeed='500' data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;white-space:nowrap;'><a href='#' class="buy-btn">Browse Now</a></div>
                                </div> 
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            @foreach ($banner_list["right_banner"] as $item)
                <div class="banner-block"> <a href="#"> <img src='{{asset("public/images/banner/".$item->img)}}' alt="" style="height:250px;width:100%"> </a>
                    <div class="text-des-container">
                        <div class="text-des"  style="position: absolute; bottom: 121%;background-color: rgba(255, 255, 255, 0.6); width: 100%;">
                            <p>Bộ sưu tập</p>
                            <h2>Nhẫn độc đáo</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>