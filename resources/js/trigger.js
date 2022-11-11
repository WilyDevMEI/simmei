import Swal from 'sweetalert2';
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          } else {
            event.preventDefault();
            event.stopPropagation();
            Swal.fire({
                title: 'Simpan Data ?',
                text: 'Lanjutkan untuk menyimpan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then( (willSaved) => {
                if( willSaved.isConfirmed ) {
                    Swal.fire(
                        'Berhasil 👍',
                        'Data berhasil disimpan',
                        'success'
                    ),
                    setInterval(() => {
                        form.submit();
                    }, 1500)
                }
            });
          }

          form.classList.add('was-validated')
        }, false);
      })
})()

const   btnDelete = document.querySelectorAll('.btn-delete');
        btnDelete.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const form = btn.parentElement;
                e.preventDefault();
                Swal.fire({
                    title: 'Hapus data ini ?',
                    text: 'Klik batal jika tidak ingin menghapus data ini',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then( (willSaved) => {
                    if( willSaved.isConfirmed ) {
                        Swal.fire(
                            'Berhasil Menghapus👍',
                            'Data berhasil dihapus',
                            'success'
                        ),
                        setInterval(() => {
                            form.submit();
                        }, 1500)
                    }
                });
            })
})


const   btnRevokePermission = document.querySelectorAll('.btn-revoke-permission');
        btnRevokePermission.forEach(btnRevoke => {
            btnRevoke.addEventListener('click', (e) => {
                const form = btnRevoke.parentElement;
                e.preventDefault();
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Yakin ingin menghapus permission untuk role ini ?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then( (willRevokePermission) => {
                    if( willRevokePermission.isConfirmed ) {
                        Swal.fire(
                            'Berhasil 👍',
                            'Permission berhasil dihapus untuk role ini',
                            'success'
                        ),
                        setInterval(() => {
                            form.submit();
                        }, 1500)
                    }
                });
            });
        });
