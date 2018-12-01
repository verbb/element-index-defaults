// ==========================================================================
// Element Index Defaults Plugin for Craft CMS
// Author: Verbb - https://verbb.io/
// ==========================================================================
void 0===Craft.ElementIndexDefaults&&(Craft.ElementIndexDefaults={}),function(t){t(document).on("click","#sidebar .element-index-defaults a",function(e){
// e.preventDefault();
t("#sidebar .element-index-defaults a").removeClass("sel"),t(this).addClass("sel"),t(".source-settings").addClass("hidden"),t('.source-settings[data-element="'+t(this).attr("href").replace("#","")+'"]').removeClass("hidden")}),document.location.hash?t('#sidebar .element-index-defaults a[href="'+document.location.hash+'"]').addClass("sel").trigger("click"):t("#sidebar .element-index-defaults a:first").addClass("sel").trigger("click"),
// $('#sidebar .element-index-defaults a.sel').trigger('click');
Craft.ElementIndexDefaults=Garnish.Base.extend({init:function(e){var s,a=t(e).find(".customize-sources-table-column");new Garnish.DragSort(a,{handle:".move",axis:"y"})}})}(jQuery);
//# sourceMappingURL=element-index-defaults.js.map