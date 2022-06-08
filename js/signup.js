$(document).ready(function() {
    $("#eye-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#password").attr("type", "password");
        }
    });
    
    $("#eye-confirm-password").click(function() {
        if(Array.from(this.classList).indexOf("fa-eye-slash") != -1) {
            this.classList.remove("fa-eye-slash");
            this.classList.toggle("fa-eye");
            $("#confirm-password").attr("type", "text");
        } else {
            this.classList.remove("fa-eye");
            this.classList.toggle("fa-eye-slash");
            $("#confirm-password").attr("type", "password");
        }
    });
    
    $("#btn_success").click(function() {
        $(".section_modal-signup-success").fadeOut();
      	location.href = "signin.php";
    });
});