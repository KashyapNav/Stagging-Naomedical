<?php /* Template Name: conatct_locations */ 
global $wpdb;


$query = 'SELECT * FROM '.$wpdb->prefix.'posts
        LEFT JOIN '.$wpdb->prefix.'term_relationships ON ('.$wpdb->prefix.'posts.ID = '.$wpdb->prefix.'term_relationships.object_id)
        LEFT JOIN '.$wpdb->prefix.'term_taxonomy ON ('.$wpdb->prefix.'term_relationships.term_taxonomy_id = '.$wpdb->prefix.'term_taxonomy.term_taxonomy_id)
        WHERE '.$wpdb->prefix.'posts.post_status = "publish" AND '.$wpdb->prefix.'posts.post_type = "contact_information"
        GROUP BY '.$wpdb->prefix.'posts.ID;';



$results            = $wpdb->get_results($query);


?>

    <div id="primary1" class="content-area">
        <div class="contact-locations-overall" id="cont">
            <div class="container">
                <div class="col-md-12 col-12 col-sm-12 contact-slider-title">
                    <h2>Where to find us</h2>
                </div>

                <div class="col-md-12 col-12 col-sm-12 contact-slider">
                    <div class="carousel-contact-slider">
                    <?php 
                        if(isset($results) && !empty($results)){
                            foreach($results as $key => $postdata){
                                
                                $post_title 			= !empty(get_post_meta( $postdata->ID, 'post_title', true )) ? get_post_meta( $postdata->ID, 'post_title', true ) : '';
                                $contact_address 		= !empty(get_post_meta( $postdata->ID, 'contact_address', true )) ? get_post_meta( $postdata->ID, 'contact_address', true ) : '';
                                $contact_info 			= !empty(get_post_meta( $postdata->ID, 'contact_info', true )) ? get_post_meta( $postdata->ID, 'contact_info', true ) : '';
                                $contact_phone 			= !empty(get_post_meta( $postdata->ID, 'contact_phone', true )) ? get_post_meta( $postdata->ID, 'contact_phone', true ) : '';
                            ?>
                        <div class="contact-location-dv">
                            <h3><?php echo $post_title; ?></h3>
                            <p><?php echo $contact_address; ?></p>
                            <div>
                            <a href="tel:<?php echo $contact_phone; ?>">  <label><span class="call-line-ic"></span> <?php echo $contact_phone; ?> </label></a>
                            </div>
                            <div class="cldv-dt">
                            <?php echo $contact_info; ?>
                            </div>
                        </div>
                        <?php } ?>
                    <?php } ?>

                        <!-- <div class="contact-location-dv">
                            <h3>Astoria,Queens</h3>
                            <p>37-15, 23rd Avenue Astoria, NY 11105</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Jackson Heights, Queens</h3>
                            <p>80-10 Northern Blvd, Jackson Heights, NY 11372d</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Jamaica, Queens</h3>
                            <p>90-18 Sutphin Blvd Jamaica, NY 11435</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Crown Heights, Brooklyn</h3>
                            <p>341 Eastern Parkway Brooklyn, NY 11216</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Williamsburg, Brooklyn</h3>
                            <p>308 Graham Ave, Brooklyn, NY 11211</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Midtown, Manhattan</h3>
                            <p>715 9th Avenue Suite 1 New York, NY 10019</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Bronx, 174th</h3>
                            <p>932 East 174th Street Bronx, NY 10460</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div>

                        <div class="contact-location-dv">
                            <h3>Bronx, Bartow</h3>
                            <p>2063A Bartow Avenue Bronx, NY 10475</p>
                            <div>
                                <label><span class="call-line-ic"></span> (917) 905-6585 </label>
                            </div>
                            <div class="cldv-dt">
                                <ul>
                                    <li>Mon – Fri    8 am – 8 pm</li>
                                    <li>Sat – Sun     9 am – 5 pm</li>
                                    <li>Holidays      9 am – 3 pm</li>
                                </ul>
                            </div>
                        </div> -->

                    </div>
                </div>

                <div class="col-md-12 col-12 col-sm-12">
                    <div align="center">
                        <a href="javascript:void(0)"> <button class="btn btn-makemy-self appointment_modal">Make an Appointment</button> </a>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- content-area -->