@extends('layouts.app')

@section('content')
<style>
    .star-rating{
        font-size: 0;
    }
    .star-rating__wrap{
        display: inline-block;
        font-size: 1rem;
    }
    .star-rating__wrap:after{
        content: "";
        display: table;
        clear: both;
    }
    .star-rating__ico{
        float: right;
        padding-left: 2px;
        cursor: pointer;
        color: #669D31;
    }
    .star-rating__ico:last-child{
        padding-left: 0;
    }
    .star-rating__input{
        display: none;
    }
    .star-rating__ico:hover:before,
    .star-rating__ico:hover ~ .star-rating__ico:before,
    .star-rating__input:checked ~ .star-rating__ico:before
    {
        content: "\f005";
    }
</style>
<section>

    <div class="container">
        <div class="row ">
            <div class="col-md-12 col-lg-12">
                <div class="p-t-80 p-b-124 p-r-50 h-full p-r-0-md bo-none-md">
                    <!-- Block4 -->
                    <div class="blo4 p-b-63">
                        <!-- - -->
                        <div class="pic-blo4 hov-img-zoom bo-rad-10 pos-relative">
                                <img src="{{asset('images')}}/{{$products->image}}" alt="IMG-BLOG">

                            <div class="date-blo4 flex-col-c-m">
									<span class="txt13 m-b-4">
										{{$products->created_at->format('D')}}
									</span>
                                <span class="txt13 m-b-4">
										{{$products->created_at->format('m-Y')}}
									</span>
                            </div>
                        </div>

                        <!-- - -->
                        <div class="text-blo4 p-t-33">
                            <h4 class="p-b-16 tit9">
                                {{$products->title}}
                            </h4>

                            <div class="txt32 flex-w p-b-24">
									<span>
										by Admin
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                <span>
										{{$products->created_at->format('D-m-Y')}}
										<span class="m-r-6 m-l-4">|</span>
									</span>

                                <span>
										Food
										<span class="m-r-6 m-l-4">|</span>
									</span>
                            </div>

                            <p>
                                {!!html_entity_decode($products->description)!!}
                            </p>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    <form class="leave-comment p-t-10" action="{{route('rate')}}" method="post">
                        @csrf
                        <h4 class="txt33 p-b-14">
                            Leave a Comment
                        </h4>

                        <p>
                            Your email address will not be published. Required fields are marked *
                        </p>
                        <div class="star-rating" style="margin-top: 20px; margin-bottom: -20px">
                            <div class="star-rating__wrap">
                                <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
                                <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
                                <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
                                <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                                <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
                            </div>
                        </div>
                        <textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-40" name="comment" placeholder="Comment..."></textarea>

                        <input hidden name="prod_id" value="{{$products->id}}">

                        <!-- Button3 -->
                        <button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection
