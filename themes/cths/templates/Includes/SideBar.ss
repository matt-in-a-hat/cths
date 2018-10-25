<aside class="sidebar">
    <% if $Menu(2) %>
        <nav>
            <% with $Level(1) %>
                <h4>
                    <a href="$Link" class="$LinkingMode" title="Go to the $Title.XML page">
                        $MenuTitle
                    </a>
                </h4>
                <ul>
                    <% include SideBarMenu %>
                </ul>
            <% end_with %>
        </nav>
    <% end_if %>
</aside>
