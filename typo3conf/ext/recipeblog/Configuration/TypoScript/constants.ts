
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
    storagePid = 6
  }
  settings {
        detailPid = 4
        searchPid = 32
        homePid = 3
  }
}



plugin.tx_recipeblog_banner < plugin.tx_recipeblog_list