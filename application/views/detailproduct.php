<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row hidden-sm hidden-xs">
                <div class="col-md-12" style="height: 300px; background-color: #999;"><h3>How to order.</h3></div>
                <div class="col-md-12">
                    <div class="row">
                        <h3>Recommend</h3>
                        <div class="col-md-12">
                            <a href="#" class="thumbnail">
                                <img src="http://placehold.it/600x400" alt="..." >
                                <div class="caption">
                                    <h4>Bag</h4>
                                    <p>Price xxx THB</p>
                                </div>
                            </a>
                            <a href="#" class="thumbnail">
                                <img src="http://placehold.it/600x400" alt="..." >
                                <div class="caption">
                                    <h4>Bag</h4>
                                    <p>Price xxx THB</p>
                                </div>
                            </a>
                            <a href="#" class="thumbnail">
                                <img src="http://placehold.it/600x400" alt="..." >
                                <div class="caption">
                                    <h4>Bag</h4>
                                    <p>Price xxx THB</p>
                                </div>
                            </a>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="row col-md-12 col-sm-12 col-xs-12 thumbnail center-block">
                        <img id="img_01" src="http://placehold.it/600x400" data-zoom-image="http://placehold.it/600x400"/> 
                    </div>
                    <div class="row" id="gallery_01">
                        <div class="col-md-3 col-xs-3">
                            <a href="#" data-image="http://placehold.it/600x400/999" data-zoom-image="http://placehold.it/600x400/999"> 
                                <img id="img_01" src="http://placehold.it/300x200/999" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a href="#" data-image="http://placehold.it/600x400/888" data-zoom-image="http://placehold.it/600x400/888"> 
                                <img id="img_01" src="http://placehold.it/300x200/888" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a href="#" data-image="http://placehold.it/600x400/777" data-zoom-image="http://placehold.it/600x400/777"> 
                                <img id="img_01" src="http://placehold.it/300x200/777" class="img-responsive"/>
                            </a>
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <a href="#" data-image="http://placehold.it/600x400/666" data-zoom-image="http://placehold.it/600x400/666"> 
                                <img id="img_01" src="http://placehold.it/300x200/666" class="img-responsive"/>
                            </a>
                        </div>
                    </div>
                    <script>
                        //initiate the plugin and pass the id of the div containing gallery images 
                        $("#img_01").elevateZoom({
                            constrainType:"height", 
                            constrainSize:274, 
                            zoomType: "lens", 
                            lensShape: 'round',
                            containLensZoom: true, 
                            gallery:'gallery_01', 
                            galleryActiveClass: "active",
                            loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'});
                        ////pass the images to Fancybox 
                       
                    </script>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center"><strong>Price</strong>  99999 THB</h3>
                    <p class="text-center visible-xs"><a href="#howto" class="btn btn-primary" >How to order</a></p>
                    <dl>
                        <dt>Detail</dt>
                        <dd>xxxxxxxxxxxxxx</dd>
                        <dt>Size</dt>
                        <dd>Weight : xxx kg.</dd>
                        <dd>Width : xxx cm.</dd>
                        <dd>High : xxx cm.</dd>
                    </dl>
                </div>                
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
                <div class="col-md-6"><div class="thumbnail"><img src="http://placehold.it/600x400" alt="..." ></div></div>
            </div>
        </div>
    </div>
    <div class="row visible-sm visible-xs" id="howto">
        <div class="col-sm-12 col-xs-12" style="height: 300px; background-color: #999;"><h3>How to order.</h3></div>
    </div>
</div>