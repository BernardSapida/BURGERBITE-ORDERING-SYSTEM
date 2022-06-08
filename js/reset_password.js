$(document).ready(function() {
    $("#eye_new-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#new_password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#new_password").attr("type", "password");
        }
    });

    $("#eye_confirm-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#confirm_password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#confirm_password").attr("type", "password");
        }
    });

    $("#btn_success").click(function(){
        $(".section_modal-reset-password-success").fadeOut();
        location.href = "signin.php";
    });
});