function validateInput(t,v){
    var w = "";
	var dotCnt = 0;
    for (i=0; i < t.value.length; i++) {
        x = t.value.charAt(i);
		
		if (x==".") dotCnt = dotCnt +1;

        if (v.indexOf(x,0) != -1 && dotCnt<2)
        w += x;
    }
    t.value = w;
}