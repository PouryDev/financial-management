window.addEventListener('updated',  e => {
    const detail = e.detail[0]
    Swal.fire({
        title: detail.title,
        icon: detail.icon,
        iconColor: detail.iconColor,
        timer: 3000,
        toast: true,
        position: 'bottom-right',
        timerProgressBar: true,
        showConfirmButton: false,
    })
});
window.addEventListener('show-confirm-dialog', e => {
    const detail = e.detail[0]
    Swal.fire({
        title: detail.title,
        text: detail.text,
        icon: detail.icon,
        showCancelButton: true,
        confirmButtonText: e.detail.confirmButtonText,
        cancelButtonText: e.detail.cancelButtonText,
    }).then((result) => {
        if (result.isConfirmed) {
            window.livewire.emit(e.detail.onConfirmed, e.detail.data);
        }
    });
});
