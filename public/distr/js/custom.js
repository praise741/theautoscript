/*===========================================================================
| Template Name: AWS Amazon Transcribe - Speech to Text Converter
| Theme URL: https://codecanyon.net/user/berkinedesign
| Author: BerkineDesign
| Author URL: https://codecanyon.net/user/berkinedesign
| Version: 1.0
| File name: custom.js
| Date Created: 25.02.2020
| Website: www.berkinedesign.com/transcribe
============================================================================= */


/* -------------------------------------------------------------- */
/*                      TABLE OF CONTENTS
/* -------------------------------------------------------------- */
/*   01 - LANGUAGE SELECTION DROPDOWNS                            */
/*   02 - LIVE TRANSCRIBE                                         */
/*   03 - CLEAR TEXTAREA BUTTON                                   */
/*   04 - TEXTAREA CHARACTER COUNTER                              */
/*   05 - ACTION BUTTONS                                          */
/*   06 - MATERIAL EFFECT FOR ACTION BUTTONS                      */
/*   07 - UPLOAD AUDIO FILE                                       */
/*   08 - CUSTOM INPUT FIELD FOR AUDIO FILE UPLOAD BUTTON         */
/*   09 - AJAX REQUEST FOR EXISTING AUDIO FILE UPLOAD OPTION      */
/*   10 - UPLOAD RECORDED AUDIO FILE                              */
/*   11 - RECORD AUDIO FUNCTION                                   */
/*   12 - AJAX REQUEST FOR RECORDED AUDIO FILE UPLOAD OPTION      */
/*   13 - VERIFY EMAIL ADDRESSES                                  */


/*===========================================================================
*
*  01 - LANGUAGE SELECTION DROPDOWNS
*
*============================================================================*/

$(document).ready(function(){

    "use strict";

     $('#language-selector').awselect({
        background: "#3D9AFF", 
        active_background:"#FFF", 
        placeholder_color: "#FFF", // the light blue placeholder color
        placeholder_active_color: "#0e2e40", // the dark blue placeholder color
        option_color:"#0e2e40", // the option colors
        vertical_padding: "10px", //top and bottom padding
        horizontal_padding: "25px", // left and right padding,
        immersive: false,
    });


     $('#recorded-language-selector').awselect({
        background: "#3D9AFF", 
        active_background:"#FFF", 
        placeholder_color: "#FFF", // the light blue placeholder color
        placeholder_active_color: "#0e2e40", // the dark blue placeholder color
        option_color:"#0e2e40", // the option colors
        vertical_padding: "10px", //top and bottom padding
        horizontal_padding: "25px", // left and right padding,
        immersive: false,
    });


     $('#live-language-selector').awselect({
        background: "#3D9AFF", 
        active_background:"#FFF", 
        placeholder_color: "#FFF", // the light blue placeholder color
        placeholder_active_color: "#0e2e40", // the dark blue placeholder color
        option_color:"#0e2e40", // the option colors
        vertical_padding: "10px", //top and bottom padding
        horizontal_padding: "25px", // left and right padding,
        immersive: false,
    });
});



/*===========================================================================
*
*  02 - LIVE TRANSCRIBE
*
*============================================================================*/
var time_limit; 
var clock;

$(document).ready(function(){

  "use strict";

  /* -------------------------------------------- */
  /*    TOGGLE MIC IMAGE
  /* -------------------------------------------- */
  $("#mic-image").on("click", function(){

      var image = ($(this).attr('src') === '../distr/img/mic.png')
              ? '../distr/img/mic-red.png'
              : '../distr/img/mic.png';
             
           $(this).attr('src', image);
  });


  /* -------------------------------------------- */
  /*    COUNTDOWN FOR LIVE RECORD
  /* -------------------------------------------- */

  time_limit = 5;  // 5 Minutes
  
  clock = $(".timer").FlipClock(0, {
    countdown: true,
    clockFace: 'MinuteCounter',
    autoStart: false,
    callbacks: {
              stop: function() {
                terminateRecording(); 
                $("#live-synthesize").removeClass('stop').addClass('play');
                $("#mic-image").attr('src', '../distr/img/mic.png');         
                clock.setTime(time_limit*60);
              }
            }
  });  

  clock.setTime(time_limit*60);


  /* -------------------------------------------- */
  /*    TOGGLE RECORD/STOP BUTTON
  /* -------------------------------------------- */
  $("#live-synthesize").on("click", function(){

      "use strict";

      if ($(this).hasClass('play')) {

          $('textarea').val('');

          initiateRecording();

          clock.start();          

          $(this).removeClass('play').addClass('stop');
          
      
      } else if ($(this).hasClass('stop')) {

          terminateRecording();

          clock.stop();

          clock.setTime(time_limit*60);

          $(this).removeClass('stop').addClass('play');

      } 

  });

});


