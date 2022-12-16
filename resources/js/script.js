function popUp() {
    Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon: "success",
        title: "Signed in successfully",
    });
}

$(document).on("click", "[id^=button]", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Anda yakin ingin melakukan pemesanan ?",
        text: "pesanan akan di kirim setelah anda menenyetujuinya",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Setuju",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#form").submit();
            Swal.fire("Success", "Pesanan di kirim.", "success");
        }
    });
});

$(document).on("click", "[id^=button-delete-certif]", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Anda yakin menghapus sertifikat ini ?",
        text: "sertifikat akan dihapus secara permanen",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Setuju",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#form").submit();
            Swal.fire("Success", "Sertifikat dihapus.", "success");
        }
    });
});

$(document).on("click", "[id^=button-delete-education]", function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Anda yakin menghapus data pendidikan ini ?",
        text: "data pendidikan akan dihapus secara permanen",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Setuju",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#form").submit();
            Swal.fire("Success", "data pendidikan dihapus.", "success");
        }
    });
});
