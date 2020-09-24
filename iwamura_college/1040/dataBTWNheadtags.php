<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $admin_path; ?>/inc/paginate.css">
<script type="text/javascript" src="<?php echo $admin_path; ?>inc/selectall.js"></script>
<script type="text/javascript" src="<?php echo $admin_path; ?>/inc/textBoxNum.js"></script>

<script type="text/javascript">
var dynamicInputCounter = 1;
var dynamicInputLimit = 10;
function addInput(divName){
	if (dynamicInputCounter == dynamicInputLimit)  {
		alert("You have reached the limit of adding " + dynamicInputCounter + " inputs");
	} else {
		var newdiv = document.createElement('div');
		newdiv.setAttribute('id','dynamicInput' + (dynamicInputCounter + 1));
		newdiv.setAttribute('style','margin-top: 5px;');
		newdiv.innerHTML = "<input type='file' name='dataImage[]' size='20'> <input type='button' value='Remove' onClick='removeElement(\"dynamicInput\", \"dynamicInput" + (dynamicInputCounter+1) + "\");'>";
		document.getElementById(divName).appendChild(newdiv);
		dynamicInputCounter++;
	}
}
function removeElement(parentDiv, childDiv){
     if (childDiv == parentDiv) {
          alert("The parent div cannot be removed.");
     }
     else if (document.getElementById(childDiv)) {     
          var child = document.getElementById(childDiv);
          var parent = document.getElementById(parentDiv);
          parent.removeChild(child);
		  dynamicInputCounter--;
     }
     else {
          alert("Child div has already been removed or does not exist.");
          return false;
     }
}
</script>

		<link rel="stylesheet" type="text/css" href="<?php echo $common_path; ?>/assets/tabcontent/tabcontent.css" />

		<script type="text/javascript" src="<?php echo $common_path; ?>/assets/tabcontent/tabcontent.js">

		/***********************************************
		* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/

		</script>