$(function() {
    $('#inputState1').on('change', onInputState1);
});

function fonInputState1 (argument) {
    var email_id = $(this).val();
    alert(email_id);
}