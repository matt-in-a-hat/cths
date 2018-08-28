<% require css('silverstripe/blog: client/dist/styles/main.css') %>

<div class="row mt-5">
    <div class="blog-entry <% if $SideBarView %>col-md-8<% else %>col<% end_if %>">
        <article>
            <h1>$Title</h1>

            <% if $FeaturedImage %>
                <p class="post-image">$FeaturedImage.ScaleWidth(795)</p>
            <% end_if %>

            <div class="content mt-3">$Content</div>

            <p class="blog-post-meta">
                <% if $Categories.exists %>
                    <%t SilverStripe\\Blog\\Model\\Blog.PostedIn "Posted in" %>
                    <% loop $Categories %>
                        <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %>;<% end_if %>
                    <% end_loop %>
                <% end_if %>

                <% if $Tags.exists %>
                    <%t SilverStripe\\Blog\\Model\\Blog.Tagged "Tagged" %>
                    <% loop $Tags %>
                        <a href="$Link" title="$Title">$Title</a><% if not Last %>, <% else %>;<% end_if %>
                    <% end_loop %>
                <% end_if %>

                <% if $Comments.exists %>
                    <a href="{$Link}#comments-holder">
                        <%t SilverStripe\\Blog\\Model\\Blog.Comments "Comments" %>
                        $Comments.count
                    </a>;
                <% end_if %>

                <%t SilverStripe\\Blog\\Model\\Blog.Posted "Posted" %>
                <a href="$MonthlyArchiveLink">$PublishDate.ago</a>
            </p>
        </article>

        $Form
        $CommentsForm
    </div>

    <% if $SideBarView %>
        <div class="sidebar col-md-4 mt-5">
            $SideBarView
        </div>
    <% end_if %>
</div>

