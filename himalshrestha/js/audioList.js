function _(id){
	return document.getElementById(id);
}
function audioApp(){
	var audio = new Audio();
	var audio_folder = "audio/";
	var audio_ext = ".mp3";
	var audio_index = 1;
	var is_playing = false;
	var playingtrack;
	var trackbox = _("trackbox");
	var tracks = {
   	"track1":["audio/glad.mp3"],
		"track2":["audio/kaha.mp3"]
	};
	$('.dummyclick').click(switchTrack);
	audio.addEventListener("ended",function(){
	    _(playingtrack).style.background = "url(icons/play-solid.svg)";
		playingtrack = "";
		is_playing = false;
	});
	function switchTrack(event){
		var audoname = tracks[event.target.id][0];
		if(is_playing){
	    if(playingtrack != event.target.id){
		    is_playing = true;
				_(playingtrack).style.background = "url(icons/play-solid.svg)";
		    event.target.style.background = "url(icons/pause-solid.svg)";
		    audio.src = audoname;
        audio.play();
			} else {
		    audio.pause();
		    is_playing = false;
				event.target.style.background = "url(icons/play-solid.svg)";
			}
		}else {
			is_playing = true;
			event.target.style.background = "url(icons/pause-solid.svg)";
			if(playingtrack != event.target.id){
				audio.src = audoname;
			}
      audio.play();
		}
		playingtrack = event.target.id;
	}
}
window.addEventListener("load", audioApp);