/* -------------------------------------------- */
/*    CALL WEBSOCKET.JS FUNCTIONS
/* -------------------------------------------- */

function initiateRecording() {
    
    "use strict";

    var language = $('#live-language-selector').find(':selected').val();
    
    setLanguage(language);    /* WEBSOCKET FUNCTIONS TO SET THE LANGUAGE */

    setRegion('eu-west-1');   /* WEBSOCKET FUNCTIONS TO SET THE REGION */

    startLiveRecording();     /* WEBSOCKET FUNCTIONS TO START RECORDING */

}

function terminateRecording() {

    "use strict";

    stopLiveRecording();    /* WEBSOCKET FUNCTIONS TO STOP RECORDING */

}

function stopClock() {      
    
    "use strict";

    clock.stop();

    clock.setTime(time_limit*60);
}



/*===========================================================================
*
*  03 - CLEAR TEXTAREA BUTTON
*
*============================================================================*/

$(document).ready(function(){

    "use strict";

    $('#clear-text').on("click", function(e){

        e.preventDefault();

        $('textarea').val('');

    });

});



/*===========================================================================
*
*  04 - TEXTAREA CHARACTER COUNTER
*
*============================================================================*/

$(document).ready(function(){

    "use strict";

    $("#textarea").jQTArea({
        setLimit: 5000,
        setExt: "W",
        setExtR: true
    });

});



/*===========================================================================
*
*  05 - ACTION BUTTONS - FOR LIVE TRANSCRIBE
*
*============================================================================*/

/* -------------------------------------------------------------------- */
/*   LIVE CONVERT ACTION BUTTONS ARE DISABLED WHILE TEXTAREA IS EMPTY
/* -------------------------------------------------------------------- */

$(document).ready(function() {


    "use strict";


    /* -------------------------------------------------------------------- */
    /*   DOWNLOAD BUTTON
    /* -------------------------------------------------------------------- */

    $("#download-button").on("click", function(e){

        e.preventDefault();

        if (!$.trim($("#textarea").val())) {

            $("#download-button").tooltip('show');

        } else {

            $("#download-button").tooltip('dispose');

            $("<a />", {   
                
                  download: $.now() + ".txt",
                  // set `href` to `objectURL` of `Blob` of `textarea` value
                  href: URL.createObjectURL(
                    new Blob([$("#textarea").val()], {
                      type: "text/plain"
                  }))
              
              }).appendTo("body")[0].click();

              // remove appended `a` element after "Save File" dialog,
              // `window` regains `focus` 
              $(window).on("focus", function() {
                $("a").last().remove()
              });

        }
        
    });


    /* -------------------------------------------------------------------- */
    /*   PRINT BUTTON
    /* -------------------------------------------------------------------- */

    $("#print-button").on("click", function(e){

        e.preventDefault();

        if (!$.trim($("#textarea").val())) {

            $("#print-button").tooltip('show');

        } else {

            $("#print-button").tooltip('dispose');
              
            var childWindow = '';
            
            childWindow = window.open('','childWindow','location=yes, menubar=yes, toolbar=yes');
            childWindow.document.open();
            childWindow.document.write('<html><head></head><body>');
            childWindow.document.write($('textarea').val());
            childWindow.document.write('</body></html>');
            childWindow.print();
            childWindow.document.close();
            childWindow.close();

        }
        
    });


    /* -------------------------------------------------------------------- */
    /*   EMAIL BUTTON
    /* -------------------------------------------------------------------- */

    $("#email-button").on("click", function(e){

        e.preventDefault();

        if (!$.trim($("#textarea").val())) {

            $("#email-button").tooltip('show');

        } else {

            $("#email-button").tooltip('dispose');

              var subject = "Amazon Transcribe - Speech to Text Converter";
              var body = "Thank you for using our Amazon Transcribe Service.%0d%0a%0d%0aYour Transcribed Text: \"" + $('textarea').val() + "\"%0d%0a%0d%0aBerkine Design Team";
              window.location.href = "mailto:?subject=" + subject + "&body=" + body;

        }
        
    });

});



/*===========================================================================
*
*  06 - MATERIAL EFFECT FOR ACTION BUTTONS
*
*============================================================================*/

