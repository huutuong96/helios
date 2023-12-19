<div class="container jtv-brand-logo-block">
      <div class="jtv-brand-logo">
          <div class="slider-items-products">
              <div id="jtv-brand-logo-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col6">
                    @foreach ($list_brand as $item)
                        <div class="item"><a href="#"><img src="{{asset("public/images/brand/". $item->img)}}" alt="Brand Logo"></a> </div>
                    @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>