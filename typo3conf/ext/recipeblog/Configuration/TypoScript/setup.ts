
plugin.tx_recipeblog_list {
  view {
    templateRootPaths.0 = EXT:recipeblog/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_recipeblog_list.view.templateRootPath}
    partialRootPaths.0 = EXT:recipeblog/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_recipeblog_list.view.partialRootPath}
    layoutRootPaths.0 = EXT:recipeblog/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_recipeblog_list.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_recipeblog_list.persistence.storagePid}
    #recursive = 1
  }
  settings {
        detailPid = {$plugin.tx_recipeblog_list.settings.detailPid}
        searchPid = {$plugin.tx_recipeblog_list.settings.searchPid}
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_recipeblog_banner {
  view {
    templateRootPaths.0 = EXT:recipeblog/Resources/Private/Templates/
    templateRootPaths.1 = {$plugin.tx_recipeblog_banner.view.templateRootPath}
    partialRootPaths.0 = EXT:recipeblog/Resources/Private/Partials/
    partialRootPaths.1 = {$plugin.tx_recipeblog_banner.view.partialRootPath}
    layoutRootPaths.0 = EXT:recipeblog/Resources/Private/Layouts/
    layoutRootPaths.1 = {$plugin.tx_recipeblog_banner.view.layoutRootPath}
  }
  persistence {
    storagePid = {$plugin.tx_recipeblog_banner.persistence.storagePid}
    #recursive = 1
  }
  settings {
        detailPid = {$plugin.tx_recipeblog_banner.settings.detailPid}
  }
}

plugin.tx_recipeblog_category < plugin.tx_recipeblog_list
plugin.tx_recipeblog_popular < plugin.tx_recipeblog_list
plugin.tx_recipeblog_tags < plugin.tx_recipeblog_list
plugin.tx_recipeblog_search < plugin.tx_recipeblog_list