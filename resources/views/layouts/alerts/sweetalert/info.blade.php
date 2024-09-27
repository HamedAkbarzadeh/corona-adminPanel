@if(session('swal-info'))
<script>
    Swal.fire({
  title: '{{ session('swal-info') }}',
  confirmButtonText: 'باشه', 
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})
</script>
@endif