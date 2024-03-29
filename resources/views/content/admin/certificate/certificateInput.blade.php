<table border="0" class="table table-light" id="tableCertificate">
    <tr>
        <td>Nama</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Nama" type="text" id="name"></td>
    </tr>
    <tr>
        <td>Title</td>
        <td><input type="text" style="width: 100%" class="form-control" placeholder="Title" type="text" id="title">
        </td>
    </tr>
    <tr>
    <td>Trining Mulai Dan Training Selesai</td>
        <td>
            <div style="display: flex; justify-content: space-between;">
                <input type="date" style="width: 47%;" class="form-control" type="text" id="start">
                <input type="date" style="width: 47%;" class="form-control" type="text" id="end">
            </div>
        </td>
    </tr>
    <tr>
        <td>Tanggal Sertifikat</td>
        <td><input type="date" style="width: 100%;" class="form-control" type="text" id="date">
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <button class="btn btn-secondary" type="reset" id="close"><i class="fa fa-times"></i> Batal</button>
            <button type="submit" class="btn btn-success" id="send"><i class="fa fa-floppy-o"></i> Simpan</button>
        </td>
    </tr>
</table>

<script>
    $('#send').click(function() {
        const name = $('#name').val();
        const type = $('#type').val();
        const title = $('#title').val();
        const start = $('#start').val();
        const end = $('#end').val();
        const date = $('#date').val();

        axios.post('/certificate/send', {
            name,
            title,
            start,
            end,
            date
        }).then((response) => {
            Swal.fire({
                title: 'Success...',
                position: 'top-end',
                icon: 'success',
                text: 'Sukses Menambahkan Data!',
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            }).then((response) => {
                location.reload();
            })
        }).catch((err) => {
            Swal.fire({
                title: 'Error',
                position: 'top-end',
                icon: 'error',
                text: err,
                showConfirmButton: false,
                width: '400px',
                timer: 1500
            })
        })
    })
</script>