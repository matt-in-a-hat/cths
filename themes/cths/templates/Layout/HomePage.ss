<div class="container">
    <h1 class="invisible">Home</h1>
    <% if GetRequestParam('subscribed') %>
        <h2 class="mb-5">Thanks for subscribing... we hope to see you at the next event!</h2>
    <% end_if %>
    <div class="row">
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-light-blue">
                <h4>What is a Tiny House?</h4>
                <div>
                    Tiny Houses typically have all of the main amenities you use in a normal house, but in a space-efficient and cosy manner.
                    Often they're movable e.g. built on a trailer.
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-green">
                <h4>What are the benefits?</h4>
                <div>
                    Tiny Houses are an affordable and flexible option, especially for first home buyers.
                    They support a minimalist culture and reduce demand on the environment.
                    They also get around many of the costly consent processes.
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-orange">
                <h4>What does the Society do?</h4>
                <div>
                    We host social events and learning workshops to engage the community and share knowledge.
                    We also actively share and maintain info via <a href="/knowledgebase" title="tiny house helpful information">this website</a> and the <a href="https://www.facebook.com/groups/christchurchtinyhousecommunity/" title="Christchurch tiny house facebook">Facebook group</a>.
                </div>
            </div>
        </div>
    </div>
    <div class="row cths-featured-article my-5 p-5">
        <div class="col">
            <div class="row mb-3">
                <div class="col">
                    <h3>A tiny house village in Christchurch’s red zone</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <p>We’re working with Regen Chch and CCC to propose a small village of tiny houses.</p>
                    <p>This would allow us to showcase a sustainable urban community while utilising land not fit for traditional builds. Our proposal aims to</p>
                    <ul>
                        <li>Nurture the land and provide security to the neighbouring communities</li>
                        <li>Provide a social hub for events and community driven initiatives</li>
                        <li>Engage with council to provide a better understanding of Tiny Houses</li>
                        <li>Create a framework to help with future Tiny House villages</li>
                    </ul>
                </div>
                <div class="col-lg-5 text-center">
                    <img alt="Sketch of village of tiny houses" src="/images/JaredLane_reduced-300x212.jpg" class="cths-featured-image">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="cths-button" href="#" title="Learn more about the village proposal">Read more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-with-button cths-light-blue">
                <h4>Want to build your own?</h4>
                <div>
                    Our knowledgebase is filled with everything you need to know to get started.
                    <a class="cths-button" href="/knowledgebase" title="View the knowledgebase">Read more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-with-button cths-green">
                <h4>Workshop - 13th Sept</h4>
                <div>
                    We're hosting a workshop on how tiny houses fit into the Legislation, with CCC providing staff to help.
                    <a class="cths-button" href="https://www.facebook.com/events/2135302476710335/" title="View the event on Facebook">Event details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 d-flex">
            <div class="cths-box cths-with-button cths-orange">
                <h4>Have unanswered questions or want to contribute?</h4>
                <div>
                    <a class="cths-button" href="/contact" title="Contact us">Contact us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row cths-highlight-row my-5 p-5" id="mc_embed_signup">
        <form action="https://cths.us19.list-manage.com/subscribe/post?u=3840abcef10697e0a2630eb8f&amp;id=3df62861ee" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate col" target="_blank" novalidate>
        <%-- <div id="mc_embed_signup_scroll"> --%>
            <div class="row">
                <div class="col">
                    <h5>Stay informed about events, meetings and workshops by signing up to our mailing list</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 main-field mt-3 mc-field-group">
                    <label for="mce-FNAME">First Name </label>
                    <input type="text" value="" name="FNAME" id="mce-FNAME">
                </div>
                <div class="col-md-6 main-field mt-3 mc-field-group">
                    <label for="mce-LNAME">Last Name </label>
                    <input type="text" value="" name="LNAME" id="mce-LNAME">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 main-field mt-3 mc-field-group">
                    <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span></label>
                    <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required="required">
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row h-100">
                        <div id="mce-responses" class="col-md-6 mt-auto">
                            <div class="response" id="mce-error-response" style="display:none"></div>
                            <div class="response" id="mce-success-response" style="display:none"></div>
                        </div>
                        <div class="col-md-6 d-flex mt-auto">
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3840abcef10697e0a2630eb8f_3df62861ee" tabindex="-1" value=""></div>
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button cths-button ml-auto" title="Subscribe to our email list">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-md-8">
            $Form
            $CommentsForm
        </div>
    </div>
</div>
