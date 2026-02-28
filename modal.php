<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>แสดง Modal ทันที</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- ปุ่มล้างข้อมูล -->
<div class="text-center mt-3">
  <button id="resetModal" class="btn btn-danger">ล้างข้อมูล modal (แสดงใหม่ตอนโหลดหน้า)</button>
</div>


<!-- Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeModalLabel">ยินดีต้อนรับ</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
      </div>
      <div class="modal-body">
        ขอบคุณที่เข้าชมเว็บไซต์ของเรา
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="yes">เข้าใจแล้ว</button>
        <button type="button" class="btn btn-secondary" id="no">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal 2 -->
<div class="modal fade" id="secondModal" tabindex="-1" aria-labelledby="secondModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="secondModalLabel">ขั้นตอนถัดไป</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
      </div>
      <div class="modal-body">
        กรุณาเลือกการดำเนินการ
      </div>
      <div class="modal-footer">

        <!-- ปุ่ม 1: ปิด modal เท่านั้น -->
        <button type="button" class="btn btn-primary" id="closeModalBtn">ตกลง</button>
        
        <!-- ปุ่ม 2: ไม่ตอบ -->
        <button type="button" class="btn btn-danger" id="noAnswerBtn">ไม่ตอบคำถาม</button>
      </div>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- เรียก modal เมื่อหน้าโหลดเสร็จ -->
<script>
    $(document).ready(function () {
    // แสดง Modal ทันทีเมื่อโหลดหน้า
    if (!localStorage.getItem('modalAccepted')) {
      $('#welcomeModal').modal('show');
    }

    // ถ้าคลิกปุ่ม "เข้าใจแล้ว" => ปิด modal
    $('#yes').on('click', function () {
        localStorage.setItem('modalAccepted', 'true'); // บันทึกว่าเคยกดแล้ว
      $('#welcomeModal').modal('hide');

      // รอให้ modal แรกปิดก่อน แล้วเปิด modal 2
      $('#welcomeModal').on('hidden.bs.modal', function () {
        $('#secondModal').modal('show');

        });
    });

    // ถ้าคลิกปุ่ม "ยกเลิก" => แสดง alert
    $('#no').on('click', function () {
      alert('คุณคลิกปุ่มยกเลิก');
    });

     // เมื่อคลิกปุ่มล้างข้อมูล
    $('#resetModal').on('click', function () {
      localStorage.removeItem('modalAccepted');
      alert('ล้างข้อมูลเรียบร้อย! รีเฟรชหน้าเพื่อทดสอบ');
    });

    // ปุ่มแรก ปิด modal
  $('#closeModalBtn').on('click', function () {
    $('#secondModal').modal('hide');

    // เปิดลิงก์ในแท็บเดียวกัน
  window.location.href = 'https://example.com';
  });

  // ปุ่มสอง แสดง alert แล้วปิด modal
  $('#noAnswerBtn').on('click', function () {
    alert('คุณไม่ได้ตอบคำถาม กรุณาตัดสินใจอีกครั้ง');
    $('#secondModal').modal('hide');
  });

  });
</script>


</body>
</html>
