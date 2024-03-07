  <!-- Jquery JS-->
  <script src="<?= base_url('assets/') ?>vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="<?= base_url('assets/') ?>vendor/slick/slick.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/wow/wow.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/animsition/animsition.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="<?= base_url('assets/') ?>vendor/circle-progress/circle-progress.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="<?= base_url('assets/') ?>vendor/select2/select2.min.js"></script>

  <!-- Main JS-->
  <script src="<?= base_url('assets/') ?>js/main.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets') ?>/jsqr/dist/jsQR.js"></script>

  <script>
      let videoElement = document.getElementById('cameraView');
      let videoStream;

      function startCamera() {
          navigator.mediaDevices.getUserMedia({
                  video: true
              })
              .then(function(stream) {
                  videoElement.srcObject = stream;
                  videoStream = stream;
              })
              .catch(function(error) {
                  console.error('Terjadi Kesalahan Saat Mengakses Kamera:', error);
              });
      }

      function stopCamera() {
          if (videoStream) {
              let tracks = videoStream.getTracks();
              tracks.forEach(track => track.stop());
              videoElement.srcObject = null;
          }
      }

      function decodeQRCode() {
          // Mendapatkan gambar dari video
          let canvas = document.createElement('canvas');
          canvas.width = videoElement.videoWidth;
          canvas.height = videoElement.videoHeight;
          let context = canvas.getContext('2d');
          context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);

          // Mendekode QR code dari gambar
          let imageData = context.getImageData(0, 0, canvas.width, canvas.height).data;
          let qrCodeResult = jsQR(imageData, canvas.width, canvas.height);
          if (qrCodeResult) {
              const decodedData = qrCodeResult.data;
          } else {

          }
          if (qrCodeResult) {
              const npnp = qrCodeResult.data;

              // Kirim permintaan Ajax untuk mendapatkan data karyawan berdasarkan NPnP
              $.ajax({
                  url: '<?php echo base_url("absen/getEmployeeData"); ?>',
                  method: 'POST',
                  data: {
                      npnp: npnp
                  },
                  success: function(response) {
                      if (response.success) {
                          // Tampilkan data karyawan pada elemen input yang sesuai
                          document.getElementById('npnp').value = response.data.npnp;
                          document.getElementById('nama').value = response.data.nama;
                          document.getElementById('id_thl').value = response.data.id_thl;
                          document.getElementById('jenis_kelamin').value = response.data.jenis_kelamin;
                          document.getElementById('jabatan').value = response.data.jabatan;
                          document.getElementById('proses').disabled = false;

                          const timeZone = 'Asia/Makassar';
                          const currentDateTime = new Date();
                          const options = {
                              timeZone,
                              year: 'numeric',
                              month: '2-digit',
                              day: '2-digit',
                              hour: '2-digit',
                              minute: '2-digit',
                              hour12: false
                          }

                          const formattedDateTime = currentDateTime.toLocaleString('en-US', options);

                          const currentDate = formattedDateTime.slice(0, 10); // Format Y-m-d
                          const isoDate = new Date(currentDate).toISOString().slice(0, 10);
                          const currentTime = currentDateTime.toTimeString().slice(0, 5);
                          // Tampilkan tanggal dan jam pada elemen input yang sesuai

                          document.getElementById('jam').value = currentTime;


                          showAlert('success', 'Berhasil Memindai QR Code, Silahkan Melanjutkan Proses Absensi');
                      } else {
                          // Tampilkan pesan error pada elemen input NPnP
                          document.getElementById('npnp').value = 'DATA IDAK DI TEMUKAN';
                          document.getElementById('nama').value = 'DATA IDAK DI TEMUKAN';
                          document.getElementById('jenis_kelamin').value = 'DATA IDAK DI TEMUKAN';
                          document.getElementById('jabatan').value = 'DATA IDAK DI TEMUKAN';
                          showAlert('danger', 'TOLONG MASUKAN FORMAT QR CODE YANG SUDAH DI BERIKAN');
                      }
                  },
                  error: function(error) {
                      console.error('Error fetching employee data:', error);
                      showAlert('danger', 'Error fetching employee data');
                  }
              });
          } else {
              document.getElementById('npnp').value = 'DATA IDAK DI TEMUKAN';
              document.getElementById('nama').value = 'DATA IDAK DI TEMUKAN';
              document.getElementById('jenis_kelamin').value = 'DATA IDAK DI TEMUKAN';
              document.getElementById('jabatan').value = 'DATA IDAK DI TEMUKAN';
              // Tampilkan pesan error pada elemen input NPnP
              showAlert('danger', 'SISTEM TIDAK DAPAT MEMINDAI KODE QR, TOLONG COCOKAN PADA KAMERA');
          }
      }

      function showAlert(type, message) {
          // Hapus alert sebelumnya jika ada
          $('.alert').remove();

          // Tambahkan alert baru
          const alertHtml = `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                          ${message}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                       </div>`;

          // Tambahkan alert ke elemen dengan ID 'result'
          $('#result').append(alertHtml);
      }
  </script>

  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable({
              "language": {

                  "decimal": "",
                  "emptyTable": "Tidak Ada Data Yang Ditemukan",
                  "info": "Menampilkan _START_ ke _END_ dari _TOTAL_ data",
                  "infoEmpty": "Menampilkan 0 to 0 of 0 Data",
                  "infoFiltered": "(Di Filter Dari _MAX_ total data)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Menampilkan _MENU_ Data ",
                  "loadingRecords": "Mohon Tunggu...",
                  "processing": "Memproses...",
                  "search": "Cari:",
                  "zeroRecords": "Data Tidak Ditemukan",
                  "paginate": {
                      "first": "Awal",
                      "last": "Akhir",
                      "next": "Selanjutnya",
                      "previous": "Sebelumnya"
                  },
                  "aria": {
                      "sortAscending": ": activate to sort column ascending",
                      "sortDescending": ": activate to sort column descending"
                  }

              }
          });
      });
  </script>

  </body>

  </html>
  <!-- end document-->