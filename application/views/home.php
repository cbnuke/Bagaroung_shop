<!-- Carousel
 ================================================== -->
<div id="banner_slide" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#banner_slide" data-slide-to="0" class="active"></li>
        <li data-target="#banner_slide" data-slide-to="1"></li>
        <li data-target="#banner_slide" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <?php echo img('slides/pic1.jpg'); ?>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Example headline.</h1>
                    <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <?php echo img('slides/pic1.jpg'); ?>
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <?php echo img('slides/pic1.jpg'); ?>
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#banner_slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#banner_slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->
<hr>

<script>
    $(document).ready(function() {
        $('#promotions_slide').carousel({
            interval: 10000
        })
    });
</script>
<div id="des_promotions">
    <div class="container">
        <h3><?= lang('head_promotions') ?></h3>
        <div class="col-md-12 well">
            <div id="promotions_slide" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#promotions_slide" data-slide-to="0" class="active"></li>
                    <li data-target="#promotions_slide" data-slide-to="1"></li>
                    <li data-target="#promotions_slide" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                            <div class="col-sm-3 col-xs-6"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;" class="img-responsive"></a>

                            </div>
                        </div>
                        <!--/row-->
                    </div>
                    <!--/item-->
                </div>
                <!--/carousel-inner--> 
                <a class="left carousel-control" href="#promotions_slide" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#promotions_slide" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>

<hr>

<div id="des_products">
    <div class="container">
        <h3><?= lang('head_products') ?></h3>
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified">
                <?php
                $flag_first = TRUE;
                foreach ($all_pro as $row) {
                    $type_name = unserialize($row['product_type']);
                    if ($flag_first) {
                        echo '<li class="active"><a href="#type' . $row['id'] . '" data-toggle="tab">' . $type_name[$language] . '</a></li>';
                        $flag_first = FALSE;
                    } else {
                        echo '<li><a href="#type' . $row['id'] . '" data-toggle="tab">' . $type_name[$language] . '</a></li>';
                    }
                }
                ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                //Tab
                $flag_first = TRUE;
                foreach ($all_pro as $row) {
                    if ($flag_first) {
                        echo '<div class="tab-pane active" id="type' . $row['id'] . '">';
                        $flag_first = FALSE;
                    } else {
                        echo '<div class="tab-pane" id="type' . $row['id'] . '">';
                    }
                    echo '<div class="row">';
                    foreach ($row['list'] as $product) {
                        $product_name = unserialize($product['product_name']);
                        echo '<div class="col-md-6">';
                        echo '<div class="thumbnail">';
                        echo '<img src="' . img_url() . $product['img_front'] . '" alt="...">';
                        echo '<div class="caption">';
                        echo '<h3>' . $product_name[$language] . '</h3>';
                        echo '<div class="row">';
                        echo '<div class="col-md-6"><a href="' . base_url('detailproduct/id/' . $product['id']) . '" class="btn btn-primary" role="button">' . lang('detail_product') . '</a></div>';
                        echo '<div class="col-md-6"><h4 class="text-center"><small>' . lang('product_price') . '</small> ' . number_format($product['product_price'], 2) . ' <small>' . lang('baht') . '</small></h4></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<hr>

<div id="des_contactus" class="container">
    <h3><?= lang('head_contactus') ?></h3>
    <div class="col-md-12 well well-lg" style="height: 1000px;">
        เบอร์
    </div>
</div>

