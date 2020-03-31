$(function() {
  $('#all').on("click",function(){
    $('.list').prop("checked", $(this).prop("checked"));
  });
});

var form = document.querySelector('#department-form');
form.onsubmit = function() {
  // Populate hidden form on submit
  var department_text = document.querySelector('input[name=department_text]');
  department_text.value = JSON.stringify(quill.getContents());

  console.log("Submitted", $(form).serialize(), $(form).serializeArray());

  // No back end to actually submit to!
  alert('Open the console to see the submit data!')
  return false;
};
