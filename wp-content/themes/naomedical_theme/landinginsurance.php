<?php /* Template Name: landingtimer */ ?>
<div class="col-md-12 col-sm-12 col-12 col-xl-12">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="col-md-12 col-sm-12 col-12 ssb-insurance-right-bg">
            <div>
                <h5>Search for Nao Medical accepted insurances</h5>
            </div>

            <div class="ssi-search-drp">
                <!-- <input class="form-control" type="search" placeholder="Search" value="" name="" id="searchproviders" autocomplete="off"> -->
                <div class="inputContainer ui-widget">    
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search providers" aria-label="Search Providers" aria-describedby="basic-addon2" id="searchproviders" autocomplete="off">
                        <button class="btn btn-outline-secondary" type="button" id="search-provider">Search</button>
                    </div>
                    <div class="dropdown" id="log"></div>
                    <input type="hidden" value="" id="term_id_select" />
                </div>
            </div>

        

            <div class="ssb-insurance-list">
                <div class="loader-backdrop" style="display:none;">
                    <div class="loader"></div>
                </div>
                <div class="pil-div" id="search_provider_list1">
                
                </div>
            </div>

        </div>
    </div>
</div>