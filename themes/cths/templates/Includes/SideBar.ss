<aside class="sidebar">
    <% if $Menu(2) %>
        <nav>
            <% with $Level(1) %>
                <h3>
                    $MenuTitle
                </h3>
                <ul>
                    <% include SideBarMenu %>
                </ul>
            <% end_with %>
        </nav>
    <% end_if %>
</aside>
