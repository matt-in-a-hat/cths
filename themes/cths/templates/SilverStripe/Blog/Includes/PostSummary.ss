<div class="col-lg-6 d-flex">
    <div class="cths-box cths-with-button $GetBoxColour($Pos)">
        <h4>
            <a href="$Link" title="Read more">
                <% if $MenuTitle %>$MenuTitle
                <% else %>$Title<% end_if %>
            </a>
        </h4>

        <% if $Summary %>
            $Summary
        <% else %>
            <p>$Excerpt</p>
        <% end_if %>

        <a class="cths-button" href="$Link" title="Read the full article">
            Read more...
        </a>
    </div>
</div>
