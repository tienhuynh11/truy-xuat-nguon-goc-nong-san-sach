<?php
// Bao gồm tệp chứa lớp hoặc chức năng để truy vấn cơ sở dữ liệu và lấy thông tin sản phẩm
include 'adminback.php';

// Kiểm tra xem yêu cầu có chứa tham số ID không
if (isset($_GET['id'])) {
    // Nhận ID của sản phẩm từ yêu cầu GET
    $id = $_GET['id'];

    // Tạo một đối tượng adminback hoặc sử dụng các phương thức tương ứng để lấy thông tin chi tiết sản phẩm
    $obj = new adminback();
    $product_details = $obj->get_product_details($id); // Thay thế hàm này bằng phương thức thích hợp trong lớp adminback của bạn

    // Xuất thông tin chi tiết sản phẩm dưới dạng HTML
    echo "<p><strong>Tên sản phẩm: </strong>" . $product_details['tensanpham'] . "</p>";
    // Xuất các thông tin khác nếu cần

    // Có thể bạn muốn trả về dữ liệu dưới dạng JSON nếu bạn muốn xử lý dữ liệu ở phía client
    // echo json_encode($product_details);
} else {
    // Nếu không có ID được cung cấp, trả về một thông báo lỗi hoặc thực hiện xử lý phù hợp khác
    echo "Không có ID sản phẩm được cung cấp.";
}
?>