$(function(){

    "use strict";

    var ua =navigator.userAgent;
    if(ua.indexOf('iPhone') > -1 || ua.indexOf('iPad') > -1 || ua.indexOf('iPod')  > -1){
      var start = "touchstart";
      var move  = "touchmove";
      var end   = "touchend";
    } else{
      var start = "mousedown";
      var move  = "mousemove";
      var end   = "mouseup";
    }
    var ink, d, x, y;
    $(".ripple").on(start, function(e){
      if($(this).find(".ink").length === 0){
          $(this).prepend("<span class='ink'></span>");
      }
           
      ink = $(this).find(".ink");
      ink.removeClass("animate");
       
      if(!ink.height() && !ink.width()){
          d = Math.max($(this).outerWidth(), $(this).outerHeight());
          ink.css({height: d, width: d});
      }
       
      x = e.originalEvent.pageX - $(this).offset().left - ink.width()/2;
      y = e.originalEvent.pageY - $(this).offset().top - ink.height()/2;
       
      ink.css({top: y+'px', left: x+'px'}).addClass("animate");

  });

});



/*===========================================================================
*
*  07 - UPLOAD EXISTING AUDIO FILE
*
*============================================================================*/

$(document).ready(function() {

  "use strict";

  /* Disable Convert Button if no audio file has been selected */
  $("#convert-button").prop("disabled", true).addClass("is-blocked");
  $("#existing-file-email").prop("disabled", true).addClass("is-blocked");


  /* -------------------------------------------- */
  /*    CHECK FILE SIZE AND FILE TYPE
  /* -------------------------------------------- */

  $("#file-selector").on('change', function() {

    if ($("#convert-button").prop('disabled',false)){
  
        $("#convert-button").prop('disabled',true).addClass("is-blocked"); 
        
    }


    var fileMaxSize = 31457280;              /* Adjust the file size accordingly (30 MB for example) */
    var fileSize = this.files[0].size;
    var fileExtension = $('#file-selector').val().split('.').pop().toLowerCase();

    if (fileSize !== 'undefined') {

      if (fileSize > fileMaxSize) {
      
          var message = "Maximum allowed file size is 30MB. Selected file size is " + (fileSize/Math.pow(1024,2)).toFixed(0) +"MB.";
          
          showStatusMessages(message, "error");
          
          $('#file-selector').val('');
          
          return false;

      } else if($.inArray(fileExtension, ['mp3', 'mp4', 'wav', 'flac']) == -1) {

          var message = "File with extention \"" + fileExtension + "\" is not allowed. Only \"mp3\" | \"mp4\" | \"wav\" | \"flac\" files are allowed.";
        
          showStatusMessages(message, "error");
        
          $('#file-selector').val('');
        
          return false;

      } else {

          $("#existing-file-email").prop("disabled", false).removeClass("is-blocked");
        
      }

    }

  });


  /* -------------------------------------------- */
  /*    SHOW GOOGLE RECAPTCHA
  /* -------------------------------------------- */

  $("#existing-file-email").on("change", function(){

      $("#convert-button").prop('disabled',false).removeClass("is-blocked");

  });

});


function showStatusMessages(message,status){
  
    "use strict";

    if (status == "success") {
        
        $("#file-upload-status-message").addClass("success-message").removeClass("error-message");
      
    } else if (status == "error") {
        
        $("#file-upload-status-message").removeClass("success-message").addClass("error-message");
    }

    $("#file-upload-status-message")
      .slideDown()
      .html(message)
      .delay(5000)
      .slideUp();
}



/*===========================================================================
*
*  08 - CUSTOM INPUT FIELD FOR AUDIO FILE UPLOAD BUTTON
*
*============================================================================*/

$(document).ready(function() {

  "use strict";

  $("#file-selector").each( function() {

    var $input   = $( this ),
      $label   = $input.next( 'label' ),
      labelVal = $label.html();

    $input.on( 'change', function( e ) {

      var fileName = '';

      if( this.files && this.files.length > 1 )
        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
      else if( e.target.value )
        fileName = e.target.value.split( '\\' ).pop();

      if( fileName )
        $label.find( 'span' ).html( fileName );
      else
        $label.html( labelVal );

    });

    // Firefox bug fix
    $input
    .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
    .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });

  });

});



/*===========================================================================
*
*  09 - AJAX REQUEST FOR EXISTING AUDIO FILE UPLOAD OPTION
*
*============================================================================*/

