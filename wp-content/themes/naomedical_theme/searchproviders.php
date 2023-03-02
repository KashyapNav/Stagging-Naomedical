<?php /* Template Name: searchproviders */ ?>

    <div id="primary0" class="content-area insurance-fees-overall">

        <div class="ins-banner-div">
            <div class="container">
                <div class="col-md-12 col-12 col-sm-12">
                    <h1>We accept most insurances</h1>
                </div>
                <div class="col-md-12 col-12 col-sm-12 ins-gallery-list">
                    <ul>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-1.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-2.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-3.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-4.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-5.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-6.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-7.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-8.webp" class="img-fluid"></li>
                        <li><img src="<?php bloginfo('template_directory'); ?>/assets/images/insurance-provider/image-9.webp" class="img-fluid"></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="max-search-section">
                <div class="col-md-12 col-12 col-sm-12 search-provider-div search-provider-new">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-12">
                                <label>Search here </label>
                            </div>

                            <div class="col-md-9 col-sm-12 col-12">
                                <div class="inputContainer ui-widget">    
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for your insurance provider" aria-label="Search Providers" aria-describedby="basic-addon2" id="searchproviders" autocomplete="off">
                                        <button class="btn btn-outline-secondary" type="button" id="search-provider">Search</button>
                                    </div>
                                    <div class="dropdown" id="log"></div>
                                    <input type="hidden" value="" id="term_id_select" />
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="popular-insurance-list">
                <div class="col-md-12 col-12 col-sm-12 search-provider-div">
                    <div>
                        <h2>Popular Insurances</h2>
                    </div>

                    <div class="loader-backdrop" style="display:none;">
                            <div class="loader"></div>
                    </div>
                    
                    <div class="pil-div" id="search_provider_list">

                    </div>
                </div>

            </div>
        </div>

        <div class="search-result-section" style="display:none;">
            <div class="container">
                <div class="col-md-12 col-12 col-sm-12">
                    <div class="max-search-width">

                    </div>
                </div>
            </div>
        </div>

        <div class="no-insprb-section">
            <div class="container">
                <div class="col-md-12 col-12 col-sm-12 noinsprb-max">
                    <h2>No insurance? No problem.</h2>
                    <p>We've got you covered. Walk in and get treated.</p>
                </div>

                <div class="">
                    <div class="col-md-12 col-12 col-sm-12 noinsprb-max">
                        <a href="#visitfee-price">
                            <div style="padding-bottom: 70px;">
                                <h6>Checkout our pricing</h6>
                                <span class="grn-arw"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
               
    </div><!-- content-area -->


    
