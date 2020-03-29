@extends('layouts.single-product')

@section('styles')

<!-- Scripts -->
    <style>
    .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }

    .stars
    {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
    }
    </style>


@endsection

@section('content')

    <div class="row">
        @if(Session::has('review_message'))
            <p class="bg-success">{{session('review_message')}}</p>
        @endif

        <div class="col-md-6">
            <!-- Preview Image -->
            <img class="img-responsive" style="margin-left: auto; margin-right: auto;" src="{{$product->photo ? $product->photo->file : 'http://placehold.it/700x200'}}" alt="">
            <div>
                @if($pics)
                    @foreach($pics as $pic)
                        <div class="col-md-4">
                            <img class="img-responsive" style="" src="{{$pic->file}}" alt="">
                        </div>
                    @endforeach
                @endif
            </div>

            
            <div>
                @if($videos) 
                    @foreach($videos as $video)
                        <iframe width="40%" height="40%" src="{{ $video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <!-- Title -->
            <h2>{{$product->title}}</h2>
            @if($product->getStarRating())
                @for ($i=1; $i <= 5 ; $i++)
                    <span class="glyphicon glyphicon-star{{ ($i <= $product->getStarRating()) ? '' : '-empty'}}"></span>
                @endfor
            @endif
            <!-- Product Price -->
            <h1>Rs. {{ $product->price }}</h1>

            <!-- Product Details -->
            <p class="lead">{!! $product->details !!}</p>

            <h3>Best For(Gender) </h3>
            <ul> 
                @foreach($genders as $gender)
                    <div class="col-md-6">
                        <li> {{ $gender}} </li>
                    </div>
                @endforeach
            </ul>

            <br>
            
            
            <h3>Best For(Age Range) </h3>
            <ul> 
                @foreach($age_ranges as $age_range)
                    <div class="col-md-6">
                        <li> {{ $age_range}} </li>
                    </div>
                @endforeach
            </ul>

            <br>
            
            <h3>Want to Overcome </h3>
            <ul> 
                @foreach($selected_product_goals as $selected_product_goal)
                    <div class="col-md-6">
                        <li> {{ $selected_product_goal}} </li>
                    </div>
                @endforeach
            </ul>


            <br>
            <br>

            <!-- Order Now Section -->
            @include('includes.front.order_now')



        </div>
    </div>
        <div class="row">
            <h1>Description</h1>
            <!-- Product Details -->
            <p class="lead">{!! $product->description !!}</p>
        </div>



    <!--  Review Section -->
    @include('includes.front.review_section')

    <!-- Related Products -->
    @include('includes.front.related_products')

    

    

@endsection

@section('scripts')
    <script>
        var __slice=[].slice;(function(e,t){var n;n=function(){function t(t,n){var r,i,s,o=this;this.options=e.extend({},this.defaults,n);this.$el=t;s=this.defaults;for(r in s){i=s[r];if(this.$el.data(r)!=null){this.options[r]=this.$el.data(r)}}this.createStars();this.syncRating();this.$el.on("mouseover.starrr","span",function(e){return o.syncRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("mouseout.starrr",function(){return o.syncRating()});this.$el.on("click.starrr","span",function(e){return o.setRating(o.$el.find("span").index(e.currentTarget)+1)});this.$el.on("starrr:change",this.options.change)}t.prototype.defaults={rating:void 0,numStars:5,change:function(e,t){}};t.prototype.createStars=function(){var e,t,n;n=[];for(e=1,t=this.options.numStars;1<=t?e<=t:e>=t;1<=t?e++:e--){n.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"))}return n};t.prototype.setRating=function(e){if(this.options.rating===e){e=void 0}this.options.rating=e;this.syncRating();return this.$el.trigger("starrr:change",e)};t.prototype.syncRating=function(e){var t,n,r,i;e||(e=this.options.rating);if(e){for(t=n=0,i=e-1;0<=i?n<=i:n>=i;t=0<=i?++n:--n){this.$el.find("span").eq(t).removeClass("glyphicon-star-empty").addClass("glyphicon-star")}}if(e&&e<5){for(t=r=e;e<=4?r<=4:r>=4;t=e<=4?++r:--r){this.$el.find("span").eq(t).removeClass("glyphicon-star").addClass("glyphicon-star-empty")}}if(!e){return this.$el.find("span").removeClass("glyphicon-star").addClass("glyphicon-star-empty")}};return t}();return e.fn.extend({starrr:function(){var t,r;r=arguments[0],t=2<=arguments.length?__slice.call(arguments,1):[];return this.each(function(){var i;i=e(this).data("star-rating");if(!i){e(this).data("star-rating",i=new n(e(this),r))}if(typeof r==="string"){return i[r].apply(i,t)}})}})})(window.jQuery,window);$(function(){return $(".starrr").starrr()})

        $(function(){
            var ratingsField = $('#ratings-hidden');
            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });
    </script>
@endsection






    




    
