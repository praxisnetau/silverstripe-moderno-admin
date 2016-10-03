(function($) {
    
    // Define Variables:
    
    var selector   = "#cms-content-tools-CMSMain";
    var cookieName = "cms-content-tools-width";
    
    // Make Menu Resizable:
    
    $(selector).entwine({
        
        onadd: function() {
            
            var self = this;
            
            self.resizable({
                
                handles: 'e',
                
                resize: function() { $.cookie(cookieName, self.outerWidth()); }
                
            });
            
        }
        
    });
    
    // Resize Menu after Ajax Load:
    
    $(document).ajaxComplete(function() {
        
        if (!$(selector).hasClass('collapsed')) {
            
            var width = $.cookie(cookieName);
            
            if (width !== null) $(selector).css('width', width + 'px');
            
        }
        
    });
    
    // Create Animated Icons for Buttons:
    
    $(".cms .ss-ui-button > .ui-button-text").entwine({
        
        onmatch: function() {
            
            this.prepend('<i class="fa fa-refresh fa-spin" style="display: none"></i> ');
            
        }
        
    });
    
})(jQuery);
