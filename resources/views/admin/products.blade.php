@foreach($products as $pro)
        <div class="item-row" id="item-{{$pro->id}}">
            <div class="item-col fixed item-col-img">
                <a href="#">
                    <div class="item-img rounded" style="background-image: url('{{asset('images')}}/{{$pro->image}}')"></div>
                </a>
            </div>
            <div class="item-col item-col-title no-wrap">
                <div>
                    <a href="#" class="">
                        <h4 class="item-title no-wrap"> {{$pro->title}} </h4>
                    </a>
                </div>
            </div>
            <div class="item-col item-col-sales">
                <div class="item-heading">Sales</div>
                <div>4958</div>
            </div>
            <div class="item-col item-col-stats">
                <label>
                    <input class="radio special" id="{{$pro->id}}" type="radio" name="special" value="1" @if(($pro->special == 1)) checked @endif>
                    <span></span>
                </label>
            </div>
            <div class="item-col item-col-category no-overflow">
                <div class="no-overflow">
                    {{$pro->categories->title}}
                </div>
            </div>
            <div class="item-col item-col-stats">
                <div> {{$pro->created_at}} </div>
            </div>
            <div class="item-col fixed item-col-actions-dropdown">
                <div class="item-actions-dropdown">
                    <a class="item-actions-toggle-btn">
                                                <span class="inactive">
                                                    <i class="fa fa-cog"></i>
                                                </span>
                        <span class="active">
                                                    <i class="fa fa-chevron-circle-right"></i>
                                                </span>
                    </a>
                    <div class="item-actions-block">
                        <ul class="item-actions-list">
                            <li>
                                <a class="remove" id="{{$pro->id}}" href="#" data-toggle="modal" data-target="#confirm-modal">
                                    <i class="fa fa-trash-o "></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endforeach
{!! $products->links() !!}
