$(document).ready(function() {
    let newUploadImage = document.getElementById("client-account-image");
    let clientProfile = document.getElementById("client_profile");

    document.querySelector("#eye_client-password-current").addEventListener("click", showCurrentPassword);
    document.querySelector("#eye_client-password-new").addEventListener("click", showNewPassword);
    document.querySelector("#eye_client-password-confirm").addEventListener("click", showConfirmPassword);

    function showCurrentPassword() {
        let eye = document.getElementById("eye_client-password-current");
        let password = document.getElementById("client-password-current");

        if(Array.from(eye.classList).indexOf("fa-eye-slash") != -1) {
            eye.classList.remove("fa-eye-slash");
            eye.classList.toggle("fa-eye");
            password.setAttribute("type", "text");
        } else {
            eye.classList.remove("fa-eye");
            eye.classList.toggle("fa-eye-slash");
            password.setAttribute("type", "password");
        }
    }

    function showNewPassword() {
        let eye = document.getElementById("eye_client-password-new");
        let password = document.getElementById("client-password-new");

        if(Array.from(eye.classList).indexOf("fa-eye-slash") != -1) {
            eye.classList.remove("fa-eye-slash");
            eye.classList.toggle("fa-eye");
            password.setAttribute("type", "text");
        } else {
            eye.classList.remove("fa-eye");
            eye.classList.toggle("fa-eye-slash");
            password.setAttribute("type", "password");
        }
    }

    function showConfirmPassword() {
        let eye = document.getElementById("eye_client-password-confirm");
        let password = document.getElementById("client-password-confirm");

        if(Array.from(eye.classList).indexOf("fa-eye-slash") != -1) {
            eye.classList.remove("fa-eye-slash");
            eye.classList.toggle("fa-eye");
            password.setAttribute("type", "text");
        } else {
            eye.classList.remove("fa-eye");
            eye.classList.toggle("fa-eye-slash");
            password.setAttribute("type", "password");
        }
    }

    newUploadImage.onchange = function() {  
        let newImage = this.files[0];
        let text;
        if(newImage) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(newImage);
            fileReader.addEventListener("load", function () {
                clientProfile.src = this.result;
            }); 
        } else {
            text = 'Please select a file';
        }
    clientProfile.innerHTML = text;
    };

    $("#btn_update").click(function(){
        $(".section_modal-update-success").fadeOut();
    });
});