<div class="row mt-5">
    <div class="col-md-8">
        <h1>$Title</h1>
        <div class="content mt-3">$Content</div>
    </div>
    <div class="col-md-4 mt-5">
        <% include SideBar %>
        <% if $Content %>
            <% include EmailListSidebar %>
        <% end_if %>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        $Form
        $CommentsForm
    </div>
</div>
