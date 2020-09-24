//check one, check all 
function selectAll(elementID) {
	var box = document.getElementsByName(elementID);
	if(box) 
	{
		var boxes = box.length;
			for(var i = 0; i < boxes; i++)
			{	
				if(box[i].checked)
				{
					box[i].checked = false;
				}
				else
				{
					box[i].checked = true;
				}					
			}
	}
}