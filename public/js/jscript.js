$('#nav').affix({
      offset: {
        top: ($('#jumbo_header').height())
      }
});	
$('#down').css("margin-top", $('jumbo_header').height());


function change()
{
	var elements=document.getElementsByClassName('hid');
	for(var i=0;i<elements.length;i++)
	{
		elements[i].style.visibility='visible';
	}
}