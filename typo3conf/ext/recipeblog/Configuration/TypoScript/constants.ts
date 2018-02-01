
plugin.tx_recipeblog_list {
  view {
    # cat=plugin.tx_recipeblog_list/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:recipeblog/Resources/Private/Templates/
    # cat=plugin.tx_recipeblog_list/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:recipeblog/Resources/Private/Partials/
    # cat=plugin.tx_recipeblog_list/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:recipeblog/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_recipeblog_list//a; type=string; label=Default storage PID
    storagePid =
  }
}
