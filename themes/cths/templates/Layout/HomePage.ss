<div class="container">
    <h1 class="invisible">Home</h1>
    <% if GetRequestParam('subscribed') %>
        <h2 class="mb-5">Thanks for subscribing... we hope to see you at the next event!</h2>
    <% end_if %>
    <div class="row">
        <% loop $GetActionBoxes.limit(3, 0) %>
            <div class="col-md-6 col-lg-4 d-flex">
                <div class="cths-box <% if $LinkUrl %>cths-with-button<% end_if %> $GetBoxColour($Pos)">
                    <h4>$Title</h4>
                    <div>
                        $Content
                        <% if $LinkUrl %>
                            <a class="cths-button" href="$LinkUrl">$LinkText</a>
                        <% end_if %>
                    </div>
                </div>
            </div>
        <% end_loop %>
    </div>
    <% if $FeaturedPage %>
        <div class="row cths-featured-article my-5 p-5">
            <div class="col">
                <div class="row mb-3">
                    <div class="col">
                        <h3>$FeaturedPage.Title</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="<% if $FeaturedPage.FeaturedImage || $FeaturedPage.HeaderImage %>col-lg-7<% else %>col-12<% end_if %>">
                        <% if $FeaturedPage.Summary %> <%-- BlogPost --%>
                            $FeaturedPage.Summary
                        <% else_if $FeaturedPage.SummaryBlock %> <%-- Page --%>
                            $FeaturedPage.SummaryBlock
                        <% else_if $GetWordCount($FeaturedPage.Content) < 100 %> <%-- Small amount of content --%>
                            $FeaturedPage.Content
                        <% else %> <%-- Otherwise just the start bit as plain text --%>
                            <p>$FeaturedPage.Content.Summary(100)</p>
                        <% end_if %>
                    </div>
                    <% if $FeaturedPage.FeaturedImage %>
                        <div class="col-lg-5 text-center cths-featured-image">
                            $FeaturedPage.FeaturedImage.FitMax(300, 300)
                        </div>
                    <% else_if $FeaturedPage.HeaderImage %>
                        <div class="col-lg-5 text-center cths-featured-image">
                            $FeaturedPage.HeaderImage.FitMax(300, 300)
                        </div>
                    <% end_if %>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="cths-button" href="$FeaturedPage.Link" title="See this article in full">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    <% end_if %>
    <% if $GetActionBoxes.Count() > 3 %>
        <div class="row mb-5">
            <% loop $GetActionBoxes.limit(99, 3) %>
                <div class="col-md-6 col-lg-4 d-flex">
                    <div class="cths-box <% if $LinkUrl %>cths-with-button<% end_if %> $GetBoxColour($Pos)">
                        <h4>$Title</h4>
                        <div>
                            $Content
                            <% if $LinkUrl %>
                                <a class="cths-button" href="$LinkUrl">$LinkText</a>
                            <% end_if %>
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
    <div class="row cths-highlight-row my-5 p-5" id="mc_embed_signup">
        <form action="https://cths.us19.list-manage.com/subscribe/post?u=3840abcef10697e0a2630eb8f&amp;id=e5dead8af0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate col" target="_blank" novalidate>

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
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3840abcef10697e0a2630eb8f_e5dead8af0" tabindex="-1" value=""></div>
                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button cths-button ml-auto" title="Subscribe to our email list">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <h5>Alternatively, to get access to all of our events <a href="https://docs.google.com/forms/d/e/1FAIpQLSfakPkV9AqGejRwSFtStiNCHcLK9uBchl-g6g-40JlBPC2mSg/viewform?c=0&w=1" title="Register as a society member" target="_blank">sign up to our society here</a>!</h5>
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
