$('#nav').affix({
      offset: {
        top: ($('#jumbo_header').height())
      }
});	
$('#down').css("margin-top", $('jumbo_header').height());