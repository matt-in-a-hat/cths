<div class="row mt-5">
    <h1>
        <% if $ArchiveYear %>
            <%t SilverStripe\\Blog\\Model\\Blog.Archive 'Archive' %>:
            <% if $ArchiveDay %>
                $ArchiveDate.format('d MMM, Y')
            <% else_if $ArchiveMonth %>
                $ArchiveDate.format('MMM, Y')
            <% else %>
                $ArchiveDate.format('Y')
            <% end_if %>
        <% else_if $CurrentTag %>
            <%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
        <% else_if $CurrentCategory %>
            <%t SilverStripe\\Blog\\Model\\Blog.Category 'Category' %>: $CurrentCategory.Title
        <% else %>
            $Title
        <% end_if %>
    </h1>
    <div class="content">$Content</div>
</div>

<% if $PaginatedList.First %>
    <% with $PaginatedList.First %>
        <div class="row">
            <div class="cths-featured-blog cths-featured-article my-5 p-5">
                <div class="row mb-3">
                    <div class="col">
                        <h2>
                            <a href="$Link" title="Read more">
                                <% if $MenuTitle %>$MenuTitle
                                <% else %>$Title<% end_if %>
                            </a>
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="<% if $FeaturedImage %>col-lg-7<% else %>col<% end_if %>">
                        <% if $Summary %>
                            $Summary
                        <% else %>
                            <p>$Excerpt(100)</p>
                        <% end_if %>
                    </div>
                    <% if $FeaturedImage %>
                        <div class="col-lg-5 text-center cths-featured-image">
                            $FeaturedImage.ScaleWidth(300)
                        </div>
                    <% end_if %>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="cths-button" href="$Link" title="Read the full article">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    <% end_with %>
<% end_if %>

<div class="row mt-3">
    <div class="<% if $SideBarView %>col-lg-8<% else %>col<% end_if %>">
        <% if $PaginatedList.Exists %>
            <div class="row">
                <% loop $PaginatedList %>
                    <% if not $First %>
                        <% include SilverStripe\\Blog\\PostSummary %>
                    <% end_if %>
                <% end_loop %>
            </div>
        <% else %>
            <p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
        <% end_if %>
    </div>

    <% if $SideBarView %>
        <div class="sidebar col-lg-4 mt-5">
            $SideBarView
        </div>
    <% end_if %>
</div>

<div class="row">
    <div class="col-md-8">

        $Form
        $CommentsForm

        <% with $PaginatedList %>
            <% include SilverStripe\\Blog\\Pagination %>
        <% end_with %>
    </div>
</div>
