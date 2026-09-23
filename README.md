# MRN Hierarchical Menu Taxonomies

The canonical source lives in the independent `mrnwebdesigns/mrn-hierarchical-menu-taxonomies` repository; MRN uses a local checkout symlink for stack integration.

WordPress's classic Menu Builder limits hierarchical taxonomy panels to 50
globally alphabetized terms per page. On large WooCommerce catalogs, this can
separate a product category from its parent and make the child appear to be a
top-level category.

This admin-only plugin expands the core **View All** query for WooCommerce
`product_cat` terms. WordPress's existing menu checklist walker then renders
the complete saved parent/child hierarchy.

The plugin does not:

- change WooCommerce category relationships;
- add, remove, reorder, or synchronize saved menu items;
- affect frontend menu rendering; or
- load assets outside `Appearance > Menus`.

Additional hierarchical taxonomies can opt in with the
`mrn_hierarchical_menu_taxonomies` filter.

The stable WordPress plugin entrypoint is
`mrn-hierarchical-menu-taxonomies.php`. Runtime implementation remains in the
class file so package upgrades preserve the activation key used by existing
sites.
