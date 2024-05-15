<script src="assets/js/jquery-3.4.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
<script src="assets/js/jquery.nicescroll.min.js"></script>
<script src="assets/js/slick.min.js"></script>
<script src="assets/js/biolife.framework.js"></script>
<script src="assets/js/functions.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    // Lấy modal
    var modal = document.getElementById('qrcodeModal');

    // Lấy hình ảnh QR code và thẻ span để đóng modal
    var img = document.getElementById('qrcodeImg');
    var span = document.getElementsByClassName('close')[0];

    // Lấy nút tải xuống
    var downloadLink = document.getElementById('downloadLink');

    // Khi người dùng nhấn vào hình ảnh QR code, mở modal
    document.getElementsByClassName('qrcode')[0].onclick = function() {
        modal.style.display = 'block';
        img.src = this.getElementsByTagName('img')[0].src; // Lấy src của hình ảnh QR code
        downloadLink.href = this.getElementsByTagName('img')[0].src; // Cập nhật đường dẫn tải xuống
    }

    // Khi người dùng nhấn vào nút đóng hoặc nền đen, đóng modal
    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

    var alertElement = document.querySelector('.alert');

    if (alertElement) {
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 5000);
    }

    function checkTenEmail(input) {
        var hoten = document.getElementById("hoten");
        var errorText = document.getElementById("errorText");
        var errorTextEmail = document.getElementById("errorTextEmail");
        var email = document.getElementById("email");


        if (hoten.value != "") {
            var kytu = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if (kytu.test(hoten.value)) {
                errorText.innerHTML = "Họ tên không được chứa ký tự đặc biệt!";
                errorText.style.display = "block";
            } else {
                errorText.style.display = "none";
            }
        } else {
            errorText.innerHTML = "Vui lòng điền đầy đủ họ tên!!";
            errorText.style.display = "block";
        }
        if (email.value != "") {
            errorTextEmail.style.display = "none";
        } else {
            errorTextEmail.innerHTML = "Vui lòng điền địa chỉ email!";
            errorTextEmail.style.display = "block";
        }
    }

    function checkDangKy(input) {
        var password = input.value;
        var passwordLengthText = document.getElementById("passwordLengthText");
        var passwordLetterText = document.getElementById("passwordLetterText");
        var passwordNumberText = document.getElementById("passwordNumberText");
        var passwordSpecialCharText = document.getElementById("passwordSpecialCharText");
        var passwordLengthIcon = document.getElementById("passwordLengthIcon");
        var passwordLetterIcon = document.getElementById("passwordLetterIcon");
        var passwordNumberIcon = document.getElementById("passwordNumberIcon");
        var passwordSpecialCharIcon = document.getElementById("passwordSpecialCharIcon");

        if (password.length < 8) {

            passwordLengthIcon.className = "fa fa-times";
        } else {

            passwordLengthIcon.className = "fa fa-check";
        }

        if (!/[A-Z]/.test(password)) {

            passwordLetterIcon.className = "fa fa-times";
        } else {

            passwordLetterIcon.className = "fa fa-check";
        }

        if (!/\d/.test(password)) {

            passwordNumberIcon.className = "fa fa-times";
        } else {

            passwordNumberIcon.className = "fa fa-check";
        }

        if (!/[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {

            passwordSpecialCharIcon.className = "fa fa-times";
        } else {

            passwordSpecialCharIcon.className = "fa fa-check";
        }
    }

    function checkPasswordsMatch() {
        var password = document.getElementById("pass").value;
        var pass2 = document.getElementById("pass2").value.trim();
        var passwordMatchMessage = document.getElementById("passwordMatchMessage");
        var registerBtn = document.getElementById('registerBtn');

        if (pass2 != "") {
            if (password !== pass2) {
                passwordMatchMessage.innerHTML = "Mật khẩu không trùng khớp!";
                passwordMatchMessage.style.color = 'red';
                passwordMatchMessage.style.display = "block"; // Hiển thị thông báo
                registerBtn.disabled = true;
            } else {
                passwordMatchMessage.innerHTML = "Mật khẩu trùng khớp!";
                passwordMatchMessage.style.color = '#66FF00';
                passwordMatchMessage.style.display = "block"; // Ẩn thông báo
                registerBtn.disabled = false;
            }
        } else {
            passwordMatchMessage.innerHTML = "Vui lòng nhập lại mật khẩu!!";
            passwordMatchMessage.style.color = 'red';
            passwordMatchMessage.style.display = "block"; // Hiển thị thông báo
            registerBtn.disabled = true;
        }

    }

    function checkInputs() {
        var hoten = document.getElementById("hoten").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("pass").value.trim();
        var confirmPassword = document.getElementById("pass2").value.trim();

        var errorText = document.getElementById("errorText");
        var errorTextEmail = document.getElementById("errorTextEmail");
        var passwordMatchMessage = document.getElementById("passwordMatchMessage");
        var passwordLengthIcon = document.getElementById("passwordLengthIcon");
        var passwordLetterIcon = document.getElementById("passwordLetterIcon");
        var passwordNumberIcon = document.getElementById("passwordNumberIcon");
        var passwordSpecialCharIcon = document.getElementById("passwordSpecialCharIcon");
        var registerBtn = document.getElementById('registerBtn');
        var ht;
        var em;
        var mk;
        var mk2;
        // Kiểm tra họ tên
        if (hoten !== '') {

            var kytu = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
            if (kytu.test(hoten)) {
                errorText.innerHTML = "Họ tên không được chứa ký tự đặc biệt!";
                errorText.style.display = "block";
                ht = 0;
            } else {
                errorText.style.display = "none";
                ht = 1;
            }
        } else {
            errorText.innerHTML = "Vui lòng điền đầy đủ họ tên!!";
            errorText.style.display = "block";
            ht = 0;
        }

        // Kiểm tra email
        if (email !== '') {
            errorTextEmail.style.display = "none";
            em = 1;
        } else {
            errorTextEmail.innerHTML = "Vui lòng điền địa chỉ email!";
            errorTextEmail.style.display = "block";
            em = 0;
        }

        // Kiểm tra mật khẩu
        if (password.length < 8) {

            passwordLengthIcon.className = "fa fa-times";
            mk = 0;
        } else {

            passwordLengthIcon.className = "fa fa-check";
            mk = 1;
        }

        if (!/[A-Z]/.test(password)) {

            passwordLetterIcon.className = "fa fa-times";
            mk = 0;
        } else {

            passwordLetterIcon.className = "fa fa-check";
            mk = 1;
        }

        if (!/\d/.test(password)) {

            passwordNumberIcon.className = "fa fa-times";
            mk = 0;
        } else {

            passwordNumberIcon.className = "fa fa-check";
            mk = 1;
        }

        if (!/[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {

            passwordSpecialCharIcon.className = "fa fa-times";
            mk = 0;
        } else {

            passwordSpecialCharIcon.className = "fa fa-check";
            mk = 1;
        }

        // Kiểm tra mật khẩu và xác nhận mật khẩu khớp nhau
        if (password !== '' && confirmPassword !== '') {
            if (password !== confirmPassword) {
                passwordMatchMessage.innerHTML = "Mật khẩu không trùng khớp!";
                passwordMatchMessage.style.color = 'red';
                passwordMatchMessage.style.display = "block";
                mk2 = 0;
            } else {
                passwordMatchMessage.innerHTML = "Mật khẩu trùng khớp!";
                passwordMatchMessage.style.color = '#66FF00';
                passwordMatchMessage.style.display = "block";
                mk2 = 1;
            }
        } else {
            passwordMatchMessage.innerHTML = "Vui lòng nhập lại mật khẩu!!";
            passwordMatchMessage.style.color = 'red';
            passwordMatchMessage.style.display = "block";
            mk2 = 0;
        }

        // Kiểm tra tất cả các trường có dữ liệu để hiển thị nút "Đăng ký"
        if (ht == 1 && em == 1 && mk == 1 && mk2 == 1) {
            registerBtn.disabled = false;
        } else {
            registerBtn.disabled = true;
        }
    }

    // Gọi hàm checkInputs khi có sự kiện input xảy ra trên các trường
    document.getElementById("hoten").addEventListener("input", checkInputs);
    document.getElementById("email").addEventListener("input", checkInputs);
    document.getElementById("pass").addEventListener("input", checkInputs);
    document.getElementById("pass2").addEventListener("input", checkInputs);
</script>