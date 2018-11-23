
                                            @foreach($data as $pro)
                                                <div class="col-md-8 col-lg-6 m-l-r-auto">
                                                <!-- Block3 -->
                                                <div class="blo3 flex-w flex-col-l-sm m-b-30">
                                                    <div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
                                                        <a class="" href="images/{{$pro->image}}" data-lightbox="gallery-footer"><img src="images/{{$pro->image}}" alt="IMG-MENU"></a>
                                                    </div>
                                                    <div class="text-blo3 size21 flex-col-l-m">
                                                        <a href="/products/{{$pro->title}}" class="txt21 m-b-3">
                                                            {{$pro->title}}
                                                        </a>
                                                        <span class="txt23">
								{!!html_entity_decode($pro->description)!!}
							</span>

                                                        <span class="txt22 m-t-20">
								Rp {{$pro->price}}
							</span>

                                                        <a id="{{$pro->id}}" href="#" onclick="event.preventDefault();" class="m-t-10 btn3 flex-c-m size13 txt11 trans-0-4 addtocart" style="float: right"><i class="fa fa-plus"></i> Add</a>
                                                    </div>
                                                </div>
                                            </div>
                                @endforeach

                                            {!! $data->links() !!}

