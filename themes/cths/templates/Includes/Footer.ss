<footer class="footer bg-light p-3" role="contentinfo">
    <div class="container d-flex">
        <span class="text-muted footer-text">
            © {$Now.Year}, Canterbury Tiny House Society
        </span>
        <% if $SiteConfig.SiteLogo %>
          <a href="/" class="ml-auto" title="Canterbury Tiny House Society">$SiteConfig.SiteLogo.ScaleMaxHeight(50)</a>
        <% end_if %>
    </div>
</footer>
