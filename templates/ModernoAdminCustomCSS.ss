<% if $ModernoHighlightColor %>
  .cms-menu-list li.current a,
  .jstree-apple .jstree-hovered,
  .jstree-apple a.jstree-hovered,
  .tree-holder.jstree-apple li.jstree-checked > a:hover,
  .cms-tree.jstree-apple li.jstree-checked > a:hover,
  .cms-content-tools table tr.active,
  .cms #vakata-contextmenu li a:hover,
  .TreeDropdownField .treedropdownfield-panel #vakata-contextmenu li a:hover,
  .field .chzn-container .chzn-results .highlighted {
    background-color: #{$ModernoHighlightColor};
  }
  
  .ui-tabs.cms-tabset-primary .ui-tabs-nav .ui-state-active a,
  .ui-tabs .ui-tabs-nav.cms-tabset-nav-primary .ui-state-active a,
  .ui-tabs .cms-content-header-tabs .ui-tabs-nav .ui-state-active a {
    border-bottom-color: #{$ModernoHighlightColor};
  }
  
  #PageType ul li:hover,
  li.select2-results__option--highlighted {
    background-color: #{$ModernoHighlightColor} !important;
  }
<% end_if %>

<% if $ModernoLogoBkgColor %>
  .cms-logo-header {
    background-color: #{$ModernoLogoBkgColor};
  }
<% end_if %>

<% if $ModernoLinkColor %>
  .cms a,
  .cms .ss-ui-action-tabset.action-menus.ss-tabset ul.ui-tabs-nav li a,
  .cms .ss-ui-action-tabset.action-menus.ss-tabset ul.ui-tabs-nav li a:hover,
  .cms table.ss-gridfield-table tbody td.col-getTreeTitle span.item {
    color: #{$ModernoLinkColor};
  }
<% end_if %>

<% if $ModernoProfileLinkColor %>
  .cms-logo-header span a {
    color: #{$ModernoProfileLinkColor};
  }
<% end_if %>