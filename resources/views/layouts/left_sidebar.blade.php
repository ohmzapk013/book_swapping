<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        @foreach ($categories as $category)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">{{$category->name}}</a></h4>
                </div>
            </div>
        @endforeach
    </div>

    <div class="publishers"><!--publishers-->
        <h2>Publishers</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($publishers as $publisher)
                    <li><a href="#"> <span class="pull-right">(50)</span>{{$publisher->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/publishers-->
    
    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->
    
    <div class="shipping text-center"><!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
    </div><!--/shipping-->
</div>