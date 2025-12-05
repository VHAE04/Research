<?php

// Kiểm tra xem form đã được gửi hay chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['uploaded_file'])) {
    // Lấy thông tin file đã tải lên
    $uploadedFile = $_FILES['uploaded_file'];

    // Kiểm tra xem file có phải là PNG không
    if ($uploadedFile['type'] === 'image/png') {
        // Tạo một tên file mới
        $originalFilename = $uploadedFile['name'];
        $newFilename = uniqid() . '_' . $originalFilename;

        // Đường dẫn lưu file nén
        $destination = 'C:\xampp\htdocs\traning\\' . $newFilename;

        // Tạo hình ảnh từ file PNG đã tải lên
        $source = imagecreatefrompng($uploadedFile['tmp_name']);

        // Nén và lưu file PNG với mức nén 9
        imagepng($source, $destination, 9);

        // Giải phóng bộ nhớ
        imagedestroy($source);

        echo "File đã được nén và lưu thành công: " . $destination;
    } else {
        echo "Vui lòng tải lên một file PNG.";
    }
} else {
    echo "Không có file nào được tải lên.";
}

?>

<!-- HTML Form để tải lên file -->
<h1>luu tru nen anh vhae</h1>
<form action="" method="post" enctype="multipart/form-data">
    Chọn file PNG để tải lên:
    <input type="file" name="uploaded_file" accept=".png">
    <input type="submit" value="Tải lên">
</form>
