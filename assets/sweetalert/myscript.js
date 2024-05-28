//jquery carikan data yg ada didalam flashdata yang ada diclass flash-data,lalu simpan kedalam variabel
const flashdata=$('.flash-data').data('flashdata');

if(flashdata){
    Swal.fire({
        title: flashdata,
        text:  '',
        icon: 'success'      
      })
}


//tombol hapus
$('.tombol-hapus').on('click',function(e){
e.preventDefault();
const href=$(this).attr('href');

Swal.fire({
  title: 'Yakin hapus data ini ???',
  text: "",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data'
}).then((result) => {
  if (result.value) {
    document.location.href=href;
  }
})
});