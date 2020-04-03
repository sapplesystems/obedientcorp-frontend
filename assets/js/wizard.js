(function ($) {
  'use strict';
  var form = $("#example-form");
  form.validate({
    errorPlacement: function errorPlacement(error, element) {
      element.before(error);
    },
    rules: {
      confirm_passowrd: {
        equalTo: "#password"
      },
      password: {
        minlength: 8
      },
      mobile: {
        phoneUS: true,
      },
      land_line_phone: {
        number: true,
      },
      name: {
        lettersonly: true,
      },
      occupation: {
        lettersonly: true,
      },
      pin_code: {
        number: true,
      },
      father_name: {
        lettersonly: true,
      },
      mother_name: {
        lettersonly: true,
      },
      adhar: {
        number: true,
      },
    },
    messages: {
      payee_name: "Payee name same as name",
      confirm_passowrd: "Confirm password same as Password",
    }
  });
  form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    onStepChanging: function (event, currentIndex, newIndex) {
      form.validate().settings.ignore = ":disabled,:hidden";
      return form.valid();
    },
    onFinishing: function (event, currentIndex) {
      form.validate().settings.ignore = ":disabled";
      return form.valid();
    },
    onFinished: function (event, currentIndex) {
      //alert("Submitted!");
    }
  });




  /* var validationForm = $("#example-validation-form");
   validationForm.val({
     errorPlacement: function errorPlacement(error, element) {
       element.before(error);
     },
     rules: {
       confirm: {
         equalTo: "#password"
       }
     }
   });
   validationForm.children("div").steps({
     headerTag: "h3",
     bodyTag: "section",
     transitionEffect: "slideLeft",
     onStepChanging: function(event, currentIndex, newIndex) {
       validationForm.val({
         ignore: [":disabled", ":hidden"]
       })
       return validationForm.val();
     },
     onFinishing: function(event, currentIndex) {
       validationForm.val({
         ignore: [':disabled']
       })
       return validationForm.val();
     },
     onFinished: function(event, currentIndex) {
       alert("Submitted!");
     }
   });
   var verticalForm = $("#example-vertical-wizard");
   verticalForm.children("div").steps({
     headerTag: "h3",
     bodyTag: "section",
     transitionEffect: "slideLeft",
     stepsOrientation: "vertical",
     onFinished: function(event, currentIndex) {
       alert("Submitted!");
     }
   });*/
})(jQuery);