$(document).ready(function () {
    
    "use strict";

    /* --------------------------------------------------- */
    /*   PHP RETURNS LINK FOR THE AUDIO FILE
    /* --------------------------------------------------- */

    $("#existing-file-form").on("submit",(function(e) {

         e.preventDefault();
        
        if (checkEmail($("#existing-file-email").val())) {


             var formData = new FormData(this);

             
             $.ajax({
                   type: "POST",
                   url: "existing-file-transcribe-backend.php",
                   data: formData,
                   contentType: false,
                   processData: false,
                   cache: false,
                   beforeSend: function() {
                      $("#convert-button").html('Processing...');
                   },
                   complete: function() {
                      $("#convert-button").html('Convert Now');
                   },
                   success: function(response)
                   {
                    
                      $(".select-file label span").text('Choose an audio file...');  

               
                   },

                    error: function (response) {
                        
                        console.log('There was an error.');

                    }

                 }).done(function(response) {

                        fileUploadStatusMessage(response);
                        
                        $("#file-selector").val('');

                        $(".select-file label span").attr('value', 'Choose an audio file...');

                        $("#existing-file-email").val('');

                        $("#existing-file-email").prop("disabled", true).addClass("is-blocked");

                        $("#convert-button").prop("disabled", true).addClass("is-blocked");

                  })

          } else {

                $("#existing-file-email").val('');

                showStatusMessages('Email is not valid. Please enter valid email address.', "error");
                
          }                        

      }));
    
});


/* --------------------------------------------------------- */
/*   SHOW UPLOAD STATUS MESSAGE FOR EXISTING FILE UPLOAD
/* --------------------------------------------------------- */

function fileUploadStatusMessage(response){
  
    "use strict";

    var message = response['message'];      
    var status = response['status'];  

    if (status == "success") {
        
        $("#file-upload-status-message").addClass("success-message").removeClass("error-message");
      
    } else if (status == "error") {
        
        $("#file-upload-status-message").removeClass("success-message").addClass("error-message");
    }

    $("#file-upload-status-message")
      .slideDown()
      .html(message)
      .delay(5000)
      .slideUp();
      
}



/*===========================================================================
*
*  10 - UPLOAD RECORDED AUDIO FILE
*
*============================================================================*/

$(document).ready(function() {

  "use strict";

  /* Disable Convert Button if no audio file has been selected */
  $("#convert-button-recorded").prop("disabled", true).addClass("is-blocked");

  $("#recorded-file-email").prop("disabled", true).addClass("is-blocked");


  $("#recorded-file-email").on("change", function(){

      $("#convert-button-recorded").prop('disabled',false).removeClass("is-blocked");

  });

});



/*===========================================================================
*
*  10 - RECORD AUDIO FILE AND UPLOAD
*
*============================================================================*/

$(document).ready(function(){

    "use strict";


    var sec = 0;
    var timer;


    /* START RECORDING */

    $("#record-button").on("click", function(e){

        e.preventDefault();

        timer = setInterval(timeCounter, 1000);

        startRecording();

        $("#recorded-file-email").prop("disabled", false).removeClass("is-blocked"); 

    });


    /* STOP RECORDING */

    $("#stop-button").on("click", function(e){

        e.preventDefault();
        
        stopRecording();

        clearInterval(timer);
        sec = 0;

    });


    /* DISPLAY COUNTDOWN TIMER */

    function timeCounter() {

      if (sec == 300) {

        clearInterval(timer);
        sec = 0;
        stopRecording();

      } else {
        
          sec++;

          var timeLeft = 300 - sec;
          

          var minutes = Math.floor(timeLeft/ 60);
          var seconds = Math.floor(timeLeft - (minutes * 60));

          if (minutes < "10") { minutes = "0" + minutes; }
          if (seconds < "10") { seconds = "0" + seconds; }

          $(".minutes-left").html(minutes + "<span>:</span>");
          $(".seconds-left").html(seconds); 

        }   

    }

});



/*===========================================================================
*
*  11 - RECORD AUDIO FUNCTION
*
*============================================================================*/

URL = window.URL || window.webkitURL;
var gumStream;
var rec;
var input;
var audioStream;
var AudioContext = window.AudioContext || window.webkitAudioContext;


