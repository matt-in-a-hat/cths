<div class="row mt-5 $ClassName">
    <div class="col-md-8">
        <h1>$Title</h1>

        <% if $HeaderImage %>
            <p class="post-image">$HeaderImage.ScaleWidth(795)</p>
        <% end_if %>

        <div class="content mt-3">$Content</div>
    </div>
    <div class="col-md-4 mt-md-5">
        <% include SideBar %>
        <% if $Content && $ID > 0 %>
            <% include EmailListSidebar %>
        <% end_if %>
    </div>
    <% if $ShowChildPageSummary && $Children %>
        <div class="col-md-12">
            <h3>In this section</h3>
            <div class="row my-5">
                <% loop $Children %>
                    <% if $ShowInParentSummary %>
                        <div class="col-md-6 col-lg-4 d-flex">
                            <% include SilverStripe\\Blog\\PostSummaryInner %>
                        </div>
                    <% end_if %>
                <% end_loop %>
            </div>
        </div>
    <% end_if %>
</div>
<% if $Form || $CommentsForm %>
    <div class="row cths-highlight-row p-5 my-5">
        <div class="col-md-8">
            $Form
            $CommentsForm
        </div>
    </div>
<% end_if %>
