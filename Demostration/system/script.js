$(document).ready(function () {
  $("#refNo").hide();
  $("#trackStay").click(function(){
    $("#refNo").fadeToggle();
  });

  $('.images-fac').click(function() {
    document.getElementById('curImage').src = $(this).attr('src');
    $('#myModal').modal('show');
  });
  
});
function abSpeak(txt) {
  var msg = new SpeechSynthesisUtterance();
  msg.rate = 0.8; // 0.1 to 10
  msg.text = txt;
  msg.voice = window.speechSynthesis.getVoices().filter(function(voice) { return voice.name == 'Google español de Estados Unidos'; })[0];
  msg.onend = function(e) {
    console.log('Finished in ' + event.elapsedTime + ' seconds.');
  };
  speechSynthesis.speak(msg);
}