function startRecording() {

    /* Simple constraints object, for more advanced audio features see https://addpipe.com/blog/audio-constraints-getusermedia/ */
    var constraints = { audio: true, video:false }
     

    /* Disable the record button until we get a success or fail from getUserMedia() */
    $("#recordings").slideUp();

    $("#record-button").prop("disabled", true).addClass('is-recording is-blocked').html('<i class="fa fa-microphone-alt"></i>Recording');

    $("#stop-button").prop("disabled", false).removeClass("is-blocked");

   
    /*
        We're using the standard promise based getUserMedia() 
        https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
    */

    navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {

        /*
          create an audio context after getUserMedia is called
          sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
          the sampleRate defaults to the one set in your OS for your playback device

        */
        audioContext = new AudioContext();

        
        $("#audio-settings").slideDown();

        /*  assign to gumStream for later use  */
        gumStream = stream;
        
        /* use the stream */
        input = audioContext.createMediaStreamSource(stream);

        /* 
          Create the Recorder object and configure to record mono sound (1 channel)
          Recording 2 channels  will double the file size
        */
        rec = new Recorder(input,{numChannels:1})

        //start the recording process
        rec.record()

        console.log("Recording started");

    }).catch(function(err) {

      //enable the record button if getUserMedia() fails
      $("#record-button").prop("disabled", false);

      $("#stop-button").prop("disabled", true);   
      
  });
}


function stopRecording() {
 
  "use strict";

  //disable the stop button, enable the record too allow for new recordings
  $("#record-button").prop("disabled", false).removeClass('is-recording is-blocked').html('<i class="fa fa-microphone-alt"></i>Record');

  $("#stop-button").prop("disabled", true).addClass("is-blocked");
  
  $("#audio-settings").slideUp();

 
  
  //tell the recorder to stop the recording
  rec.stop();

  //stop microphone access
  gumStream.getAudioTracks()[0].stop();

  //create the wav blob and pass it on to createDownloadLink
  rec.exportWAV(createDownloadLink);
}


function createDownloadLink(blob) {
  
  "use strict";

  var url = URL.createObjectURL(blob);
  var audio = $('#audio');
  var link = $('#audio-link');
  audioStream = blob;

  //name of .wav file to use during upload and download (without extendion)
  var date = new Date().getTime();

  //add controls to the <audio> element
  audio[0].src = url;

  var filename = date + ".wav";

  //save to disk link
  link.attr('href', url);

  link.attr('download', filename); 

  link.html('Download');

  $("#recordings").slideDown();
  
}



/*===========================================================================
*
*  12 - AJAX REQUEST FOR RECORDED AUDIO FILE UPLOAD OPTION
*
*============================================================================*/

 $("#recorded-file-form").on("submit",(function(e) {

      "use strict";

      e.preventDefault();

     if (checkEmail($("#recorded-file-email").val())) {


          var formData = new FormData(this);


          if (audioStream) {
              var audio_record = new Blob([audioStream], { type: "audio/wav" });
              formData.append("audio-record", audio_record);
          }
           
           $.ajax({
                 type: "POST",
                 url: "recorded-file-transcribe-backend.php",
                 data: formData,
                 contentType: false,
                 processData: false,
                 cache: false,
                 beforeSend: function() {
                      $("#convert-button-recorded").html('Processing File...');
                 },
                 complete: function() {
                      $("#convert-button-recorded").html('Upload & Convert');
                 },
                 success: function(response)
                 {
                  
                    console.log(response);
             
                 },

                  error: function (response) {

                      console.log('There was an error.');

                      console.log(response);

                  }

               }).done(function(response) {

                      fileRecordStatusMessage(response);

                      $("#recordings").slideUp();

                      $("#recorded-file-email").val('');

                      $("#recorded-file-email").prop("disabled", true).addClass("is-blocked");

                      $("#convert-button-recorded").prop("disabled", true).addClass("is-blocked");
                      
               })

      } else {

          $("#recorded-file-email").val('');

          showStatusMessagesRecorded('Email is not valid. Please enter valid email address.', "error");

      }      
       
 }));



function fileRecordStatusMessage(response){
  
  "use strict";

  var message = response['message'];      
  var status = response['status'];  

  if (status == "success") {
      
      $("#file-record-status-message").addClass("success-message").removeClass("error-message");
    
  } else if (status == "error") {
      
      $("#file-record-status-message").removeClass("success-message").addClass("error-message");
  }

  $("#file-record-status-message")
    .slideDown()
    .html(message)
    .delay(5000)
    .slideUp();
}
  

function showStatusMessagesRecorded(message,status){
  
  "use strict";

  if (status == "success") {
      
      $("#file-record-status-message").addClass("success-message").removeClass("error-message");
    
  } else if (status == "error") {
      
      $("#file-record-status-message").removeClass("success-message").addClass("error-message");
  }

  $("#file-record-status-message")
    .slideDown()
    .html(message)
    .delay(5000)
    .slideUp();

}



/*===========================================================================
*
*  13 - VERIFY EMAIL ADDRESSES
*
*============================================================================*/

function checkEmail(email) {
  
  "use strict";

  var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  
  return regex.test(email);

}