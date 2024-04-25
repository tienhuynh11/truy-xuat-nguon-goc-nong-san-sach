<script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- <script src="assets/js/jquery.nice-select.min.js"></script> -->
    <script src="assets/js/jquery.nicescroll.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/biolife.framework.js"></script>
    <script src="assets/js/functions.js"></script>

    <script>
    // Lấy modal
    var modal = document.getElementById('qrcodeModal');

    // Lấy hình ảnh QR code và thẻ span để đóng modal
    var img = document.getElementById('qrcodeImg');
    var span = document.getElementsByClassName('close')[0];

    // Lấy nút tải xuống
    var downloadLink = document.getElementById('downloadLink');

    // Khi người dùng nhấn vào hình ảnh QR code, mở modal
    document.getElementsByClassName('qrcode')[0].onclick = function(){
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
</script>