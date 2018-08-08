<nav class="navbar navbar-expand-md navbar-light bg-light">
  <div class="container">
    <% if $SiteConfig.SiteLogo %>
      <a class="navbar-brand" href="#">$SiteConfig.SiteLogo.ScaleMaxHeight(70)</a>
    <% end_if %>
    <a class="navbar-brand navbar-text cths-header-title" href="#">$SiteConfig.Title</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-menu" aria-controls="nav-menu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav-menu" role="navigation">
      <ul class="navbar-nav ml-auto">
        <% loop $Menu(1) %>
          <li class="nav-item active $LinkingMode">
            <a class="nav-link" href="$Link" title="$Title.XML">$MenuTitle.XML<%-- <span class="sr-only">(current)</span> --%></a>
          </li>
        <% end_loop %>
        <%-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> --%>
      </ul>
    </div>
  </div>
</nav>
