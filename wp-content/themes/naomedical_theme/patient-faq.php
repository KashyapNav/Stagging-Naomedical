<?php
/**
 *Template Name: Patient FAQ
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage naomedical_theme
 * @since naomedical_theme
 */

get_header();
?>
<main id="primary" class="site-main" role="main"> 

    <div class="top_service_top_section">
        <?php 
            while ( have_posts() ) : the_post();
                the_content();
            endwhile; // End of the loop.
        ?>
    </div>

    <div id="primary1" class="content-area">
        <div class="patient-faq-div" id="pfaq">
            <div class="container">
                <div class="faq-max-div">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-12">
                                <div class="faq-sidebar">
                                    <h3>Index</h3>
                                    <ul>
                                        <li><a href="#bookanapp" class="active">Booking an Appointment</a></li>
                                        <li><a href="#insurancefee">Insurance & Fees</a></li>
                                        <li><a href="#locationservices">Locations & Services</a></li>
                                        <li><a href="#aboutour">About Our Providers</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-12 col-12">
                                <div class="faq-accordian-div">

                                    <div class="col-md-12 col-sm-12 col-12 faq-content">
                                        <div id="bookanapp">
                                            <h4>Booking an Appointment</h4>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        When is Nao Medical open for business?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <p>Nao Medical is open 8:00 am - 9:00 pm (but times may vary based on <a href="https://www.naomedical.com/locations/" style="color:#fcb900;">the clinic's location</a>). All our locations are open 7 days a week, 365 days a year, including evenings, weekends, and holidays.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Is Nao Medical accepting new patients?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Yes. We're always accepting new patients. We do not keep a waiting list to ensure accessible healthcare to those in need. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    Is Nao Medical a walk-in clinic?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Yes. Nao Medical is an urgent care and walk-in clinic. We provide our services for anyone who needs immediate medical attention and treatment for non-emergency injuries. This includes non-fatal illnesses, or any medical condition that is not life-threatening. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                        Do I need to call and make an appointment before?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>No . At Nao Medical, If you want a shorter wait time, you can easily book an appointment through phone, concierge service or online. We're open seven days a week, even during holidays, to ensure you get the care you need.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingFive">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                        What should I do before booking an appointment
                                                    </button>
                                                    </h2>
                                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Before booking your appointment, if you are not paying out of pocket, please ensure that your insurance benefits include urgent care. You can contact us to confirm if your individual/group insurance plan is eligible for use based on your service, treatment or medical request. Please dial 911 immediately if your medical problem appears to be life-threatening.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingSix">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                                        Do you offer televisit or virtual care?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Yes. We provide virtual care, also known as telemedicine or televisit. Enjoy the same high-quality care you’d received in person at our clinics as you would with our virtual urgent care service. To learn more about our <a href="https://www.naomedical.com/services/virtual-care/"  style="color:#fcb900;">virtual care service click here</a>. We also provide an After Hours service to provide you help outside of our clinic hours. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingSeven">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                                        What if I want to cancel or reschedule  my appointment?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Reschedule or cancel your appointment by calling our call center. Please be mindful to give us 24 hours’ notice so that we can provide that appointed time for another person in need.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12 faq-content">

                                        <div id="insurancefee">
                                            <h4>Insurance & Fees</h4>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingEight">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                                        What type of payments do you accept?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>We accept cash, debit and credit card payments, which include American Express, Discover, MasterCard, and Visa. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingNine">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                                        Will my insurance cover the visit to your urgent care center?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Nao Medical is a certified urgent care clinic that accepts most major insurance plans, and even if you have no insurance we accept out of pocket payments. <a href="https://www.naomedical.com/insurance-fees/"  style="color:#fcb900;">Click here </a> to see our list of accepted insurance brands. We do not need a referral from your regular doctor (PCP) since we are in-network as an urgent care center with these plans. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                        What if I don't have insurance? Can someone still see me?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>We offer our patients without insurance a self-pay or out-of-pocket payment option. We pride ourselves on providing transparent and affordable prices/billing so you'll never be surprised. To view our wide range of <a href="https://www.naomedical.com/services/"  style="color:#fcb900;">services and prices, click here.</a> </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingEleven">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                                        How much do you charge? Do I have to pay a copay?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Based on your service we'll bill your insurance company. Most insurance plans have a copay for urgent care. It can be listed on your insurance card. We can also verify your co-pay when you come in to see us in the clinic. However, if you have a deductible, you will be responsible for copay and deductible.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwevel">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwevel" aria-expanded="false" aria-controls="collapseTwevel">
                                                        What types of insurance do you accept? 
                                                    </button>
                                                    </h2>
                                                    <div id="collapseTwevel" class="accordion-collapse collapse" aria-labelledby="headingTwevel" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>We accept over 100+ major insurance providers from our patients, including: HIP, GHI, Emblem, Cigna, Aetna, Oxford, United, Blue Cross Blue Shield, and many more. To verify if we accept your insurance provider, <a href="https://www.naomedical.com/insurance-fees/"  style="color:#fcb900;">click here.</a>  </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingThirteen">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                                        How will I know how much I owe? 
                                                        </button>
                                                    </h2>
                                                    <div id="collapseThirteen" class="accordion-collapse collapse" aria-labelledby="headingThirteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Nao Medical will email and text you your statement as soon as your insurance carrier has processed your claim. You can also always check your billing in the Nao Medical app or online patient portal.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingFourteen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                                        Can I pay my bill through HSA or FSA?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseFourteen" class="accordion-collapse collapse" aria-labelledby="headingFourteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Yes. We accept payment from a HSA (Health Saving account) or FSA (Flexible Spending Account). As a reminder, make sure you have your current card information and be aware that your Flex spending fund expires at the end of each calendar year.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12 faq-content">
                                        <div  id="locationservices">
                                            <h4>Locations & Services</h4>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingFifteen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                                    What services does Nao Medical provide?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseFifteen" class="accordion-collapse collapse" aria-labelledby="headingFifteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Nao Medical provides over 200+ services, ranging from urgent care, primary care, pediatric care, women's health and more. To view all the services we offer,<a href="https://www.naomedical.com/services/"  style="color:#fcb900;"> click here. </a> </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingSixteen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                                        Do you have another location close to where I live?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseSixteen" class="accordion-collapse collapse" aria-labelledby="headingSixteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Nao Medical has multiple clinics across the New York metropolitan area, so you can choose the one closest to you. We're located in:  </p>
                                                        <ul>
                                                            <li>Downtown Manhattan  </li>
                                                            <li>Brooklyn Church Ave, Brooklyn</li>
                                                            <li>Astoria, Queens</li>
                                                            <li>Long Island City, Queens </li>
                                                            <li>Crown Heights, Brooklyn</li>
                                                            <li>Hicksville, NY</li>
                                                            <li>Jackson Heights, Queens</li>
                                                            <li>Bronx Bartow Mall </li>
                                                            <li>Williamsburg </li>
                                                            <li>Corona, Queens</li>
                                                            <li>Jamaica, Queens</li>
                                                            <li>Bronx 174th Street</li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingSeventeen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                                                    Can I visit multiple Nao Medical clinics or change clinic locations?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseSeventeen" class="accordion-collapse collapse" aria-labelledby="headingSeventeen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Yes. You're free to visit more than one or change Nao Medical locations. Your information is securely stored in our Nao Medical database through the patient portal and can be accessed by any medical provider assisting you. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingEighteen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEighteen" aria-expanded="false" aria-controls="collapseEighteen">
                                                    How is Nao Medical different from other urgent care providers?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseEighteen" class="accordion-collapse collapse" aria-labelledby="headingEighteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>At Nao Medical, we're committed to being more than just a healthcare provider. We continuously strive to deliver our patients the highest quality of care, whether in our offices throughout the New York metro area, or in the comfort of their own homes.</p>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingNineteen">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNineteen" aria-expanded="false" aria-controls="collapseNineteen">
                                                        Is Nao Medical an emergency room?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseNineteen" class="accordion-collapse collapse" aria-labelledby="headingNineteen" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Nao Medical is not an emergency room. We do not take care of heart attacks, strokes, or bleeding ulcers. When we do get such patients, we stabilize them and refer them to our local emergency room via 911. Nao Medical's urgent care is best for treating mild to moderate medical needs to help prevent hospitals from getting overwhelmed. </p>
                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-12 faq-content">
                                        <div id="aboutour">
                                            <h4>About Our Providers </h4>
                                            <div class="accordion" id="accordionExample">

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingTwenty">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwenty" aria-expanded="false" aria-controls="collapseTwenty">
                                                        My Primary Healthcare Provider (PCP) is not available. Can you give me a referral?
                                                    </button>
                                                    </h2>
                                                    <div id="collapseTwenty" class="accordion-collapse collapse" aria-labelledby="headingTwenty" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Under the HMO wave of the 1990s, you had to pick a PCP and you're locked in by your insurance company to go through the gatekeeper physician at all times. That is no longer the case. HMOs and insurance plans encourage open access.</p>
                                                        <p>However, you may still have an insurance company that requires you to have a PCP to provide referrals, authorizations, and approvals for medicines. Depending on your insurance plan, we may be able to give you referrals similar to your PCP. </p>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- content-area -->
</main>

<?php
get_footer();
?>

