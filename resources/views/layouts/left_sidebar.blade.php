<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian">
        @foreach ($categories as $category)
            @if (isset($categories->activeId))
                @if ($categories->activeId == $category->id)
                    <div class="panel panel-default" >
                        <div class="panel-heading" style="background-color: #428bca;">
                            <h4 class="panel-title"><a href="{{ route('category', $category->id)}}" style="color: #FFFFFF;"><span class="pull-right">({{ $category->total_book }})</span>{{$category->name}}</a></h4>
                        </div>
                    </div>
                @else
                    <div class="panel panel-default" >
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{ route('category', $category->id)}}"><span class="pull-right">({{ $category->total_book }})</span>{{$category->name}}</a></h4>
                        </div>
                    </div>
                @endif
            @else
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{ route('category', $category->id)}}"><span class="pull-right">({{ $category->total_book }})</span>{{$category->name}}</a></h4>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <div class="publishers"><!--publishers-->
        <h2>Publishers</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($publishers as $publisher)
                    @if (isset($publishers->activeId))
                        @if ($publishers->activeId == $publisher->id)
                            <li class="active"><a href="{{ route('publisher', $publisher->id)}}"> <span class="pull-right">({{ $publisher->total_book }})</span>{{$publisher->name}}</a></li>
                        @else
                            <li><a href="{{ route('publisher', $publisher->id)}}"> <span class="pull-right">({{ $publisher->total_book }})</span>{{$publisher->name}}</a></li>
                        @endif
                    @else
                        <li><a href="{{ route('publisher', $publisher->id)}}"> <span class="pull-right">({{ $publisher->total_book }})</span>{{$publisher->name}}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div><!--/publishers-->
    
<!--     <div class="price-range">
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div> -->
</div>